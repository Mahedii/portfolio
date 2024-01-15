<?php

namespace App\Services\v1\Payment;

use Auth;
// use Validator;
use Exception;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Payment\PaymentMethods;
use Illuminate\Support\Facades\Validator;
use App\Models\Expenses\Category\Category;
use App\Models\Expenses\SubCategory\SubCategory;
use App\Models\Expenses\Category\CategoryParentTree;

class PaymentMethodsService
{
    /**
     * Client form request container
     *
     * @var Request $request
     */
    private Request $request;

    private $paymentMethods;

    /**
     * Set the request container
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Get response
     *
     * @return array
     */
    public function getResponse(): array
    {
        // $validated = $this->validateData($this->request);

        // if ($validated) {
        //     $response = $this->cargoInfoAddData($this->request);
        // }

        $response = $this->checkCrudMethod($this->request->type);

        return $response;
    }

    /**
     * check crud method type
     *
     * @return array
     */
    private function checkCrudMethod($type)
    {
        $response = null;
        switch ($type) {
            case 'read':
                $response = $this->readMethod();
                break;
            case 'create':
                $response = $this->createMethod();
                break;
            case 'update':
                $response = $this->updateMethod();
                break;
            case 'delete':
                $response = $this->deleteMethod();
                break;
        }

        return $response;
    }

    /**
     * read Method
     *
     * @return array
     */
    private function readMethod()
    {
        if (isset($this->request->id) && $this->request->id !== null) {
            return [
                'status' => 200,
                // 'paymentMethods' => PaymentMethods::getSelectedSubcategoriesWithCategory($this->request->id)
            ];
        } else {
            return [
                'status' => 200,
                'paymentMethods' => PaymentMethods::getPaymentMethods()
            ];
        }
    }

    /**
     * create Method
     *
     * @return array
     */
    private function createMethod()
    {
        try {
            DB::transaction(function () {
                // Your existing code within the transaction
                $slug = $this->generateSlug($this->request->method);

                $createCategory = PaymentMethods::create([
                    'method' => $this->request->method,
                    'slug' => $slug
                ]);
            });

            $result = [
                'status' => 200,
                'message' => "Payment Method " . $this->request->method . " added successfully",
            ];
        } catch (\Exception $e) {
            $result = [
                'status' => 500,
                'message' => "Payment Method " . $this->request->method . " could not be added",
            ];
        }

        return $result;
    }

    /**
     * update Method
     *
     * @return array
     */
    private function updateMethod()
    {
        try {
            DB::transaction(function () {
                $paymentMethods = PaymentMethods::find($this->request->id);
                $paymentMethods->parent_id = $this->request->category_id;
                $paymentMethods->category_name = $this->request->subcategory;

                // Check if any values have changed and are not null
                $changesToSave = $this->checkForDirtyData($paymentMethods);
                // Log::info(json_encode($changesToSave));

                // Update the category only if there are changes to save
                if (!empty($changesToSave)) {
                    if (array_key_exists('category_name', $changesToSave)) {
                        $changesToSave["slug"] = $this->generateSlug($this->request->method);
                    }

                    $updateCategory = PaymentMethods::where('id', $this->request->id)->update($changesToSave);
                }
            });

            $result = [
                'status' => 200,
                'message' => "Payment Method " . $this->request->method . " updated successfully",
            ];
        } catch (\Exception $e) {
            $result = [
                'status' => 500,
                'message' => "Payment Method " . $this->request->method . " could not be updated",
            ];
        }

        return $result;
    }

    /**
     * delete Method
     *
     * @return array
     */
    private function deleteMethod()
    {
        try {
            DB::transaction(function () {
                $paymentMethods = PaymentMethods::find($this->request->id);
                $deleteCategory = $paymentMethods->delete();
                if (!$deleteCategory) {
                    // If there's an issue with deleting the category, throw an exception to roll back the transaction
                    throw new Exception("Payment Method " . $this->request->method . " delete failed");
                }
            });

            $result = [
                'status' => 200,
                'message' => "Payment Method " . $this->request->method . " deleted successfully",
            ];
        } catch (\Exception $e) {
            $result = [
                'status' => 500,
                'message' => "Payment Method " . $this->request->id . " could not be deleted",
            ];
        }

        return $result;
    }

    private function checkForDirtyData($model)
    {
        $changes = $model->getDirty();
        $changesToSave = [];

        foreach ($changes as $attribute => $value) {
            if ($value !== null && !empty($value)) {
                $changesToSave[$attribute] = $value;
            }
        }

        return $changesToSave;
    }

    /**
     * generate slug
     *
     * @return string
     */
    public static function generateSlug($name): string
    {
        $slug = Str::slug($name);

        if (PaymentMethods::where('slug', Str::slug($name))->exists()) {
            $original = $slug;

            $count = 1;

            while (PaymentMethods::where('slug', $slug)->exists()) {
                $slug = "{$original}-" . $count++;
            }

            return $slug;
        }
        return $slug;
    }
}

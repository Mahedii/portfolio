<?php

namespace App\Services\v1\Filter;

use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Filter\Filter;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Payment\PaymentMethods;
use App\Models\Payment\PaymentMethodsInfo;

class FilterService
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
            case 'change-status':
                $response = $this->changeStatusMethod();
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
        try {
            if (isset($this->request->subType) && $this->request->subType == 'expenses') {
                $result = [
                    'status' => 200,
                    'filteredResult' => Filter::getFilteredResultForExpenses($this->request)
                ];
            }

            return $result;
        } catch (\Exception $e) {
            Log::error($e);
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
                $paymentMethods->method = $this->request->methodName;

                // Check if any values have changed and are not null
                $changesToSave = $this->checkForDirtyData($paymentMethods);
                // Log::info(json_encode($changesToSave));

                // Update the changed values only if there are changes to save
                if (!empty($changesToSave)) {
                    $paymentMethods->update($changesToSave);
                }

                $paymentMethodsInfo = PaymentMethodsInfo::where('payment_method_id', $this->request->id)->first();

                // Log::info($this->request->id);

                if (!$paymentMethodsInfo) {
                    PaymentMethodsInfo::create([
                        'payment_method_id' => $this->request->id,
                        'account_name' => $this->request->accountName,
                        'account_number' => $this->request->accountNumber,
                        'bank_name' => $this->request->bankName,
                        'expire_date' => $this->request->expireDate,
                        'cvc' => $this->request->cvc
                    ]);
                } else {
                    $paymentMethodsInfo->payment_method_id = $this->request->id;
                    $paymentMethodsInfo->account_name = $this->request->accountName;
                    $paymentMethodsInfo->account_number = $this->request->accountNumber;
                    $paymentMethodsInfo->bank_name = $this->request->bankName;
                    $paymentMethodsInfo->expire_date = $this->request->expireDate;
                    $paymentMethodsInfo->cvc = $this->request->cvc;

                    $changesToSave = $this->checkForDirtyData($paymentMethodsInfo);
                    if (!empty($changesToSave)) {
                        $paymentMethodsInfo->update($changesToSave);
                    }
                }
            });

            $result = [
                'status' => 200,
                'message' => "Payment Method " . $this->request->method . " updated successfully",
            ];
        } catch (\Exception $e) {
            Log::error($e);
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
        return [];
    }

    /**
     * change Status Method
     *
     * @return array
     */
    private function changeStatusMethod()
    {
        try {
            DB::transaction(function () {
                $paymentMethods = PaymentMethods::find($this->request->id);
                if ($paymentMethods) {
                    $status = ($paymentMethods->status == "1") ? "0" : "1";
                    $paymentMethods->update(["status" => $status]);
                }
            });

            $result = [
                'status' => 200,
                'message' => "Status updated successfully",
            ];
        } catch (\Exception $e) {
            Log::error($e);
            $result = [
                'status' => 500,
                'message' => "Status could not be updated",
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

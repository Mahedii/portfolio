<?php

namespace App\Services\v1\Expenses;

use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Expenses\Expenses;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ExpensesService
{
    /**
     * Client form request container
     *
     * @var Request $request
     */
    private Request $request;

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
        try {
            if (isset($this->request->id) && $this->request->id !== null) {
                return [
                    'status' => 200,
                    // 'expenses' => Expenses::getSelectedSubcategoriesWithCategory($this->request->id)
                ];
            } else {
                return [
                    'status' => 200,
                    'expenses' => Expenses::getAllExpenseList()
                ];
            }
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
                $createExpense = Expenses::create([
                    'category_id' => $this->request->category_id,
                    'amount' => $this->request->expense_amount,
                    'expense_date' => $this->request->expense_date,
                    'unit_id' => $this->request->unit_id,
                    'quantity' => $this->request->quantity,
                    'payment_method_id' => $this->request->payment_method_id,
                    'remarks' => $this->request->remarks,
                ]);

                if (!$createExpense) {
                    throw new Exception("Expense creation failed");
                }
            });

            $result = [
                'status' => 200,
                'message' => "Expense added successfully",
            ];
        } catch (\Exception $e) {
            Log::error($e);
            $result = [
                'status' => 500,
                'message' => "Expense could not be added",
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
                $expense = Expenses::find($this->request->id);
                $expense->parent_id = $this->request->category_id;
                $expense->category_name = $this->request->subcategory;

                // Check if any values have changed and are not null
                $changesToSave = $this->checkForDirtyData($expense);
                // Log::info(json_encode($changesToSave));

                // Update the category only if there are changes to save
                if (!empty($changesToSave)) {
                    if (array_key_exists('category_name', $changesToSave)) {
                        $changesToSave["slug"] = $this->generateSlug($this->request->subcategory);
                    }

                    $updateCategory = Expenses::where('id', $this->request->id)->update($changesToSave);
                    if ($updateCategory) {
                    } else {
                        // If there's an issue with updating the category, throw an exception to roll back the transaction
                        throw new Exception("Expense update failed");
                    }
                }
            });

            $result = [
                'status' => 200,
                'message' => "Expense updated successfully",
            ];
        } catch (\Exception $e) {
            $result = [
                'status' => 500,
                'message' => "Expense could not be updated",
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
                $expense = Expenses::find($this->request->id);
                $deleteCategory = $expense->delete();
                if (!$deleteCategory) {
                    // If there's an issue with deleting the category, throw an exception to roll back the transaction
                    throw new Exception("Expense delete failed");
                }
            });

            $result = [
                'status' => 200,
                'message' => "Expense " . $this->request->category_name . " deleted successfully",
            ];
        } catch (\Exception $e) {
            $result = [
                'status' => 500,
                'message' => "Expense " . $this->request->id . " could not be deleted",
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

        if (Expenses::where('slug', Str::slug($name))->exists()) {
            $original = $slug;

            $count = 1;

            while (Expenses::where('slug', $slug)->exists()) {
                $slug = "{$original}-" . $count++;
            }

            return $slug;
        }
        return $slug;
    }
}

<?php

namespace App\Services\Backend\Common\Ajax;

use App\Enums\Tables;
use App\Enums\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class UpdateDataService
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
     * Get data from database according routes
     *
     * @return array
     */
    public function getResponse(): array
    {
        $tableSecretKey = Crypt::decryptString($this->request->table_secret_key);

        // #### Method 2 ####
        // #### Get value from Enums ####
        $requestClass = null;
        $tablesEnumConstant = Tables::class . '::' . strtoupper($tableSecretKey);

        // Check if the constant exists
        if (defined($tablesEnumConstant)) {
            // Get the constant value from the model enum based on the matched table enum constant
            $requestsEnumConstant = Requests::class . '::' . strtoupper($tableSecretKey);

            // Check if the constant exists
            if (defined($requestsEnumConstant)) {
                $requestClass = constant($requestsEnumConstant);
            }
        }

        if ($requestClass == null) {
            return ["status" => "error", "message" => "Data validation error: Request rules not found"];
        } else {
            $fieldsToValidate = $this->request->except(['slug', 'table_secret_key', '_token']);
            $formRequest = new $requestClass($fieldsToValidate);
            $validation = Validator::make($fieldsToValidate, $formRequest->rules(), $formRequest->messages());

            if ($validation->fails()) {
                return ["status" => "error", "message" => "Data validation error", 'errors' => $validation->errors()];
            }
        }

        $updateTableData = $this->updateTableData($tableSecretKey);

        if ($updateTableData) {
            $updatedRowData = $this->getUpdatedRowData($tableSecretKey);
            $tableAllData = $this->getUpdatedTableData($tableSecretKey);
            $result = [
                'status' => 200,
                'message' => 'Data updated successfully',
                'updatedRowData' => $updatedRowData,
                'field' => $tableAllData,
            ];
        } else {
            $result = [
                'status' => 500,
                'message' => 'Data can not be updated.',
            ];
        }

        return $result;
    }

    /**
     * Update selected table data
     *
     * @param string $tableSecretKey
     * @return int
     */
    private function updateTableData(string $tableSecretKey): int
    {
        $fieldsToUpdate = $this->request->except(['slug', 'table_secret_key', '_token']);

        $updateQuery = DB::table($tableSecretKey)
            ->where('slug', $this->request->slug)
            ->update($fieldsToUpdate);

        return $updateQuery;
    }

    /**
     * Fetch updated row data
     *
     * @param string $tableSecretKey
     * @return object
     */
    private function getUpdatedRowData(string $tableSecretKey): object
    {
        $updatedRowData = DB::table($tableSecretKey)
            ->where('slug', $this->request->slug)
            ->get();

        return $updatedRowData;
    }

    /**
     * Fetch updated table data
     *
     * @param string $tableSecretKey
     * @return object
     */
    private function getUpdatedTableData(string $tableSecretKey): object
    {
        $tableData = DB::table($tableSecretKey)->orderBy('id', 'DESC')->get();

        $tableData = $tableData->map(function ($item) use ($tableSecretKey) {
            $item->secret_key = $this->request->table_secret_key;
            return $item;
        });

        return $tableData;
    }
}

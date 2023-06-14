<?php

namespace App\Services\Backend\Common\Ajax;

use App\Enums\Models;
use App\Enums\Tables;
use App\Enums\Requests;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class AddDataService
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

        $insertTableData = $this->insertTableData($tableSecretKey);

        if ($insertTableData) {
            $tableAllData = $this->getUpdatedTableData($tableSecretKey);
            $result = [
                'status' => 200,
                'message' => 'Data inserted successfully',
                'field' => $tableAllData,
            ];
        } else {
            $result = [
                'status' => 500,
                'message' => 'Data can not be inserted.',
            ];
        }

        return $result;
    }

    /**
     * Insert data into table
     *
     * @param string $tableSecretKey
     */
    private function insertTableData(string $tableSecretKey)
    {
        $fieldsToUpdate = $this->request->except(['table_secret_key', '_token']);

        // Get the first key
        $firstKey = array_keys($fieldsToUpdate)[0];

        // Get the value associated with the first key
        $firstKeyValue = $fieldsToUpdate[$firstKey];

        $requestModel = null;

        // // #### Method 1 ####
        // // #### Get value from config/const.php ####
        // foreach (config('const.Tables') as $key => $data) {
        //     // Check if the $tableSecretKey value matches with the const Tables key
        //     if ($tableSecretKey === $key) {
        //         // Get the value of const Models key
        //         $requestModel = config('const.Models.' . $key);
        //     }
        // }

        // #### Method 2 ####
        // #### Get value from Enums ####
        $tablesEnumConstant = Tables::class . '::' . strtoupper($tableSecretKey);

        // Check if the constant exists
        if (defined($tablesEnumConstant)) {
            // Get the constant value from the model enum based on the matched table enum constant
            $modelsEnumConstant = Models::class . '::' . strtoupper($tableSecretKey);

            // Check if the constant exists
            if (defined($modelsEnumConstant)) {
                $requestModel = constant($modelsEnumConstant);
            }
        }

        if ($requestModel == null) {
            return ["status" => "error", "message" => "No matching result found"];
        }

        $slug = $this->generateSlug($requestModel, $firstKeyValue);
        $fieldsToUpdate['slug'] = $slug;

        $insertQuery = DB::table($tableSecretKey)->insert($fieldsToUpdate);
        return $insertQuery;
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

    /**
     * Fetch updated table data
     *
     * @param string $tableSecretKey
     * @param string $firstKeyValue
     * @return string
     */
    private function generateSlug(string $requestModel, string $firstKeyValue): string
    {
        $slug = Str::slug($firstKeyValue);
        // dd($slug,"show");

        if ($requestModel::where('slug', Str::slug($firstKeyValue))->exists()) {
            $original = $slug;

            $count = 1;

            while ($requestModel::where('slug', $slug)->exists()) {
                $slug = "{$original}-" . $count++;
            }

            return $slug;
        }
        return $slug;
    }
}

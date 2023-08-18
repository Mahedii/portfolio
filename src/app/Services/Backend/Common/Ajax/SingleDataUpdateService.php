<?php

namespace App\Services\Backend\Common\Ajax;

use File;
use App\Enums\Models;
use App\Enums\Tables;
use App\Enums\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use App\Models\CommonFiles\CommonFiles;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image as ResizeImage;

class SingleDataUpdateService
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
        $requestModel = null;
        $tablesEnumConstant = Tables::class . '::' . strtoupper($tableSecretKey);

        // Check if the constant exists
        if (defined($tablesEnumConstant)) {
            // Get the constant value from the model enum based on the matched table enum constant
            $modelsEnumConstant = Models::class . '::' . strtoupper($tableSecretKey);

            if (defined($modelsEnumConstant)) {
                $requestModel = constant($modelsEnumConstant);
            }
        }

        if ($requestModel == null) {
            return ["status" => "error", "message" => "Data validation error: Request model not found"];
        }

        $updateTableData = $this->updateTableData($requestModel, $tableSecretKey);

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
            $errorMessage = 'Error: Data can not be updated';

            $result = [
                'status' => 500,
                'message' => $errorMessage,
            ];
        }

        return $result;
    }

    /**
     * Update selected table data
     *
     * @param string $requestModel
     * @param string $tableSecretKey
     * @return int
     */
    private function updateTableData(string $requestModel, string $tableSecretKey): int
    {
        $updateQuery = $requestModel::where('slug', $this->request->slug)->update([
            $this->request->field => $this->request->value,
        ]);

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

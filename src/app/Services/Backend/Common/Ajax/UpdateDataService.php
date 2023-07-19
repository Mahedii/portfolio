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
        $requestModel = null;
        $tablesEnumConstant = Tables::class . '::' . strtoupper($tableSecretKey);

        // Check if the constant exists
        if (defined($tablesEnumConstant)) {
            // Get the constant value from the model enum based on the matched table enum constant
            $requestsEnumConstant = Requests::class . '::' . strtoupper($tableSecretKey);

            // Get the constant value from the model enum based on the matched table enum constant
            $modelsEnumConstant = Models::class . '::' . strtoupper($tableSecretKey);

            // Check if the constant exists
            if (defined($requestsEnumConstant)) {
                $requestClass = constant($requestsEnumConstant);
            }

            if (defined($modelsEnumConstant)) {
                $requestModel = constant($modelsEnumConstant);
            }
        }

        if ($requestClass == null) {
            return ["status" => "error", "message" => "Data validation error: Request rules not found"];
        } elseif ($requestModel == null) {
            return ["status" => "error", "message" => "Data validation error: Request model not found"];
        } else {
            $validation = $this->validateData($requestClass);

            if ($validation->fails()) {
                return [
                    "status" => "error",
                    "message" => "Data validation error",
                    "errors" => $validation->errors()->toArray()
                ];
            }
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
     * Validate request data
     *
     * @param string $requestClass
     * @return object
     */
    private function validateData(string $requestClass): object
    {
        $fieldsToValidate = $this->request->except(['slug', 'table_secret_key', 'method_type', '_token']);
        $formRequest = new $requestClass($fieldsToValidate);
        $validation = Validator::make($fieldsToValidate, $formRequest->rulesForUpdate(), $formRequest->messages());

        return $validation;
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
        $fetchTableData = DB::table($tableSecretKey)
        ->where('slug', $this->request->slug)
        ->select('id')
        ->first();

        if ($fetchTableData) {
            // Fetch data from the common_files table
            $checkCommonFiles = DB::table('common_files')
                ->where('table_name', $tableSecretKey)
                ->where('table_row_id', $fetchTableData->id)
                ->where('file_slug', $this->request->slug)
                ->first();
            if ($checkCommonFiles) {
                $foundStatus = true;
            } else {
                $foundStatus = false;
            }
        }

        $fieldsToUpdate = $this->request->except(['slug', 'table_secret_key', 'method_type', '_token']);

        if ($this->request->hasfile('file_path')) {
            $file = $this->request->file_path;
            $filePath = $this->getPathForUploadedFile($tableSecretKey, $file);
            $this->commonFilesCreateOrUpdate($foundStatus, $tableSecretKey, $fetchTableData->id, $filePath);
            $fieldsToUpdate['file_path'] = $filePath;
        } elseif ($this->request->hasfile('file_paths')) {
            foreach ($this->request->file_paths as $multi_file) {
                $filePath = $this->getPathForUploadedFile($tableSecretKey, $multi_file);
                $this->commonFilesCreateOrUpdate($foundStatus, $tableSecretKey, $fetchTableData->id, $filePath);
            }
        }

        $updateQuery = $requestModel::where('slug', $this->request->slug)->update($fieldsToUpdate);

        return $updateQuery;
    }

    /**
     * Get path for uploaded files
     *
     * @param object $file
     * @param string $tableSecretKey
     * @return string
     */
    private function getPathForUploadedFile(string $tableSecretKey, object $file): string
    {
        // $fileName = $file->getClientOriginalName();
        // $fileName = $tableSecretKey . "_image.png";
        $fileExtension = $file->extension();
        $fileExtension = strtolower($file->getClientOriginalExtension());
        $fileName = $tableSecretKey . "_image." . $fileExtension;

        $path = public_path('assets/images/' . $tableSecretKey . '/' . $this->request->slug);

        $this->createDirectory($path);

        // ResizeImage::make($file)->resize(300, 200)->save(public_path($filePath));
        if ($file->move($path, $fileName)) {
            $filePath = 'assets/images/' . $tableSecretKey . '/' . $this->request->slug . '/' . $fileName;
        }

        return $filePath;
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
     * Create directory if not exist
     *
     * @param string $path
     * @return void
     */
    private function createDirectory(string $path): void
    {
        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true, true);
        }
    }

    /**
     * Check and insert/update common_files table
     *
     * @param bool $foundStatus
     * @param string $table_name
     * @param int $table_row_id
     * @param string $file_path
     * @return void
     */
    private function commonFilesCreateOrUpdate(bool $foundStatus, string $table_name, int $table_row_id, string $file_path): void
    {
        if ($foundStatus == true) {
            // Data exists, update the common_files table
            DB::table('common_files')
            ->where('table_name', $table_name)
            ->where('table_row_id', $table_row_id)
            ->where('file_slug', $this->request->slug)
            ->update(['file_path' => $file_path]);
        } else {
            // Data does not exist, create new entry in the common_files table
            DB::table('common_files')->insert([
                'table_name' => $table_name,
                'table_row_id' => $table_row_id,
                'file_slug' => $this->request->slug,
                'file_path' => $file_path,
            ]);
        }
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

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
            $fieldsToValidate = $this->request->except(['slug', 'table_secret_key', 'method_type', '_token']);
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
        $fieldsToInsert = $this->request->except(['table_secret_key', 'method_type', '_token']);

        // Get the first key
        $firstKey = array_keys($fieldsToInsert)[0];

        // Get the value associated with the first key
        $firstKeyValue = $fieldsToInsert[$firstKey];

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
        $fieldsToInsert['slug'] = $slug;

        if ($this->request->hasfile('file_path')) {
            $file = $this->request->file_path;
            $filePath = $this->getPathForUploadedFile($tableSecretKey, $slug, $file);
            $this->commonFilesCreate($tableSecretKey, $insertQuery->id, $slug, $filePath);
            $fieldsToInsert['file_path'] = $filePath;
        } elseif ($this->request->hasfile('file_paths')) {
            foreach ($this->request->file_paths as $multi_file) {
                $filePath = $this->getPathForUploadedFile($tableSecretKey, $slug, $multi_file);
                // $this->commonFilesCreateForMultipleFile($tableSecretKey, $slug, $filePath);
            }
        }

        $insertQuery = DB::table($tableSecretKey)->insert($fieldsToInsert);

        return $insertQuery;
    }

    /**
     * Get path for uploaded files
     *
     * @param string $tableSecretKey
     * @param string $slug
     * @param object $file
     * @return string
     */
    private function getPathForUploadedFile(string $tableSecretKey, string $slug, object $file): string
    {
        // $fileName = $file->getClientOriginalName();
        // $fileName = $tableSecretKey . "_image.png";
        $fileExtension = $file->extension();
        $fileExtension = strtolower($file->getClientOriginalExtension());
        $fileName = $tableSecretKey . "_image." . $fileExtension;

        $path = public_path('assets/images/' . $tableSecretKey . '/' . $slug);

        $this->createDirectory($path);

        // ResizeImage::make($file)->resize(300, 200)->save(public_path($filePath));
        if ($file->move($path, $fileName)) {
            $filePath = 'assets/images/' . $tableSecretKey . '/' . $slug . '/' . $fileName;
        }

        return $filePath;
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
     * Insert common_files table
     *
     * @param string $table_name
     * @param int $table_row_id
     * @param string $file_slug
     * @param string $file_path
     * @return void
     */
    private function commonFilesCreate(string $table_name, int $table_row_id, string $file_slug, string $file_path): void
    {
        // Data does not exist, create new entry in the common_files table
        DB::table('common_files')->insert([
            'table_name' => $table_name,
            'table_row_id' => $table_row_id,
            'file_slug' => $file_slug,
            'file_path' => $file_path,
        ]);
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

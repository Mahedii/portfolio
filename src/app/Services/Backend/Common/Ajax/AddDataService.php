<?php

namespace App\Services\Backend\Common\Ajax;

use App\Enums\Models;
use App\Enums\Tables;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

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

        $insertTableData = $this->insertTableData($tableSecretKey);

        return ["status" => $insertTableData];

        if ($insertTableData) {
            $tableData = $this->getUpdatedTableData($tableSecretKey);
            $result = [
                'status' => 200,
                'message' => 'Data inserted successfully',
                'field' => $tableData,
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
     * Fetch updated table data
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

        $requestModel = array();
        $requestModel[] = $tableSecretKey;
        foreach (Tables::cases() as $case) {
            $requestModel[] = $case->value;
            // $result = strcmp($tableSecretKey, $case);

            // if ($result === 0) {
            //     $requestModel[] = "matched";
            // }
            if ($tableSecretKey === $case->value) {
                $requestModel[] = "matched";
                $requestModels = Models::$case->value;
                break;
            }
        }

        return $requestModels;

        if ($requestModel == null) {
            return ["status" => "error", "message" => "No matching result found"];
        }

        // if ($tableSecretKey == Tables::typed_texts->value) {
        //     $requestModel = Models::typed_texts->value;
        // }

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

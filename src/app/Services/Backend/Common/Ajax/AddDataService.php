<?php

namespace App\Services\Backend\Common\Ajax;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
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

        $updateTable = $this->updateTableData($tableSecretKey);

        if($updateTable) {
            $tableData = $this->getUpdatedTableData($tableSecretKey);
            $result = [
                'status' => 200,
                'message' => 'Data updated successfully',
                'field' => $tableData,
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
     * Fetch updated table data
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
     * Fetch updated table data
     *
     * @param string $tableSecretKey
     * @return object
     */
    private function getUpdatedTableData(string $tableSecretKey): object
    {
        $tableData = DB::table($tableSecretKey)->get();

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
     * @return string
     */
    private function generateSlug(string $tableSecretKey): string
    {
        $name = $tableSecretKey."-slug";
        $slug=Str::slug($name);
        // dd($slug,"show");

        if (DynamicModel::where('slug',Str::slug($name))->exists()) {

            $original = $slug;

            $count = 1;

            while(DynamicModel::where('slug',$slug)->exists()) {

                $slug = "{$original}-" . $count++;
            }

            return $slug;

        }
        // dd($slug);
        return $slug;

    }
}

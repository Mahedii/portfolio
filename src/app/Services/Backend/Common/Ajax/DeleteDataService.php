<?php

namespace App\Services\Backend\Common\Ajax;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class DeleteDataService
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
        $tableSecretKey = Crypt::decryptString($this->request->table);

        $deleteTableData = $this->deleteTableData($tableSecretKey);

        if ($deleteTableData) {
            $tableAllData = $this->getUpdatedTableData($tableSecretKey);
            $result = [
                'status' => 200,
                'message' => 'Data deleted successfully',
                'field' => $tableAllData,
            ];
        } else {
            $result = [
                'status' => 500,
                'message' => 'Data can not be deleted.',
            ];
        }

        return $result;
    }

    /**
     * Delete selected table data
     *
     * @param string $tableSecretKey
     * @return int
     */
    private function deleteTableData(string $tableSecretKey): int
    {
        $deleteQuery = DB::table($tableSecretKey)
            ->where('slug', $this->request->data)
            ->delete();

        return $deleteQuery;
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
            $item->secret_key = $this->request->table;
            return $item;
        });

        return $tableData;
    }
}

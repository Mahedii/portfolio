<?php

namespace App\Services\Backend\Common\Ajax;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class FetchDataService
{
    private $table;
    private $data;

    public function __construct($table, $data)
    {
        $this->table = $table;
        $this->data = $data;
    }

    /**
     * Get data from database according routes
     *
     */
    public function getData()
    {
        $table_data = DB::table(Crypt::decryptString($this->table))->where('slug', $this->data)->get();

        $result = [
            'status' => 200,
            'table_name' => $this->table,
            'field' => $table_data,
        ];

        return $result;
    }

    /**
     * Make the path url
     *
     */
    public function getPathUrl()
    {
        $viewPath = 'Backend.pages';
        $folders = explode('/', $this->path);

        foreach ($folders as $folder) {
            $viewPath .= '.' . $folder;
        }

        $pathUrl = $viewPath . '.index';

        return $pathUrl;
    }
}

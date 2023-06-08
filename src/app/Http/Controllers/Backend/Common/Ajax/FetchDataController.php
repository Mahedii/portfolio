<?php

namespace App\Http\Controllers\Backend\Common\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Backend\Common\Ajax\FetchDataService;

class FetchDataController extends Controller
{
    private $fetchDataService;
    /**
     * Fetch expected data
     *
     */
    public function index($table, $data)
    {
        try {
            $this->fetchDataService = new FetchDataService($table, $data);

            $fetchedData = $this->fetchDataService->getData();

            return Response()->json($fetchedData);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}

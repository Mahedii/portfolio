<?php

namespace App\Http\Controllers\Backend\Common;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\Backend\Common\LoadDataAndRedirectService;

class LoadDataAndRedirectController extends Controller
{
    private $loadDataAndRedirectService;
    /**
     * Show the application page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($path, $table, $data)
    {
        try {
            $urlPrefix = "Backend.pages.";
            $this->loadDataAndRedirectService = new LoadDataAndRedirectService($table, $data);

            $pathUrl = $urlPrefix . $path;
            $fetchedData = $this->loadDataAndRedirectService->getData();

            if (view()->exists($pathUrl)) {
                return view($pathUrl, $fetchedData);
            }
            return abort(404);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}

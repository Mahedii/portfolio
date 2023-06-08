<?php

namespace App\Http\Controllers\Backend\Common;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\Backend\Common\CommonService;

class CommonController extends Controller
{
    private $commonService;
    /**
     * Show the application page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($path)
    {
        // dd("WTF");
        try {
            $this->commonService = new CommonService($path);

            $pathUrl = $this->commonService->getPathUrl();
            $fetchedData = $this->commonService->getData();

            // dd($pathUrl, $fetchedData);

            if (view()->exists($pathUrl)) {
                return view($pathUrl, $fetchedData);
            }
            return abort(404);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}

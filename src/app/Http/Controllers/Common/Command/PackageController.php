<?php

namespace App\Http\Controllers\Common\Command;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Common\Command\PackageService;

class PackageController extends Controller
{
    /**
     * Execute desired command
     *
     * @param Request $request
     */
    public function __invoke(Request $request)
    {
        try {
            $packageService = new PackageService($request);
            $response = $packageService->getResponse();
            return response()->json($response);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}

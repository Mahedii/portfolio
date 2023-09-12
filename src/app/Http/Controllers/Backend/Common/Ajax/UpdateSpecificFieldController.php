<?php

namespace App\Http\Controllers\Backend\Common\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Backend\Common\Ajax\UpdateSpecificFieldService;

class UpdateSpecificFieldController extends Controller
{
    /**
     * Fetch expected data
     *
     * @param Request $request
     */
    public function __invoke(Request $request)
    {
        try {
            $updateSpecificFieldService = new UpdateSpecificFieldService($request);
            $response = $updateSpecificFieldService->getResponse();
            return response()->json($response);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}

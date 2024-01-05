<?php

namespace App\Http\Controllers\v1\SubCategory;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\v1\SubCategory\SubCategoryService;

class SubCategoryController extends Controller
{
    private $subCategoryService;

    /**
     * Add form data
     *
     * @param string $functionName
     * @param Request $request
     */
    public function __invoke(Request $request)
    {
        try {
            $this->subCategoryService = new SubCategoryService($request);
            $response = $this->subCategoryService->getResponse();

            return response()->json($response);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}

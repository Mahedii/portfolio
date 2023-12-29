<?php

namespace App\Http\Controllers\v1\Category;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\v1\Category\CategoryService;

class CategoryController extends Controller
{
    private $addDataService;

    /**
     * Add form data
     *
     * @param string $functionName
     * @param Request $request
     */
    public function __invoke(Request $request)
    {
        try {
            $this->addDataService = new CategoryService($request);
            $response = $this->addDataService->getResponse();

            return response()->json($response);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}

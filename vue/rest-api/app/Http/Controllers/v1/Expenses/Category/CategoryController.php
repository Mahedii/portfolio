<?php

namespace App\Http\Controllers\v1\Expenses\Category;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\v1\Expenses\Category\CategoryService;

class CategoryController extends Controller
{
    private $categoryService;

    /**
     * Add form data
     *
     * @param string $functionName
     * @param Request $request
     */
    public function __invoke(Request $request)
    {
        try {
            $this->categoryService = new CategoryService($request);
            $response = $this->categoryService->getResponse();

            return response()->json($response);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}

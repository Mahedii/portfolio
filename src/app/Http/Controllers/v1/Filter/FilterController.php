<?php

namespace App\Http\Controllers\v1\Filter;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\v1\Filter\FilterService;

class FilterController extends Controller
{
    private $filterService;

    /**
     * Add form data
     *
     * @param string $functionName
     * @param Request $request
     */
    public function __invoke(Request $request)
    {
        try {
            $this->filterService = new FilterService($request);
            $response = $this->filterService->getResponse();

            return response()->json($response);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}

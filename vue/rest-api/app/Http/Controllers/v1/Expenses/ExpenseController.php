<?php

namespace App\Http\Controllers\v1\Expenses;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\v1\Expenses\ExpensesService;

class ExpenseController extends Controller
{
    private $expensesService;

    /**
     * Add form data
     *
     * @param string $functionName
     * @param Request $request
     */
    public function __invoke(Request $request)
    {
        try {
            $this->expensesService = new ExpensesService($request);
            $response = $this->expensesService->getResponse();

            return response()->json($response);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}

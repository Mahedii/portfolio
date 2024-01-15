<?php

namespace App\Http\Controllers\v1\Payment;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\v1\Payment\PaymentMethodsService;

class PaymentMethodsController extends Controller
{
    private $paymentMethodsService;

    /**
     * Add form data
     *
     * @param string $functionName
     * @param Request $request
     */
    public function __invoke(Request $request)
    {
        try {
            $this->paymentMethodsService = new PaymentMethodsService($request);
            $response = $this->paymentMethodsService->getResponse();

            return response()->json($response);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}

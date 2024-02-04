<?php

namespace App\Http\Controllers\v1\Measurement;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\v1\Measurement\UnitsService;

class UnitsController extends Controller
{
    private $unitsService;

    /**
     * Add form data
     *
     * @param string $functionName
     * @param Request $request
     */
    public function __invoke(Request $request)
    {
        try {
            $this->unitsService = new UnitsService($request);
            $response = $this->unitsService->getResponse();

            return response()->json($response);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}

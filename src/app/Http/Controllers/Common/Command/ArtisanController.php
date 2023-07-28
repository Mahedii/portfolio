<?php

namespace App\Http\Controllers\Common\Command;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Common\Command\ArtisanService;

class ArtisanController extends Controller
{
    /**
     * Execute desired command
     *
     * @param string $data
     */
    public function __invoke(string $data)
    {
        try {
            $artisanService = new ArtisanService($data);
            $response = $artisanService->getResponse();
            return response()->json($response);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}

<?php

namespace App\Http\Controllers\Backend\WorkHistory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\WorkHistory\WorkHistoryService;

class WorkHistoryController extends Controller
{
    /**
     * Fetch the work history page
     */
    public function index()
    {
        $workHistories = "";
        return view('Backend.work-history.index', compact('workHistories'));
    }

    /**
     * Fetch the work history page
     */
    public function sendMessage(Request $request)
    {
        $message = $request->input('message');

        $openai = new WorkHistoryService(config('services.openai.key'));

        $response = $openai->sendMessage($message);
        // dd($response);
        return response()->json(['message' => $response]);
    }
}

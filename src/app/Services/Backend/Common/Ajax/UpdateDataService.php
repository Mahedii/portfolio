<?php

namespace App\Services\Backend\Common\Ajax;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class UpdateDataService
{
    /**
     * Client form request container
     *
     * @var Request $request
     */
    private Request $request;

    /**
     * Set the request container
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Get data from database according routes
     *
     */
    public function getResponse()
    {
        $updateQuery = DB::table(Crypt::decryptString($this->request->table_name))
                ->where('slug', $this->request->slug)
                ->update([
                    'text' => $this->request->typingText,
                ]);

        // $table_data = DB::table(Crypt::decryptString($this->request->table_name))->where('slug', $this->request->slug)->first();
        $table_data = DB::table(Crypt::decryptString($this->request->table_name))->get();

        $encrypted_table_name = $this->request->table_name;
        $table_data = $table_data->map(function ($item) use ($encrypted_table_name) {
            $item->encrypted_table_name = $encrypted_table_name;
            return $item;
        });

        $result = [
            'status' => 200,
            'message' => "Text updated to " . $this->request->typingText . " successfully",
            'field' => $table_data,
        ];

        return $result;
    }
}

<?php

namespace App\Services\Backend\Common;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Models\HeroSection\TypedTexts;
use App\Models\HeroSection\HeroSection;
use App\Models\WorkHistory\WorkHistory;
use App\Models\WorkHistory\WorkHistoryList;

class LoadDataAndRedirectService
{
    private $table;
    private $data;

    public function __construct($table, $data)
    {
        $this->encryptedTable = $table;
        $this->decryptedTable = Crypt::decryptString($table);
        $this->data = $data;
    }

    /**
     * Get data from database according routes
     *
     * @return array
     */
    public function getData(): array
    {
        $fetchSelectedData = DB::table($this->decryptedTable)->where('slug', $this->data)->get();

        $tableSecretKey = $this->decryptedTable;
        $fetchSelectedData = $fetchSelectedData->map(function ($item) use ($tableSecretKey) {
            $item->encrypted_secret_key = $this->encryptedTable;
            return $item;
        });

        $componentArray = [
            "fetchedData" => $fetchSelectedData
        ];

        return $componentArray;
    }

    /**
     * Make the path url
     *
     * @return string
     */
    public function getPathUrl(): string
    {
        $viewPath = 'Backend.pages';
        $folders = explode('/', $this->path);

        foreach ($folders as $folder) {
            $viewPath .= '.' . $folder;
        }

        $pathUrl = $viewPath . '.index';

        return $pathUrl;
    }
}

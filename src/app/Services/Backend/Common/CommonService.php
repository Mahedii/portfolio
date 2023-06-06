<?php

namespace App\Services\Backend\Common;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CommonService
{
    private $path;

    public function __construct($path)
    {
        $this->path = $path;
    }

    /**
     * Get data from database according routes
     *
     */
    public function getData()
    {
        $pathArray = explode('/', $this->path);
        $arrayIndex = count($pathArray);
        $keyword = $pathArray[$arrayIndex - 1];

        if ($keyword == "contact-me") {
            $fetchedData = "";
        } elseif ($keyword == "work-history") {
            $fetchedData = "";
        } else {
            $fetchedData = "";
        }

        // $result = [
        //     'status' => 200,
        //     'message' => "Success",
        // ];

        return $keyword;
    }

    /**
     * Make the path url
     *
     */
    public function getPathUrl()
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

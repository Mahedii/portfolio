<?php

namespace App\Services\Backend\Common;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\HeroSection\TypedTexts;
use App\Models\HeroSection\HeroSection;

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
     * @return array
     */
    public function getData(): array
    {
        $pathArray = explode('/', $this->path);
        $arrayIndex = count($pathArray);
        $keyword = $pathArray[$arrayIndex - 1];

        $componentArray = [];

        if ($keyword == "hero-section") {
            $heroSectionData = HeroSection::all();
            $typedTextsData = TypedTexts::orderBy('id', 'DESC')->get();

            $componentArray = [
                "heroSectionData" => $heroSectionData,
                "typedTextsData" => $typedTextsData
            ];
        } elseif ($keyword == "work-history") {
            $componentArray = [];
        } else {
            $componentArray = [];
        }

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

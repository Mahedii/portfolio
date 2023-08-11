<?php

namespace App\Services\Backend\Common;

use App\Models\User;
use App\Models\Skills\Skills;
use App\Models\ContactMe\Message;
use App\Models\Skills\SkillsList;
use App\Models\AboutMe\AboutMyself;
use Illuminate\Support\Facades\Auth;
use App\Models\HeroSection\TypedTexts;
use App\Models\HeroSection\HeroSection;
use App\Models\SocialMedia\SocialMedia;
use App\Models\WorkHistory\WorkHistory;
use App\Models\ContactMe\ContactSection;
use App\Models\WorkHistory\WorkHistoryList;
use App\Models\ContactMe\ContactMeInformation;
use App\Models\EducationHistory\EducationHistory;
use App\Models\EducationHistory\EducationHistoryList;

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
        } elseif ($keyword == "about-me") {
            $aboutMeData = AboutMyself::all();

            $componentArray = [
                "aboutMeData" => $aboutMeData
            ];
        } elseif ($keyword == "work-history") {
            $workHistoryData = WorkHistory::all();
            $workHistoryListData = WorkHistoryList::orderBy('id', 'DESC')->get();

            $componentArray = [
                "workHistoryData" => $workHistoryData,
                "workHistoryListData" => $workHistoryListData
            ];
        } elseif ($keyword == "education-history") {
            $educationHistoryData = EducationHistory::all();
            $educationHistoryListData = EducationHistoryList::orderBy('id', 'DESC')->get();

            $componentArray = [
                "educationHistoryData" => $educationHistoryData,
                "educationHistoryListData" => $educationHistoryListData
            ];
        } elseif ($keyword == "skills") {
            $skillsData = Skills::all();
            $skillsListsData = SkillsList::orderBy('id', 'DESC')->get();

            $componentArray = [
                "skillsData" => $skillsData,
                "skillsListsData" => $skillsListsData
            ];
        } elseif ($keyword == "social-media") {
            $socialMediaData = SocialMedia::all();

            $componentArray = [
                "socialMediaData" => $socialMediaData
            ];
        } elseif ($keyword == "contact-section") {
            $contactSectionData = ContactSection::all();

            $componentArray = [
                "contactSectionData" => $contactSectionData
            ];
        } elseif ($keyword == "contact-me-informations") {
            $contactMeInformationData = ContactMeInformation::all();

            $componentArray = [
                "contactMeInformationData" => $contactMeInformationData
            ];
        } elseif ($keyword == "messages") {
            $messageData = Message::all();

            $componentArray = [
                "messageData" => $messageData
            ];
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

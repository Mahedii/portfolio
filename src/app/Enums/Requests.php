<?php

namespace App\Enums;

enum Requests: string
{
    public const HERO_SECTIONS = "App\Http\Requests\HeroSectionRequest";
    public const TYPED_TEXTS = "App\Http\Requests\TypedTextsRequest";
    public const WORK_HISTORIES = "App\Http\Requests\WorkHistoryRequest";
    public const WORK_HISTORY_LISTS = "App\Http\Requests\WorkHistoryListRequest";
    public const EDUCATION_HISTORIES = "App\Http\Requests\EducationHistoryRequest";
    public const EDUCATION_HISTORY_LISTS = "App\Http\Requests\EducationHistoryListRequest";
}

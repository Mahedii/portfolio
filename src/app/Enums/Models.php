<?php

namespace App\Enums;

enum Models: string
{
    public const HERO_SECTIONS = "App\Models\HeroSection\HeroSection";
    public const TYPED_TEXTS = "App\Models\HeroSection\TypedTexts";
    public const COMMON_FILES = "App\Models\CommonFiles\CommonFiles";
    public const WORK_HISTORIES = "App\Models\WorkHistory\WorkHistory";
    public const WORK_HISTORY_LISTS = "App\Models\WorkHistory\WorkHistoryList";
    public const EDUCATION_HISTORIES = "App\Models\EducationHistory\EducationHistory";
    public const EDUCATION_HISTORY_LISTS = "App\Models\EducationHistory\EducationHistoryList";
    public const SKILLS = "App\Models\Skills\Skills";
    public const SKILLS_LISTS = "App\Models\Skills\SkillsList";
}

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
    public const SKILLS = "App\Http\Requests\SkillRequest";
    public const SKILLS_LISTS = "App\Http\Requests\SkillsListRequest";
    public const ABOUT_MYSELVES = "App\Http\Requests\AboutMyselfRequest";
    public const SOCIAL_MEDIA = "App\Http\Requests\SocialMediaRequest";
    public const CONTACT_SECTIONS = "App\Http\Requests\Contact\ContactSectionRequest";
    public const CONTACT_ME_INFORMATION = "App\Http\Requests\Contact\ContactMeInformationRequest";
    public const MESSAGES = "App\Http\Requests\Contact\MessageRequest";
    public const MARQUEE_TEXTS = "App\Http\Requests\MarqueeText\MarqueeTextRequest";
}

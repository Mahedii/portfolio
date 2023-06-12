<?php

namespace App\Enums;

enum Requests: string
{
    case hero_sections = "App\Http\Requests\HeroSectionRequest";
    case typed_texts = "App\Http\Requests\TypedTextsRequest";
}

<?php

return [
    'Tables' => [
        'hero_sections' => 'hero_sections',
        'typed_texts' => 'typed_texts',
    ],

    'Models' => [
        'hero_sections' => 'App\Models\HeroSection\HeroSection',
        'typed_texts' => 'App\Models\HeroSection\TypedTexts',
    ],

    'Requests' => [
        'hero_sections' => 'App\Http\Requests\HeroSectionRequest',
        'typed_texts' => 'App\Http\Requests\TypedTextsRequest',
    ]
];

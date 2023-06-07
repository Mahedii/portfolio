<?php

namespace App\Models\HeroSection;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypedTexts extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'slug',
    ];
}

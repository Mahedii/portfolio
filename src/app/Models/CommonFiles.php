<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommonFiles extends Model
{
    use HasFactory;

    protected $fillable = [
        'table_name',
        'table_id',
        'file_slug',
        'file_path',
    ];
}

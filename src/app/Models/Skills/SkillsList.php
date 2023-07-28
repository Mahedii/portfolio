<?php

namespace App\Models\Skills;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SkillsList extends Model
{
    use HasFactory;

    public function getEncryptedTableNameAttribute()
    {
        return Crypt::encryptString($this->getTable());
    }

    protected $fillable = [
        'skill_name',
        'skill_description',
        'icon_name',
        'file_path',
        'slug',
        'creator',
        'editor',
    ];
}

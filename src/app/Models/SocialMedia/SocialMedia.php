<?php

namespace App\Models\SocialMedia;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SocialMedia extends Model
{
    use HasFactory;

    public function getEncryptedTableNameAttribute()
    {
        return Crypt::encryptString($this->getTable());
    }

    protected $fillable = [
        'name',
        'url',
        'icon_name',
        'file_path',
        'slug',
        'creator',
        'editor',
    ];
}

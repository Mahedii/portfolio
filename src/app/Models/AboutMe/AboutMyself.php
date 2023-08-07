<?php

namespace App\Models\AboutMe;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AboutMyself extends Model
{
    use HasFactory;

    public function getEncryptedTableNameAttribute()
    {
        return Crypt::encryptString($this->getTable());
    }

    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'file_path',
        'slug',
        'creator',
        'editor',
    ];
}

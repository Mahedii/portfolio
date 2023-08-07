<?php

namespace App\Models\ContactMe;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContactSection extends Model
{
    use HasFactory;

    public function getEncryptedTableNameAttribute()
    {
        return Crypt::encryptString($this->getTable());
    }

    protected $fillable = [
        'title',
        'subtitle',
        'slug',
        'creator',
        'editor',
    ];
}

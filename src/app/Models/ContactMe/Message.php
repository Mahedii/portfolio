<?php

namespace App\Models\ContactMe;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use HasFactory;

    public function getEncryptedTableNameAttribute()
    {
        return Crypt::encryptString($this->getTable());
    }

    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
        'slug',
        'creator',
        'editor',
    ];
}

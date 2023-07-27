<?php

namespace App\Models\EducationHistory;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EducationHistoryList extends Model
{
    use HasFactory;

    public function getEncryptedTableNameAttribute()
    {
        return Crypt::encryptString($this->getTable());
    }

    protected $fillable = [
        'institute_name',
        'degree',
        'year',
        'slug',
        'creator',
        'editor',
    ];
}

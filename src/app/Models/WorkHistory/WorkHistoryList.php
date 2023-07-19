<?php

namespace App\Models\WorkHistory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class WorkHistoryList extends Model
{
    use HasFactory;

    public function getEncryptedTableNameAttribute()
    {
        return Crypt::encryptString($this->getTable());
    }

    protected $fillable = [
        'company_name',
        'role',
        'duration',
        'role_description',
        'slug',
        'creator',
        'editor',
    ];
}

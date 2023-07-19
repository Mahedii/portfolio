<?php

namespace App\Models\CommonFiles;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class CommonFiles extends Model
{
    use HasFactory;

    public function getEncryptedTableNameAttribute()
    {
        return Crypt::encryptString($this->getTable());
    }

    protected $fillable = [
        'table_name',
        'table_row_id',
        'file_slug',
        'file_path',
        'creator',
        'editor',
    ];
}

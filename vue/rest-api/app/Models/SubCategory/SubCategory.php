<?php

namespace App\Models\SubCategory;

use App\Models\Category\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'name', 'slug'];

    public function cargo()
    {
        return $this->belongsTo(Category::class);
    }
}

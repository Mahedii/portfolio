<?php

namespace App\Models\Expenses\SubCategory;

use App\Models\Expenses\Category\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'subcategory_name', 'slug'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public static function getSubcategoriesWithCategory()
    {
        return static::with(['category' => function ($query) {
            $query->select('id', 'category_name');
        }])->orderBy('id', 'desc')->get();
    }

    public static function getSelectedSubcategoriesWithCategory($categoryId)
    {
        return static::with(['category' => function ($query) {
            $query->select('id', 'category_name');
        }])->where('category_id', $categoryId)->orderBy('id', 'desc')->get();
    }
}

<?php

namespace App\Models\Expenses\Category;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['parent_id', 'category_name', 'slug'];

    public static function getSubcategoriesWithCategory(): Collection
    {
        // return static::where('parent_id', '!=', null)->orderBy('id', 'desc')->get();
        // $subcategories = static::whereNotNull('parent_id')->orderBy('id', 'desc')->get();
        $subcategories = static::orderBy('id', 'desc')->get();

        // Add parent category names to each subcategory
        $subcategories = $subcategories->map(function ($subcategory) {
            $parentCategoryNames = static::getParentCategoryNames($subcategory->parent_id);
            $subcategory->setAttribute('parent_category_names', $parentCategoryNames);

            return $subcategory;
        });

        return $subcategories;
    }

    private static function getParentCategoryNames($parentId): string
    {
        $parentCategoryNames = [];
        while ($parentId) {
            $parentCategory = static::find($parentId);
            if ($parentCategory) {
                array_unshift($parentCategoryNames, $parentCategory->category_name);
                $parentId = $parentCategory->parent_id;
            } else {
                $parentId = null;
            }
        }

        return implode('->', $parentCategoryNames);
    }

    public static function getSelectedSubcategoriesWithCategory($categoryId)
    {
        return static::where('parent_id', $categoryId)->orderBy('id', 'desc')->get();
    }
}

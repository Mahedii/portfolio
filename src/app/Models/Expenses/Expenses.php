<?php

namespace App\Models\Expenses;

use App\Models\Unit\Unit;
use App\Models\Payment\PaymentMethods;
use Illuminate\Database\Eloquent\Model;
use App\Models\Expenses\Category\Category;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Expenses extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'amount', 'quantity', 'unit_id', 'expense_date', 'remarks', 'payment_method_id'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }


    public function paymentMethod(): BelongsTo
    {
        return $this->belongsTo(PaymentMethods::class, 'payment_method_id')->select('id', 'method');
    }

    public static function getAllExpenseList()
    {
        // return static::orderBy('id', 'desc')->get();
        $expenseList = static::with('paymentMethod')->orderBy('id', 'desc')->get();
        $expenseList = $expenseList->map(function ($expense) {
            $parentCategoryNames = static::getParentCategoryNames($expense->category_id);
            $expense->setAttribute('parent_category_names', $parentCategoryNames);

            // $paymentMethod = $expense->paymentMethod;

            return $expense;
        });

        return $expenseList;
    }

    private static function getParentCategoryNames($parentId): string
    {
        $parentCategoryNames = [];
        while ($parentId) {
            $parentCategory = Category::find($parentId);
            if ($parentCategory) {
                array_unshift($parentCategoryNames, $parentCategory->category_name);
                $parentId = $parentCategory->parent_id;
            } else {
                $parentId = null;
            }
        }

        return implode('->', $parentCategoryNames);
    }
}

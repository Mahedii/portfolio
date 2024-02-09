<?php

namespace App\Models\Filter;

use App\Models\Expenses\Expenses;
use App\Models\Payment\PaymentMethods;
use Illuminate\Database\Eloquent\Model;
use App\Models\Expenses\Category\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Filter extends Model
{
    use HasFactory;

    public function paymentMethod(): BelongsTo
    {
        return $this->belongsTo(PaymentMethods::class, 'payment_method_id')->select('id', 'method');
    }

    public static function getFilteredResultForExpenses($request): Collection
    {
        $query = Expenses::query();
        $query->with('paymentMethod:id,method');

        $query->when($request->filled('category_id'), function ($q) use ($request) {
            $q->where('category_id', $request->category_id);
        });

        $query->when($request->filled('payment_method'), function ($q) use ($request) {
            $q->where('payment_method_id', $request->payment_method);
        });

        $query->when($request->filled('expense_date') || ($request->filled('from_date') && $request->filled('to_date')), function ($q) use ($request) {
            $q->where(function ($subQuery) use ($request) {
                $subQuery->when($request->has('expense_date'), function ($subQ) use ($request) {
                    $subQ->whereDate('expense_date', $request->expense_date);
                });

                $subQuery->when($request->has('from_date') && $request->has('to_date'), function ($subQ) use ($request) {
                    $subQ->orWhereBetween('expense_date', [$request->from_date, $request->to_date]);
                });
            });
        });

        $result = $query->get();
        $result = $result->map(function ($expense) {
            $parentCategoryNames = static::getParentCategoryNames($expense->category_id);
            $expense->setAttribute('parent_category_names', $parentCategoryNames);

            return $expense;
        });

        return $result;
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

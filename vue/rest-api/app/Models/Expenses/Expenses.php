<?php

namespace App\Models\Expenses;

use Illuminate\Database\Eloquent\Model;
use App\Models\Expenses\Category\Category;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Expenses extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'amount', 'expense_date', 'remarks', 'payment_method', 'lender_id'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}

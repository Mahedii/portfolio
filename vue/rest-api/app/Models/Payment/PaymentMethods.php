<?php

namespace App\Models\Payment;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentMethods extends Model
{
    use HasFactory;

    protected $fillable = ['method', 'status', 'slug'];

    public static function getPaymentMethods()
    {
        return static::orderBy('id', 'desc')->get();
    }
}

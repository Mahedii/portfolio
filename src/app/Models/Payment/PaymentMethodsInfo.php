<?php

namespace App\Models\Payment;

use App\Models\Payment\PaymentMethods;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentMethodsInfo extends Model
{
    use HasFactory;

    protected $fillable = ['payment_method_id','account_name', 'account_number', 'bank_name', 'expire_date', 'cvc'];

    public function paymentMethods(): BelongsTo
    {
        return $this->belongsTo(PaymentMethods::class, 'payment_method_id');
    }

    public static function getPaymentMethodsWithInfo($id)
    {
        return static::with(['paymentMethods' => function ($query) {
            $query->select('id', 'method');
        }])->where('payment_method_id', $id)->orderBy('id', 'desc')->get();
    }
}

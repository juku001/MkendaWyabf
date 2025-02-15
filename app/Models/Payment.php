<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'registration_id',
        'ref_id',
        'txn_id',
        'phone',
        'amount',
        'payment_method_id',
        'status',
        'response'
    ];

    public function registration()
    {
        return $this->belongsTo(Registration::class);
    }


    public function paymentMethod(){
        return $this->belongsTo(PaymentMethod::class);
    }
}


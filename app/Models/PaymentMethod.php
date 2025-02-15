<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $fillable = [
        'id',
        'name',
        'logo',
        'type',
        'key'
    ];

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable = [
        'id',
        'title',
        'first_name',
        'last_name',
        'email',
        'phone',
        'country',
        'organization',
        'additional_info',
        'registered_as',
        'status'
    ];

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}

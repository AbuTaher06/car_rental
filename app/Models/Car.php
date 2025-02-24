<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\Guard;

class Car extends Model
{
    protected $guarded=['id'];

    protected $casts = [
        'availability' => 'boolean',
    ];

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }
}


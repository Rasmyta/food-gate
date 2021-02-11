<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    // It's necessary if we use Eloquent method 'save' to insert new Restaurant
    protected $fillable = [
        'name', 'address', 'city', 'phone', 'email', 'latitude', 'longitude'
    ];
}

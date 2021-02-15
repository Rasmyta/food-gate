<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Restaurant;

class Dish extends Model
{
    use HasFactory;

    public function getRestaurant()
    {
        return $this->belongsTo(Restaurant::class, 'restaurant_id');
    }
}

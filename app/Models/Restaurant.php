<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Dish;
use App\Models\Order;

class Restaurant extends Model
{
    use HasFactory;

    // It's necessary if we use Eloquent method 'save' to insert new Restaurant
    protected $fillable = [
        'name', 'address', 'city', 'phone', 'email', 'latitude', 'longitude'
    ];

    public function getDishes()
    {
        return $this->hasMany(Dish::class);
    }

    public function getOrders()
    {
        return $this->hasMany(Order::class);
    }
}

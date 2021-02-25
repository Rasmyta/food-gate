<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Restaurant;
use App\Models\Category;
use App\Models\Order;

class Dish extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id', 'restaurant_id', 'name', 'description', 'price', 'photo_path'
    ];

    public function getRestaurant()
    {
        return $this->belongsTo(Restaurant::class, 'restaurant_id');
    }

    public function getCategory()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function getOrders()
    {
        return $this->belongsToMany(Order::class, 'dish_order');
    }
}

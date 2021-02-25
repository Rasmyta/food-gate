<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Dish;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id', 'restaurant_id', 'deliveryman_id', 'state'
    ];

    public function getDishes()
    {
        return $this->belongsToMany(Dish::class, 'dish_order');
    }
}

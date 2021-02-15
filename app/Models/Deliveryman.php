<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deliveryman extends Model
{
    use HasFactory;

    public static function getDeliverymen()
    {
        $deliverymen = User::all()->filter(function ($user) {
            return $user->role->name === 'Deliveryman';
        });

        return $deliverymen;
    }
}

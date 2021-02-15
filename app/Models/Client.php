<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    public static function getClients()
    {
        $clients = User::all()->filter(function ($user) {
            return $user->role->name === 'Client';
        });

        return $clients;
    }
}

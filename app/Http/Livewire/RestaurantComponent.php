<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Restaurant;

class RestaurantComponent extends Component
{
    use WithPagination;
    private $prefix = 'intranet.restaurants.';

    public function render()
    {
        // if (Auth::user()->role->name == "Administrator") {
        //     $restaurants = Restaurant::paginate(10);
        // } else {
        //     $restaurants = Restaurant::where('user_id', '=', Auth::id())->paginate(10);
        // }
        $restaurants = Restaurant::paginate(10);
        return view('intranet.restaurants.index', ['restaurants' => $restaurants]);
    }
}

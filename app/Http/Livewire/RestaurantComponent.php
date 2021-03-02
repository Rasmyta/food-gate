<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Restaurant;

class RestaurantComponent extends Component
{
    use WithPagination;

    public $search = "";
    public $sortField = "name";
    public $sortDirection = 'asc';

    protected $queryString = ['sortField', 'sortDirection'];

    public function render()
    {
        if (Auth::user()->role->name == "Administrator") {
            $restaurants = Restaurant::search($this->search)->orderBy($this->sortField, $this->sortDirection)
                ->paginate(10);
        } else {
            $restaurants = Restaurant::where('user_id', '=', Auth::id())->search($this->search)->orderBy($this->sortField, $this->sortDirection)
                ->paginate(10);
        }
        return view('livewire.restaurant-component', [
            'restaurants' => $restaurants
        ]);
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }


        $this->sortField = $field;
    }
}

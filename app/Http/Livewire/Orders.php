<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class Orders extends Component
{
    use WithPagination;

    public $restaurant;

    public function mount($restaurant)
    {
        $this->restaurant = $restaurant;
    }

    public function render()
    {
        return view('livewire.orders');
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;

class OrderTable extends Component
{
    public $orders;
    public $restaurant;
    public $state  = 'received';
    protected $listeners = ['changeState'];

    public function mount($restaurant)
    {
        $this->restaurant = $restaurant;
    }

    public function render()
    {
        $this->orders = $this->restaurant->getOrders->where('state', $this->state);
        return view('livewire.order-table');
    }

    public function changeState($state)
    {
        $this->state = $state;
    }
}

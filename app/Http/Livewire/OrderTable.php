<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class OrderTable extends Component
{
    public $orders;
    public $restaurant;
    public $state  = 'received';
    public $showEditModal = false;
    public Order $editing;

    protected $listeners = ['changeState'];

    protected $rules = [
        'editing.state' => 'required',
        'editing.deliveryman_id' => 'integer'
    ];

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

    public function edit(Order $order)
    {
        $this->editing = $order;
        $this->showEditModal = true;
    }

    public function save()
    {
        $this->validate();
        $this->editing->save();
        $this->showEditModal = false;
    }
}

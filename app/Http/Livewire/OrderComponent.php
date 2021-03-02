<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class OrderComponent extends Component
{
    public $orders;
    public $restaurant;
    public $state = 'received';
    public $showEditModal = false;
    public Order $editing;

    protected $listeners = ['changeState'];

    public function rules()
    {
        return [
            'editing.state' => 'required|in:' . collect(Order::STATUSES)->keys()->implode(','),
            'editing.deliveryman_id' => 'integer'
        ];
    }

    public function mount($restaurant = "", $orders = "")
    {
        $this->restaurant = $restaurant;
        $this->orders = $orders;
    }

    public function render()
    {
        if (!empty($this->restaurant)) {
            $this->orders = $this->restaurant->getOrders->where('state', $this->state);
        }
        return view('livewire.order-component');
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

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

    // Getting parameters from OrderController
    public function mount($restaurant = "")
    {
        $this->restaurant = $restaurant;
    }

    public function render()
    {
        // add pagination if it is possible
        if (!empty($this->restaurant)) {
            $this->orders = $this->restaurant->getOrders->where('state', $this->state)->sortBy('created_at');
        } else {
            if (auth()->user()->role->name === 'Deliveryman') {
                $this->orders = Order::where('state', 'prepared')
                    ->where('deliveryman_id', auth()->user()->id)
                    ->orWhere('deliveryman_id', null)
                    ->orderBy('created_at')->get();
            } else {
                $this->orders = Order::orderBy('created_at')->get();
            }
        }

        return view('livewire.order-component');
    }

    // Method emitted from parent component to filter by states
    public function changeState($state)
    {
        $this->state = $state;
    }

    public function edit(Order $order)
    {
        $this->editing = $order;
        $this->showEditModal = true;
    }

    public function deliver(Order $order, $userId)
    {
        $this->editing = $order;
        $this->editing->deliveryman_id = $userId;
        $this->save();
    }

    public function save()
    {
        $this->validate();
        $this->editing->save();
        $this->showEditModal = false;
    }
}

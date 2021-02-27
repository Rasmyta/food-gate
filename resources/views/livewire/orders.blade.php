<div>
    <button wire:click="$emit('changeState', 'received')" class="tablink" onclick="changeBackground(this, '#f6c23e')"
        id="defaultOpen">Received</button>
    <button wire:click="$emit('changeState', 'prepared')" class="tablink"
        onclick="changeBackground(this, '#4e73df')">Prepared</button>
    <button wire:click="$emit('changeState', 'delivered')" class="tablink"
        onclick="changeBackground(this, '#1cc88a')">Delivered</button>
    <button wire:click="$emit('changeState', 'canceled')" class="tablink"
        onclick="changeBackground(this, '#e74a3b')">Canceled</button>

    @livewire('order-table', ['restaurant' => $restaurant])

</div>

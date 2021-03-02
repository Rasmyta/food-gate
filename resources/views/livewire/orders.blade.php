<div>
    <button wire:click="$emit('changeState', 'received')" class="tablink" id="defaultOpen"
        onclick="changeBackground(this, '#f6c23e')">Received</button>
    <button wire:click="$emit('changeState', 'prepared')" class="tablink"
        onclick="changeBackground(this, '#4e73df')">Prepared</button>
    <button wire:click="$emit('changeState', 'delivered')" class="tablink"
        onclick="changeBackground(this, '#1cc88a')">Delivered</button>
    <button wire:click="$emit('changeState', 'canceled')" class="tablink"
        onclick="changeBackground(this, '#e74a3b')">Canceled</button>

    <div class="tabcontent">
        @livewire('order-component', ['restaurant' => $restaurant])
    </div>

</div>

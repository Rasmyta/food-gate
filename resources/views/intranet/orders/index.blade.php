<x-intranet-layout>
    <x-slot name="header">
        <h1 class="h3 mb-0 text-gray-800">
            @if (isset($restaurant))
                {{ $restaurant->name }} {{ __('orders') }}
            @else
                {{ __('Orders') }}
            @endif
        </h1>
    </x-slot>

    @livewire('orders', ['orders'=>$orders, 'restaurant' => $restaurant])

</x-intranet-layout>

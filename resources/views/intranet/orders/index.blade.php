<x-intranet-layout>
    <x-slot name="header">
        <h1 class="h3 mb-0 text-gray-800">
            {{ __('Orders') }}
        </h1>
    </x-slot>

    <!-- Content Row 1 -->
    <ul>
        @foreach ($orders as $order)
            <li>{{ $order->id }}</li>
            <li>{{ $order->client_id }}</li>
            <li>{{ $order->restaurant_id }}</li>
            <li>{{ $order->dish_id }}</li>
            <li>{{ $order->deliveryman_id }}</li>
            <li>{{ $order->state }}</li>
            <li>{{ $order->created_at }}</li>
            <li>{{ $order->updated_at }}</li>
        @endforeach
    </ul>

</x-intranet-layout>

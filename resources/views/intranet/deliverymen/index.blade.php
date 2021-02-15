<x-intranet-layout>
    <x-slot name="header">
        <h1 class="h3 mb-0 text-gray-800">
            {{ __('Delivery men') }}
        </h1>
    </x-slot>

    <!-- Content Row 1 -->
    <ul>
        @foreach ($deliverymen as $deliveryman)
            <li>{{ $deliveryman->name }} {{ $deliveryman->surname }}</li>
        @endforeach
    </ul>

</x-intranet-layout>

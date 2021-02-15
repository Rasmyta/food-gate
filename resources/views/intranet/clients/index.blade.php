<x-intranet-layout>
    <x-slot name="header">
        <h1 class="h3 mb-0 text-gray-800">
            {{ __('Clients') }}
        </h1>
    </x-slot>

    <ul>
        @foreach ($clients as $client)
            <li>{{ $client->name }} {{ $client->surname }}</li>
        @endforeach
    </ul>

    {{-- <div class="mx-auto">
        <div>{{ $clients->links() }}</div>
    </div> --}}


</x-intranet-layout>

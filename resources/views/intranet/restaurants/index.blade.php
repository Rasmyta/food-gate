<x-intranet-layout>
    <x-slot name="header">
        <h1 class="h3 mb-0 text-gray-800">
            {{ __('Restaurants') }}
        </h1>
    </x-slot>

    <!-- Content Row 1 -->
    <div class="row">

        <a href="/intranet/restaurants/create">
            <button class="btn btn-primary">Crear tu restaurante</button>
        </a>

        <table class="table table-striped table-bordered table-sm" width="100%">
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>City</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>

            @forelse ($restaurants as $restaurant)
                <tr>
                    <td>{{ $restaurant->name }}</td>
                    <td>{{ $restaurant->address }}</td>
                    <td>{{ $restaurant->city }}</td>
                    <td>{{ $restaurant->phone }}</td>
                    <td>{{ $restaurant->email }}</td>
                    <td>
                        <a href="/intranet/restaurants/{{ $restaurant->id }}/delete"><i class="fas fa-trash-alt"></i></a>
                        <a href="/intranet/restaurants/{{ $restaurant->id }}/edit"><i class="fas fa-edit"></i></a>
                        <a href="/intranet/restaurants/{{ $restaurant->id }}"><i class="fas fa-eye"></i></a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td>No restaurants found.</td>
                </tr>
            @endforelse

        </table>

        {{-- @if ($restaurants->links())
            <div class="mx-auto">
                <div>{{ $restaurants->links() }}</div>
            </div>
        @endif --}}

    </div>

</x-intranet-layout>

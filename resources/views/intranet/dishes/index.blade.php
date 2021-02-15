<x-intranet-layout>
    <x-slot name="header">
        <h1 class="h3 mb-0 text-gray-800">
            {{ $restaurant->name }} {{ __('dishes') }}
        </h1>
    </x-slot>

    <!-- Content Row 1 -->
    <div class="">

        <div class="d-flex flex-row my-3 justify-content-between align-items-center">
            <div>Search</div>
            @can('create', \App\Models\Dish::class)
                <div>
                    <a href="/intranet/dishes/create">
                        <button class="btn btn-primary"><i class="fas fa-plus"></i> New</button>
                    </a>
                </div>
            @endcan

        </div>

        <ul>
            @foreach ($dishes as $dish)
                <li>{{ $dish->name }} {{ $dish->description }}</li>
            @endforeach
        </ul>



    </div>

</x-intranet-layout>

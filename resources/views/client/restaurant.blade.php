<x-app-layout>

    <div class="container">
        <div class="mb-4">
            <h2>Restaurant {{ $restaurant->name }}</h2>
            <p>{{ $restaurant->address }} | {{ $restaurant->city }}</p>
        </div>

        <h2 class="mb-4">Dishes</h2>

        @if ($errors->any())
            <p class='text-danger mb-3'>{{ $errors->first() }}</p>
        @endif

        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4">
            @foreach ($dishes as $dish)
                <div class="col mb-4">
                    <div class="card h-100">
                        @isset($dish->photo_path)
                            <img src="{{ Storage::disk('diskdishes')->url($dish->photo_path) }}" alt="{{ $dish->name }}"
                                class="card-img-top h-45" />
                        @endisset
                        <div class="card-body">
                            <a href="/dish/{{ $dish->id }}">
                                <h5 class="card-title">{{ $dish->name }}</h5>
                            </a>
                            <span>{{ $dish->price }} &euro;</span>
                        </div>
                        <div class="card-footer">
                            <a href="/cart/add/{{ $dish->id }}" class="text-muted">Add to cart</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</x-app-layout>

<x-app-layout>

    <div class="container" style="min-height: 70vh">
        <h2 class="mb-4">{{ $dish->name }}</h2>

        @if ($errors->any())
            <p class='text-danger mb-3'>{{ $errors->first() }}</p>
        @endif


        <div class="card mb-3">
            <div class="row no-gutters">
                <div class="col-md-3">
                    @isset($dish->photo_path)
                        <img src="{{ Storage::disk('diskdishes')->url($dish->photo_path) }}" alt="{{ $dish->name }}"
                            class="card-img-top h-45" />
                    @endisset
                </div>
                <div class="col-md-9">
                    <div class="card-body">
                        <p class="card-text">{{ $dish->description }}</p>
                        <a href="/cart/add/{{ $dish->id }}" class="card-text">Add to cart</a>
                    </div>
                </div>
            </div>
        </div>
        <a href="/restaurant/{{ $restaurant->id }}" class="btn btn-secondary">Back to menu</a>
    </div>

</x-app-layout>

<x-app-layout>

    <div>
        <h2 class="mb-5">Restaurants</h2>

        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-3">
            @foreach ($restaurants as $restaurant)
                <div class="col mb-4">
                    <div class="card">

                        <img src=" @if ($restaurant->photo_path) {{ Storage::disk('diskrestaurant')->url($restaurant->photo_path) }}
                    @else {{ Storage::disk('diskrestaurant')->url('default.png') }} @endif"
                        alt="{{ $restaurant->name }}" class="card-img-top" style="height: 14rem;" />

                        <div class="card-body">
                            <a href="/restaurant/{{ $restaurant->id }}">
                                <h5 class="card-title">{{ $restaurant->name }}</h5>
                            </a>
                            <small class="text-muted">{{ $restaurant->address }} | {{ $restaurant->city }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mx-2">{{ $restaurants->links() }}</div>
    </div>

</x-app-layout>

<x-app-layout>


    <div class="container">
        <h2>Restaurants</h2>

        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-3">
            @foreach ($restaurants as $restaurant)
                <div class="col my-4">
                    <div class="card h-100">
                        @isset($restaurant->photo_path)
                            <img src="{{ url($restaurant->photo_path) }}" alt="{{ $restaurant->name }}"
                                class="card-img-top h-45" />
                        @endisset
                        <div class="card-body">
                            <a href="/restaurant/{{ $restaurant->id }}">
                                <h5 class="card-title">{{ $restaurant->name }}</h5>
                            </a>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted"></small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


    </div>

</x-app-layout>

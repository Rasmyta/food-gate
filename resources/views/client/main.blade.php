<x-app-layout>


    <div>
        <h2>Popular dishes</h2>

        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4">
            @foreach ($dishes as $dish)
                <div class="col my-4">
                    <div class="card h-100">
                        @isset($dish->photo_path)
                            <img src="{{ Storage::disk('diskdishes')->url($dish->photo_path) }}" alt="{{ $dish->name }}"
                                class="card-img-top h-45" />
                        @endisset
                        <div class="card-body">
                            <a href="/dish/{{ $dish->id }}">
                                <h5 class="card-title">{{ $dish->name }}</h5>
                            </a>
                            <p class="card-text">{{ $dish->description }}</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Add to cart</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


    </div>

</x-app-layout>

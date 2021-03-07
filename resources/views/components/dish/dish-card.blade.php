<div class="card">
    <img src="{{ Storage::disk('diskdishes')->url($dish->photo_path) }}" class="card-img-top"
        alt="{{ $dish->name }}">
    <div class="card-body">
        <div class="d-flex">
            <a href="/dish/{{ $dish->id }}">
                <h5 class="card-title pr-2">{{ $dish->name }}</h5>
            </a>
            <span>{{ $dish->price }} &euro;</span>
        </div>
    </div>

    @can('create', App\Models\Order::class)
        <div class="card-footer ">
            <a href="/cart/add/{{ $dish->id }}" class="text-muted font-bold">Add to cart</a>
        </div>
    @else
        <div class="card-footer ">
            <button type="button" class="text-muted font-bold" disabled title="Disabled for intranet users">Add to
                cart</button>
        </div>
    @endcan

</div>

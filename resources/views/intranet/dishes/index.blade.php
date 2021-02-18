<x-intranet-layout>
    <x-slot name="header">
        <h1 class="h3 mb-0 text-gray-800">
            {{ $restaurant->name }} {{ __('dishes') }}
        </h1>
    </x-slot>

    <!-- Content Row 1 -->
    <div class="">

        <div class="d-flex flex-row my-3 justify-content-between align-items-center">
            <div>{{ __('Search') }}</div>
            @can('create', \App\Models\Dish::class)
                <div>
                    <a href="#" data-toggle="modal" data-target="#createDish">
                        <button class="btn btn-primary"><i class="fas fa-plus"></i> New</button>
                    </a>
                </div>
            @endcan

        </div>

        <table class="table table-striped table-bordered table-sm" width="100%">
            <tr>
                <th>Photo</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>

            @forelse ($dishes as $dish)
                <tr>
                    <td>
                        @isset($dish->photo_path)
                            <img src="{{ url($dish->photo_path) }}" alt="{{ $dish->name }}" style="width: 100px" />
                        @endisset
                    </td>
                    <td>{{ $dish->name }}</td>
                    <td>{{ $dish->getCategory->name }}</td>
                    <td>{{ $dish->price }} &euro;</td>
                    <td>{{ $dish->description }}</td>
                    <td>
                        <a href="/intranet/dishes/{{ $dish->id }}/delete"><i class="fas fa-trash-alt"></i></a>
                        <a href="/intranet/dishes/{{ $dish->id }}/edit"><i class="fas fa-edit"></i></a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No dishes found.</td>
                </tr>
            @endforelse

        </table>

        <div class="mx-auto">
            {{-- <div>{{ $dishes->links() }}</div> --}}
        </div>

    </div>

    <!-- Create dish modal -->
    <div class="modal fade" id="createDish" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <form method="POST" action="/intranet/dishes" enctype="multipart/form-data" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">New dish</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" class="@error('name') is-invalid @enderror" name="name" id="name"
                            type="text" value="{{ old('name') }}">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <input class="form-control" class="@error('category') is-invalid @enderror" name="category"
                            id="category" type="text" value="{{ old('category') }}">
                        @error('category')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input class="form-control" class="@error('price') is-invalid @enderror" name="price" id="price"
                            type="text" value="{{ old('price') }}">
                        @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control" cols="30"
                            rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="photo_path">Photo</label>
                        <input type="file" name="photo_path" id="photo_path" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="restaurant_id" value="{{ $restaurant->id }}">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit dish modal -->


</x-intranet-layout>

<x-intranet-layout>
    <x-slot name="header">
        <h1 class="h3 mb-0 text-gray-800">
            {{ __('Categories') }}
        </h1>
    </x-slot>

    <div class="d-flex flex-row my-3 justify-content-between align-items-center">
        <div>Search</div>
        {{-- @can('create', \App\Models\Restaurant::class) --}}
        <div>
            <a href="#" data-toggle="modal" data-target="#createCategory">
                <button class="btn btn-primary"><i class="fas fa-plus"></i> New</button>
            </a>
        </div>
        {{-- @endcan --}}
    </div>

    <ul class="column-counted">
        @foreach ($categories as $category)
            <div class="group-links d-flex flex-row align-items-center">
                <button class="hidden-btn hidden-edit open-edit-modal" data-toggle="modal" data-target="#editCategory"
                    data-edit-link="/intranet/categories/{{ $category->id }}"
                    data-edit-name="{{ $category->name }}"><i class="fas fa-edit"></i></button>
                <a href="/intranet/categories/{{ $category->id }}/delete" class="hidden-btn hidden-delete"><i
                        class="fas fa-trash-alt"></i></a>
                <li>{{ $category->name }}</li>
            </div>
        @endforeach
    </ul>

    <!-- Create category modal -->
    <div class="modal fade" id="createCategory" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form method="POST" action="/intranet/categories" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">New category</h5>
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit category modal -->
    <div class="modal fade" id="editCategory" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form method="POST" action="" class="modal-content">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" class="@error('name') is-invalid @enderror" name="name" id="name"
                            type="text" value="">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="btn-save" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>

</x-intranet-layout>

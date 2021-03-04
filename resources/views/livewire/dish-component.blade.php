<div>

    <div class="d-flex flex-row my-3 justify-content-between align-items-center">
        <div class="col-lg-4 col-md-10 col-sm-12 p-0">
            <x-input.text wire:model="search" placeholder="Search dishes by name..." name="search-dish" />
        </div>
        @can('create', \App\Models\Dish::class)
            <div>
                <button wire:click="create" class="btn btn-primary"><i class="fas fa-plus"></i> New</button>
            </div>
        @endcan
    </div>

    <x-table.table>
        <x-slot name="head">
            <x-table.heading>Photo</x-table.heading>
            <x-table.heading sortable wire:click="sortBy('name')"
                :direction="$sortField === 'name' ? $sortDirection : null">Name</x-table.heading>
            <x-table.heading>Category</x-table.heading>
            <x-table.heading sortable wire:click="sortBy('price')"
                :direction="$sortField === 'price' ? $sortDirection : null">Price</x-table.heading>
            <x-table.heading class="w-50">Description</x-table.heading>
            <x-table.heading>Actions</x-table.heading>
        </x-slot>

        <x-slot name="body">
            @forelse ($dishes as $dish)
                <x-table.row>
                    <x-table.cell>
                        @isset($dish->photo_path)
                            <img src="{{ Storage::disk('diskdishes')->url($dish->photo_path) }}" alt="{{ $dish->name }}"
                                style="width: 100px" />
                        @endisset
                    </x-table.cell>
                    <x-table.cell>{{ $dish->name }}</x-table.cell>
                    <x-table.cell>{{ $dish->getCategory->name }}</x-table.cell>
                    <x-table.cell>{{ $dish->price }} €</x-table.cell>
                    <x-table.cell>{{ $dish->description }}</x-table.cell>
                    <x-table.cell>
                        <button wire:click="edit({{ $dish->id }})" class="p-1" title="Edit"><i
                                class="fas fa-edit"></i></button>
                        <button wire:click="deleteId({{ $dish->id }})" class="p-1" title="Delete"><i
                                class="fas fa-trash-alt"></i></button>
                    </x-table.cell>
                </x-table.row>
            @empty
                <tr>
                    <td colspan="6">No dishes found.</td>
                </tr>
            @endforelse
        </x-slot>
    </x-table.table>

    <div class="mx-2">{{ $dishes->links() }}</div>

    <!-- Create / Update Dish Modal -->
    <form wire:submit.prevent="save">
        <x-modal.dialog wire:model.defer="showModal">
            <x-slot name="title">Edit dish</x-slot>
            <x-slot name="content">

                <x-input.group label="Name" for="name" :error="$errors->first('editing.name')">
                    <x-input.text wire:model="editing.name" name="name" />
                </x-input.group>

                <div class="form-row">
                    <x-input.group class="col-md-6" label="Search for categories">
                        <x-input.text wire:model="category" name="categoryInput"
                            placeholder="Enter a name to search for categories." />
                    </x-input.group>

                    <x-input.group label="Pick a category" class="col-md-6" for="category_id"
                        :error="$errors->first('category_id')">
                        <x-input.select wire:model="editing.category_id" name="category_id">
                            @forelse ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @empty
                                <option value="">No matching result was found.</option>
                            @endforelse
                        </x-input.select>
                    </x-input.group>
                </div>

                <x-input.group label="Price €" for="price" :error="$errors->first('editing.price')">
                    <x-input.text wire:model="editing.price" name="price" />
                </x-input.group>

                {{-- <x-input.group label="Description" for="description" :error="$errors->first('editing.description')">
                    <x-input.textarea wire:model="editing.description" name="description" />
                </x-input.group> --}}

                <x-input.group label="Photo" for="photo_path" :error="$errors->first('upload')">
                    <x-input.file name="photo_path" wire:model="upload" />
                </x-input.group>

            </x-slot>
            <x-slot name="footer">
                <button wire:click="$set('showModal', false)" class="btn btn-secondary">Cancel</button>
                <button class="btn btn-primary" type="submit">Save</button>
            </x-slot>

        </x-modal.dialog>
    </form>

    <!-- Delete Restaurant Modal -->
    <form wire:submit.prevent="delete">
        <x-modal.confirmation wire:model.defer="showDeleteModal">
            <x-slot name="title">Delete Dish</x-slot>

            <x-slot name="content">
                <div class="py-8 text-cool-gray-700">Are you sure? This action is irreversible.</div>
            </x-slot>

            <x-slot name="footer">
                <button wire:click="$set('showDeleteModal', false)" type="button"
                    class="btn btn-secondary">Cancel</button>
                <button class="btn btn-primary" type="submit">Delete</button>
            </x-slot>
        </x-modal.confirmation>
    </form>

</div>

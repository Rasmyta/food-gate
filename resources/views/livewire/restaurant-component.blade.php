 <div class="">

     <div class="d-flex flex-row my-3 justify-content-between align-items-center">
         <div class="col-lg-4 col-md-10 col-sm-12 p-0">
             <x-input.text wire:model="search" placeholder="Search restaurants by name or city..."
                 name="search-restaurant" />
         </div>
         @can('create', \App\Models\Restaurant::class)
             <div>
                 <a href="/intranet/restaurants/create">
                     <button class="btn btn-primary"><i class="fas fa-plus"></i> New</button>
                 </a>
             </div>
         @endcan
     </div>

     <x-table.table>
         <x-slot name="head">
             <x-table.heading sortable wire:click="sortBy('name')"
                 :direction="$sortField === 'name' ? $sortDirection : null">Name</x-table.heading>
             <x-table.heading sortable wire:click="sortBy('address')"
                 :direction="$sortField === 'address' ? $sortDirection : null">Address</x-table.heading>
             <x-table.heading sortable wire:click="sortBy('city')"
                 :direction="$sortField === 'city' ? $sortDirection : null">City</x-table.heading>
             <x-table.heading sortable wire:click="sortBy('phone')"
                 :direction="$sortField === 'phone' ? $sortDirection : null">Phone</x-table.heading>
             <x-table.heading sortable wire:click="sortBy('email')"
                 :direction="$sortField === 'email' ? $sortDirection : null">Email</x-table.heading>
             <x-table.heading>Actions</x-table.heading>
         </x-slot>
         <x-slot name="body">
             @forelse ($restaurants as $restaurant)
                 <x-table.row>
                     <x-table.cell>{{ $restaurant->name }}</x-table.cell>
                     <x-table.cell>{{ $restaurant->address }}</x-table.cell>
                     <x-table.cell>{{ $restaurant->city }}</x-table.cell>
                     <x-table.cell>{{ $restaurant->phone }}</x-table.cell>
                     <x-table.cell>{{ $restaurant->email }}</x-table.cell>
                     <x-table.cell>
                         <a href="/intranet/restaurants/{{ $restaurant->id }}" title="Details"><i
                                 class="fas fa-eye"></i></a>
                         <a href="/intranet/dishes/{{ $restaurant->id }}" title="Menu"><i
                                 class="fas fa-clipboard-list"></i></a>
                         <a href="/intranet/orders/{{ $restaurant->id }}" title="Orders"><i
                                 class="fas fa-cart-arrow-down"></i></a>
                         <a href="/intranet/restaurants/{{ $restaurant->id }}/edit" title="Edit"><i
                                 class="fas fa-edit"></i></a>
                         <a href="/intranet/restaurants/{{ $restaurant->id }}/delete" title="Delete"><i
                                 class="fas fa-trash-alt"></i></a>
                     </x-table.cell>
                 </x-table.row>

             @empty
                 <tr>
                     <td colspan="6">No restaurants found.</td>
                 </tr>
             @endforelse
         </x-slot>
     </x-table.table>

     <div class="mx-2">{{ $restaurants->links() }}</div>

 </div>

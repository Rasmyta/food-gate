<div>
    <table class="table table-hover table-sm" width="100%">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Client</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th>Deliveryman</th>
                <th>State</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            @forelse ($orders as $order)

                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->getClient->name }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>{{ $order->updated_at }}</td>
                    @if (isset($order->getDeliveryman))
                        <td>{{ $order->getDeliveryman->name }}</td>
                    @else
                        <td>not assigned</td>
                    @endif
                    <td>{{ $order->state }}</td>
                    <td>
                        <button wire:click="edit({{ $order->id }})" class="btn btn-primary" title="Edit state"><i
                                class="fas fa-edit"></i></button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No orders found.</td>
                </tr>
            @endforelse
        </tbody>

    </table>

    <form wire:submit.prevent="save">
        <x-modal.dialog wire:model.defer="showEditModal">
            <x-slot name="title">Edit state</x-slot>
            <x-slot name="content">

                <x-input.group :error="$errors->first('name')">
                    <x-input.select wire:model="editing.state" name="state">
                        {{-- @can('update', \App\Models\Order::class)
                            <option value="received">Received</option>
                            <option value="prepared">Prepared</option>
                            <option value="canceled">Canceled</option>
                        @endcan --}}
                        <option value="received">Received</option>
                        <option value="prepared">Prepared</option>
                        <option value="canceled">Canceled</option>
                        @if (auth()->user()->role->name === 'Deliveryman')
                            {{-- <option value="prepared">Prepared</option> --}}
                            <option value="delivered">Delivered</option>
                        @endif
                    </x-input.select>
                </x-input.group>

            </x-slot>
            <x-slot name="footer">
                <button wire:click="$set('showEditModal', false)" class="btn btn-secondary">Cancel</button>
                <button class="btn btn-primary" type="submit">Save</button>
            </x-slot>

        </x-modal.dialog>
    </form>
</div>

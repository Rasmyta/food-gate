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
                        <td>{{ $order->getDeliveryman->name }} {{ $order->getDeliveryman->surname }}</td>
                    @else
                        <td>not assigned</td>
                    @endif
                    <td>{{ $order->state }}</td>
                    <td>
                        {{-- CHANGE WITH @CAN because admin cant edit order, only manager or deliveryman --}}
                        @if (auth()->user()->role->name !== 'Deliveryman')
                            <button wire:click="edit({{ $order->id }})" class="btn btn-primary" title="Edit state"><i
                                    class="fas fa-edit"></i></button>
                        @elseif (auth()->user()->role->name === 'Deliveryman' && auth()->id() ===
                            $order->deliveryman_id)
                            <button wire:click="edit({{ $order->id }})" class="btn btn-primary" title="Edit state"><i
                                    class="fas fa-edit"></i></button>
                        @endif
                        @if (auth()->user()->role->name === 'Deliveryman' && $order->deliveryman_id == null)
                            <button wire:click="deliver({{ $order->id }}, {{ auth()->id() }})"
                                class="btn btn-primary">Deliver</i></button>
                        @endif
                        {{-- CHANGE WITH --@CAN --}}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No orders found.</td>
                </tr>
            @endforelse
        </tbody>

    </table>

    {{-- <div class="mx-2">{{ $orders->links() }}</div> --}}

    <form wire:submit.prevent="save">
        <x-modal.dialog wire:model.defer="showEditModal">
            <x-slot name="title">Edit Order</x-slot>
            <x-slot name="content">

                <x-input.group :error="$errors->first('editing.state')">
                    <x-input.select wire:model="editing.state" name="state">
                        @if (auth()->user()->role->name === 'Restaurant_manager')
                            <option value="received">Received</option>
                            <option value="prepared">Prepared</option>
                            <option value="canceled">Canceled</option>
                        @endif
                        @if (auth()->user()->role->name === 'Deliveryman')
                            <option value="prepared">Prepared</option>
                            <option value="delivered">Delivered</option>
                        @endif
                    </x-input.select>
                </x-input.group>

            </x-slot>
            <x-slot name="footer">
                <x-button.secondary wire:click="$set('showEditModal', false)">Cancel</x-button.secondary>
                <x-button.primary type="submit">Save</x-button.primary>
            </x-slot>

        </x-modal.dialog>
    </form>
</div>

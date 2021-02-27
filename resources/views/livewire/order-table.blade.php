<div class="tabcontent">
    <table class="table table-hover table-sm" width="100%">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Client</th>
                <th>Created at</th>
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
                    @if (isset($order->getDeliveryman))
                        <td>{{ $order->getDeliveryman->name }}</td>
                    @else
                        <td>not assigned</td>
                    @endif
                    <td>{{ $order->state }}</td>
                    <td>
                        <button wire:click="edit({{ $order->id }})" class="btn btn-primary"><i
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
                <div class="form-group">
                    <label for="state">State</label>
                    <input wire:model="editing.state" class="form-control" name="state" id="state" type="text" value="">
                    @error('editing.state')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </x-slot>
            <x-slot name="footer">
                <button class="btn btn-secondary">Cancel</button>
                <button class="btn btn-primary" type="submit">Save</button>
            </x-slot>

        </x-modal.dialog>
    </form>
</div>

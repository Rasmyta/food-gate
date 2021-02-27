<div class="tabcontent">
    <table class="table table-hover table-sm" width="100%">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Client</th>
                <th>Created at</th>
                <th>Deliveryman</th>
                <th>State</th>
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
                </tr>
            @empty
                <tr>
                    <td colspan="6">No orders found.</td>
                </tr>
            @endforelse
        </tbody>

    </table>
</div>

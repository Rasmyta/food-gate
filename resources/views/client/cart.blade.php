<x-app-layout>

    <div class="grid_12" style="min-height: 70vh">
        <h3 class="mb-4">Shopping cart</h3>

        @if (count(Cart::content()))
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </thead>

                    <tbody>
                        @foreach (Cart::content() as $item)
                            <tr>
                                <td><a href="/dish/{{ $item->id }}">{{ $item->name }}</a></td>
                                <td>{{ $item->price }} &euro;</td>
                                <td>{{ $item->qty }}</td>
                                <td>{{ $item->price * $item->qty }} &euro;</td>
                                <td>
                                    <form action="/cart/delete" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <button type="submit" class="btn btn-link btn-sm text-danger">x</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td>Subtotal:</td>
                            <td colspan="2"></td>
                            <td>{{ Cart::subtotal() }} &euro;</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Tax:</td>
                            <td colspan="2"></td>
                            <td>{{ Cart::tax() }} &euro;</td>
                            <td></td>
                        </tr>
                        <tr class="font-weight-bold">
                            <td>Total:</td>
                            <td></td>
                            <td>{{ Cart::count() }}</td>
                            <td>{{ Cart::total() }} &euro;</td>
                            <td></td>
                        </tr>
                    </tbody>

                </table>
            </div>

            <form method="POST" action="/orders">
                @csrf
                <input type="hidden" name="client_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="cart" value="{{ Cart::content() }}">
                <button type="submit" class="btn btn-success float-right">Make an order</button>
            </form>

        @else
            <p>Cart is empty</p>
        @endif

    </div>

</x-app-layout>

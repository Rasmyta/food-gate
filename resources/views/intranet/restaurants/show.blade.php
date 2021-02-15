<x-intranet-layout>
    {{-- <x-slot name="header">
        <h1 class="h3 mb-0 text-gray-800">
            {{ $restaurant->name }}
        </h1>
    </x-slot> --}}

    <div class="row">

        <div class="card" style="width: 35rem;">
            <div class="card-header">
                <h5 class="card-title">Restaurant details</h5>
            </div>

            <div class="card-body">
                <div class="form-group">
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th>Name</th>
                                <td>{{ $restaurant->name }}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{ $restaurant->address }}</td>
                            </tr>
                            <tr>
                                <th>City</th>
                                <td>{{ $restaurant->city }}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{ $restaurant->phone }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $restaurant->email }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="form-group">
                        <a class="btn btn-danger" href="/intranet/restaurants/{{ $restaurant->id }}/delete">Delete</a>
                        <a class="btn btn-warning" href="/intranet/restaurants/{{ $restaurant->id }}/edit">Edit</a>
                    </div>
                </div>
            </div>
        </div>

    </div>

</x-intranet-layout>

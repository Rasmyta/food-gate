<x-intranet-layout>
    <x-slot name="header">
        <h1 class="h3 mb-0 text-gray-800">
            {{ $title }}
        </h1>
    </x-slot>

    {{-- <div class="row">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div> --}}

    <div class="row">

        <form method="POST" action="/intranet/restaurants/{{ $restaurant->id }}">
            {{-- !important --}}
            @csrf
            @method('PUT')
            {{-- !important --}}
            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" class="@error('name') is-invalid @enderror" name="name" id="name"
                    type="text" value="{{ $restaurant->name }}">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input class="form-control" class="@error('address') is-invalid @enderror" name="address" id="address"
                    type="text" value="{{ $restaurant->address }}">
                @error('address')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input class="form-control" class="@error('city') is-invalid @enderror" name="city" id="city"
                    type="text" value="{{ $restaurant->city }}">
                @error('city')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input class="form-control" class="@error('phone') is-invalid @enderror" name="phone" id="phone"
                    type="text" value="{{ $restaurant->phone }}">
                @error('phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" class="@error('email') is-invalid @enderror" name="email" id="email"
                    type="email" value="{{ $restaurant->email }}">
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="latitude">Latitude</label>
                <input class="form-control" class="@error('latitude') is-invalid @enderror" name="latitude"
                    id="latitude" type="text" value="{{ $restaurant->latitude }}">
                @error('latitude')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="longitude">Longitude</label>
                <input class="form-control" class="@error('longitude') is-invalid @enderror" name="longitude"
                    id="longitude" type="text" value="{{ $restaurant->longitude }}">
                @error('longitude')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <a href="/intranet/restaurants/{{ $restaurant->id }}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-success">Update</button>
        </form>

    </div>

</x-intranet-layout>

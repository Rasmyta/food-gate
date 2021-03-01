<x-intranet-layout>
    <x-slot name="header">
        <h1 class="h3 mb-0 text-gray-800">
            {{ __('Edit restaurant') }}
        </h1>
    </x-slot>

    <div class="row">

        <form method="POST" action="/intranet/restaurants/{{ $restaurant->id }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <x-input.group label="Name" for="name" :error="$errors->first('name')">
                <x-input.text name="name" value="{{ $restaurant->name }}" />
            </x-input.group>

            <x-input.group label="Address" for="address" :error="$errors->first('address')">
                <x-input.text name="address" value="{{ $restaurant->address }}" />
            </x-input.group>

            <x-input.group label="City" for="city" :error="$errors->first('city')">
                <x-input.text name="city" value="{{ $restaurant->city }}" />
            </x-input.group>

            <x-input.group label="Phone" for="phone" :error="$errors->first('phone')">
                <x-input.text name="phone" value="{{ $restaurant->phone }}" />
            </x-input.group>

            <x-input.group label="Email" for="email" :error="$errors->first('email')">
                <x-input.email name="email" value="{{ $restaurant->email }}" />
            </x-input.group>

            <x-input.group label="Latitude" for="latitude" :error="$errors->first('latitude')">
                <x-input.text name="latitude" value="{{ $restaurant->latitude }}" />
            </x-input.group>

            <x-input.group label="Longitude" for="longitude" :error="$errors->first('longitude')">
                <x-input.text name="longitude" value="{{ $restaurant->longitude }}" />
            </x-input.group>

            <x-input.group label="Photo" for="photo_path" :error="$errors->first('photo_path')">
                <x-input.file name="photo_path" />
            </x-input.group>

            <a href="/intranet/restaurants/{{ $restaurant->id }}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-success">Update</button>
        </form>

    </div>

</x-intranet-layout>

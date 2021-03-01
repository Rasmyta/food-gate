<x-intranet-layout>
    <x-slot name="header">
        <h1 class="h3 mb-0 text-gray-800">
            {{ __('New restaurant') }}
        </h1>
    </x-slot>

    <div class="row">

        <form method="POST" action="/intranet/restaurants" enctype="multipart/form-data">
            @csrf
            <x-input.group label="Name" for="name" :error="$errors->first('name')">
                <x-input.text name="name" value="{{ old('name') }}" />
            </x-input.group>

            <x-input.group label="Address" for="address" :error="$errors->first('address')">
                <x-input.text name="address" value="{{ old('address') }}" />
            </x-input.group>

            <x-input.group label="City" for="city" :error="$errors->first('city')">
                <x-input.text name="city" value="{{ old('city') }}" />
            </x-input.group>

            <x-input.group label="Phone" for="phone" :error="$errors->first('phone')">
                <x-input.text name="phone" value="{{ old('phone') }}" />
            </x-input.group>

            <x-input.group label="Email" for="email" :error="$errors->first('email')">
                <x-input.email name="email" value="{{ old('email') }}" />
            </x-input.group>

            <x-input.group label="Latitude" for="latitude" :error="$errors->first('latitude')">
                <x-input.text name="latitude" value="{{ old('latitude') }}" />
            </x-input.group>

            <x-input.group label="Longitude" for="longitude" :error="$errors->first('longitude')">
                <x-input.text name="longitude" value="{{ old('longitude') }}" />
            </x-input.group>

            <x-input.group label="Photo" for="photo_path" :error="$errors->first('photo_path')">
                <x-input.file name="photo_path" />
            </x-input.group>

            <a href="/intranet/restaurants/" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-success">Create</button>
        </form>

    </div>

</x-intranet-layout>

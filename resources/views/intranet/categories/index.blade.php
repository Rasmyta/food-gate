<x-intranet-layout>
    <x-slot name="header">
        <h1 class="h3 mb-0 text-gray-800">
            {{ __('Categories') }}
        </h1>
    </x-slot>

    <ul>
        @foreach ($categories as $categorie)
            <li>{{ $categorie->name }}</li>
        @endforeach
    </ul>

    <div class="mx-auto">
        <div>{{ $categories->links() }}</div>
    </div>

</x-intranet-layout>

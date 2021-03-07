<div class="category-component">

    <div class="search-category d-flex flex-column justify-content-center align-items-center mb-4
    p-5 rounded-lg text-white">
        <div class="p-3">
            <h1 class="text-capitalize"><strong>Choose your type of cuisine</strong></h1>
            <div class="col-md-12">
                <x-input.text wire:model="search" placeholder="Write a name..." autofocus name="category" class="p-2">
                </x-input.text>
            </div>
        </div>
    </div>


    <ul class="column-counted">
        @foreach ($categories as $category)
            <div class="group-links d-flex flex-row align-items-center">
                <li>{{ $category->name }}</li>
            </div>
        @endforeach
    </ul>

</div>

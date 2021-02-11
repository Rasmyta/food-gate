<ul class="navbar-nav mr-auto">
    <x-jet-nav-link href="{{ route('main') }}" :active="request()->routeIs('main')">
        {{ __('Home') }}
    </x-jet-nav-link>
    @if (Auth::user()->role->name != 'Client')
        <x-jet-nav-link href="{{ route('intranet') }}" :active="request()->routeIs('intranet')">
            {{ __('Intranet') }}
        </x-jet-nav-link>
    @endif
</ul>

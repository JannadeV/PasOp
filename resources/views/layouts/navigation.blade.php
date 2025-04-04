
<nav x-data="{ open: false }"
     class="bg-white border-b border-oranje3 w-full flex justify-around items-baseline pt-6">

    <div class="w-full h-20 top-0 bg-white z-30 absolute"></div>

    <!-- Logo -->
    <div class="self-center -top-2 relative z-40">
        <a href="{{ route('dashboard') }}">
            <img class="h-14 w-auto" src="{{ asset('img/titel.png') }}" alt="Naam van de app: Pas op een dier">
        </a>
    </div>

    <!-- Desktop menu -->
    <x-navigation.nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
        Dashboard
    </x-navigation.nav-link>
    <x-navigation.nav-link :href="route('huisdier.overview')" :active="request()->routeIs('huisdier.overview')">
        Huisdieroverzicht
    </x-navigation.nav-link>

    <!-- Desktop Settings dropdown -->
    @auth
    <div class="hidden sm:flex sm:items-center">
        <x-navigation.dropdown :mobile=false>
            <x-slot name="trigger">
                <div>{{ Auth::user()->name }}</div>
                <div class="ms-1">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </div>
            </x-slot>

            <x-slot name="content">
                <x-navigation.dropdown-link :href="route('profile.edit')">
                    {{ __('Profiel') }}
                </x-navigation.dropdown-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-navigation.dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log uit') }}
                    </x-navitgation.dropdown-link>
                </form>
            </x-slot>
        </x-navigation.dropdown>
    </div>
    @endauth


    <!-- Mobile menu -->
    <div class="flex sm:hidden">
        <x-navigation.dropdown :mobile=true>
            <x-slot name="trigger">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </x-slot>
            <x-slot name="content">
                @auth
                <div class="px-4">
                    <div class="font-medium text-base text-gray-700">
                        {{ Auth::user()->name }}
                    </div>
                    <div class="font-medium text-sm text-gray-500">
                        {{ Auth::user()->email }}
                    </div>
                </div>
                @endauth

                <div class="pt-2 pb-3 space-y-1">
                    @auth
                    <x-navigation.responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-navigation.responsive-nav-link>
                    @endauth
                    <x-navigation.responsive-nav-link :href="route('huisdier.overview')" :active="request()->routeIs('huisdier.overview')">
                        {{ __('Huisdieroverzicht') }}
                    </x-navigation.responsive-nav-link>
                    @auth
                    <x-navigation.responsive-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                        {{ __('Profiel') }}
                    </x-navigation.responsive-nav-link>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-navigation.responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Log uit') }}
                        </x-navigation.responsive-nav-link>
                    </form>
                    @endauth
                </div>
            </x-slot>
        </x-navigation.dropdown>
    </div>

</nav>

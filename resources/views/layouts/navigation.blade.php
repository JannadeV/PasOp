
<nav x-data="{ open: false }"
     class="bg-white border-b border-oranje3 w-full">


    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative flex justify-between h-16 bg-white z-30">
            <div class="flex">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <img class="h-14" src="{{ asset('img/titel.png') }}" alt="Naam van de app: Pas op een dier">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <div class="mt-3 space-y-1">
                        <x-navigation.responsive-nav-link :href="route('dashboard')">
                            Dashboard
                        </x-navigation.responsive-nav-link>
                        <x-navigation.responsive-nav-link :href="route('huisdier.overview')">
                            Huisdieroverzicht
                        </x-navigation.responsive-nav-link>
                        <x-navigation.responsive-nav-link :href="route('profile.edit')">
                            Profiel
                        </x-navigation.responsive-nav-link>
                    </div>
                </div>
            </div>

            <!--TODO dit is vet voor op groter scherm-->
            @auth
            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-navigation.dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-navigation.dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-navigation.dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-navigation.dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-navitgation.dropdown-link>
                        </form>
                    </x-slot>
                </x-navigation.dropdown>
            </div>
            @endauth

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->

    <div :class="{'top-0': open, '-top-full': ! open}" class="mt-16 right-0 w-3/4 border-x-2 border-b-2 border-oranje3 block rounded-b-lg oranje1 absolute z-20 transition-all duration-500">

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
    </div>
    <div :class="{'overlay-aan': open, 'overlay-uit': ! open}" class="transition duration-500 absolute w-screen h-screen z-10"></div>
</nav>

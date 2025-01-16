<x-guest-layout class="overflow-scroll">
    <img src="img/dweilhond.png" alt="hond met lang haar" class="absolute w-16 h-auto left-4 top-24">

    <main class="flex flex-col">

        <!-- inloggen -->
        <section>
            <div class="relative -top-2">
                <img class="absolute w-full h-auto" src="img/blob_inloggen.png" alt="Achtergrondblob">
            </div>

            <h1 class="relative w-full text-4xl z-10 text-right right-7">Log in</h1>

            <form class="relative w-4/5 -top-2 linkstien" method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input.input-label for="email" :value="__('Email')" />
                    <x-input.text-input id="email" class="input block w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input.input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-1">
                    <x-input.input-label class="inline-block" for="password" :value="__('Password')" />

                    <!-- Forgot password -->
                    <div class="items-center justify-end inline-block relative left-14">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                    </div>

                    <x-input.text-input id="password" class="block w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />

                    <x-input.input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <button type="submit" class="inline-block relative top-3">
                    <img src="img/button_paw.png" alt="Ga">
                </button>

                <!-- Remember Me -->
                <div class="inline-block -top-6 left-1/3 relative">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                        <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                    </label>
                </div>

            </form>
        </section>

        <p class="relative left-1/2 -top-3">of</p>

        <!-- registreren -->
        <section class="relative -top-3">

            <h1 class="relative text-4xl pl-5">Registreer</h1>

            <form class="relative w-4/5 linkstien mt-2" method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-input.input-label for="name" :value="__('Name')" />
                    <x-input.text-input id="name" class="block w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input.input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-1">
                    <x-input.input-label for="email" :value="__('Email')" />
                    <x-input.text-input id="email" class="block w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input.input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-1">
                    <x-input.input-label for="password" :value="__('Password')" />

                    <x-input.text-input id="password" class="block w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />

                    <x-input.input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-1">
                    <x-input.input-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-input.text-input id="password_confirmation" class="block w-full"
                                    type="password"
                                    name="password_confirmation" required autocomplete="new-password" />

                    <x-input.input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <button type="submit" class="relative pt-2 w-full">
                    <img class="block ml-auto" src="img/button_paw.png" alt="Ga">
                </button>
            </form>
        </section>
    </main>
</x-guest-layout>

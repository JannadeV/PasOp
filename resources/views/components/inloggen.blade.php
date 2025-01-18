<section {{ $attributes->merge(['class' => 'relative w-full']) }}>
    <img class="absolute w-full h-full" src="img/blob_inloggen.png" alt="Achtergrondblob">

    <form class="relative w-4/5 h-full linkstien flex flex-col justify-around" method="POST" action="{{ route('login') }}">
        @csrf

        <h1 class="w-full text-4xl z-10 text-right">Log in</h1>

        <div>
            <!-- Email Address -->
            <div>
                <x-input.input-label for="email" :value="__('Email')" />
                <x-input.text-input id="email" class="input block w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input.input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-1">
                <div class="flex justify-between">
                    <x-input.input-label for="password" :value="__('Password')" />

                    <!-- Forgot password -->
                    <div class="items-center relative">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm sm:text-base text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                    </div>
                </div>

                <x-input.text-input id="password" class="block w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />

                <x-input.input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="relative items-end">
                <label for="remember_me" class="right-1 inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                    <span class="ms-2 text-sm sm:text-base text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>
        </div>

        <button class="relative left-4 w-1/4" type="submit">
            <img class="w-4/5" src="img/button_paw.png" alt="Ga">
        </button>

    </form>
</section>

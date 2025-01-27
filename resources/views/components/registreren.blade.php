<section class="relative">
    <form class="relative w-4/5 h-full linkstien flex flex-col justify-evenly" method="POST" action="{{ route('register') }}">
        @csrf

        <h1 class="relative text-4xl pl-5">Registreer</h1>

        <div>
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
        </div>

        <button type="submit" class="relative py-2 w-1/4 left-3/4">
            <img class="relative w-4/5" src="{{ asset('img/button_paw.png') }}" alt="Ga">
        </button>
    </form>
</section>

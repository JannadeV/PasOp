<x-guest-layout>
    <main class="relative h-full">
        <img class="absolute z-40 w-20 md:w-24 lg:w-32 h-auto left-4 -top-8" src="img/dweilhond.png" alt="hond met lang haar">
        <img class="absolute z-40 w-20 md:w-32 lg:w-40 h-auto right-6 top-1/2" src="img/poolhond.png" alt="poolhond">

        <div class="relative landscape:hidden grid grid-welkom-portait h-full">
            <x-inloggen class="h-full"></x-inloggen>
            <p class="relative left-1/2 -top-4 text-lg">of</p>
            <x-registreren></x-registreren>
        </div>

        <div class="relative portrait:hidden grid grid-welkom-landscape h-full">
            <x-inloggen class="h-2/3 my-auto"></x-inloggen>
            <x-registreren></x-registreren>
        </div>

    </main>
</x-guest-layout>

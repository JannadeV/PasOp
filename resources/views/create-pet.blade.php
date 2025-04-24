<x-app-layout>

    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            Nieuw dier
        </h1>
    </x-slot>

    <form onsubmit="return validateForm()"
          action="{{ route('huisdier.store') }}"
          method="POST"
          class="w-3/4 mx-auto p-4 flex flex-col gap-6 items-center justify-evenly">
        @csrf
        <p class="text-center">Let op, de informatie die u hier geeft kan niet meer aangepast worden.</p>

        <section class="flex flex-row">
            <label for="name" class="my-auto pr-2">Naam: </label>
            <input type="text" id="name" name="name"><br>
        </section>

        <section class="grid grid-cols-2 justify-items-center gap-2">
            <p class="col-span-2">Soort: </p>
            <div>
                <input type="radio" name="soort" id="hond" value="hond">
                <label for="hond"><i class="fa-solid fa-dog text-gray-700 text-4xl"></i></label>
            </div>
            <div>
                <input type="radio" name="soort" id="kat" value="kat">
                <label for="kat"><i class="fa-solid fa-cat text-gray-700 text-4xl"></i></label>
            </div>
            <div>
                <input type="radio" name="soort" id="vogel" value="vogel">
                <label for="vogel"><i class="fa-solid fa-feather text-gray-700 text-4xl"></i></label>
            </div>
            <div>
                <input type="radio" name="soort" id="paard" value="paard">
                <label for="paard"><i class="fa-solid fa-horse text-gray-700 text-4xl"></i></label>
            </div>
            <div>
                <input type="radio" name="soort" id="vis" value="vis">
                <label for="vis"><i class="fa-solid fa-fish text-gray-700 text-4xl"></i></label>
            </div>
            <div>
                <input type="radio" name="soort" id="anders" value="anders">
                <label for="anders"><i class="fa-solid fa-ellipsis text-gray-700 text-4xl"></i></label>
            </div>
        </section>

        <!--<p>Voeg een foto van het dier toe</p>
        <x-input.add-picture class="absolute left-1/4 w-1/2 h-full" :route="route('dierfotos.store')" fotoname="dierfoto"/>-->

        <x-button.primary-button type="submit" class="mx-auto">Maak het dier aan</x-button.primary-button>

    </form>
</x-app-layout>

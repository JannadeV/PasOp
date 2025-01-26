<x-app-layout>

    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            Maak een nieuw huisdier aan
        </h1>
    </x-slot>

    <form onsubmit="return validateForm()" action="{{ route('huisdier.store') }}" method="POST">
        @csrf
        <p>Let op, de informatie die u hier geeft kan niet meer aangepast worden.</p>

        <label for="name">Naam: </label>
        <input type="text" id="name" name="name"><br>

        <p>Soort: </p>
        <input type="radio" name="soort" id="hond" value="hond">
        <label for="hond"><i class="fa-solid fa-dog text-gray-700 text-4xl"></i></label>
        <input type="radio" name="soort" id="kat" value="kat">
        <label for="kat"><i class="fa-solid fa-cat text-gray-700 text-4xl"></i></label>
        <input type="radio" name="soort" id="vogel" value="vogel">
        <label for="vogel"><i class="fa-solid fa-feather text-gray-700 text-4xl"></i></label>
        <input type="radio" name="soort" id="paard" value="paard">
        <label for="paard"><i class="fa-solid fa-horse text-gray-700 text-4xl"></i></label>
        <input type="radio" name="soort" id="vis" value="vis">
        <label for="vis"><i class="fa-solid fa-fish text-gray-700 text-4xl"></i></label>
        <input type="radio" name="soort" id="anders" value="anders">
        <label for="anders"><i class="fa-solid fa-ellipsis text-gray-700 text-4xl"></i></label>

        <!--<p>Voeg een foto van het dier toe</p>
        <x-input.add-picture :route="route('dierfotos.store')" fotoname="dierfoto"/>-->

        <x-button.primary-button type="submit">Maak het dier aan</x-button.primary-button>

    </form>
</x-app-layout>

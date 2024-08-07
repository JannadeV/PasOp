<x-app-layout>
    <script>
        validateForm = () => {

        }
    </script>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            Maak een nieuw huisdier aan
        </h2>
    </x-slot>

    <form onsubmit="return validateForm()" action="{{ route('pet.store') }}" method="POST">
        @csrf
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
        <label for="anders"><i class="fa-solid fa-question text-gray-700 text-4xl"></i></label>
    </form>
</x-app-layout>

<x-app-layout class="overflow-scroll">

    <script>
        function validateForm () {
            // Zoek alle checkboxen
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');

            // Loop door alle checkboxen en controleer of er minstens één is aangevinkt
            let isChecked = false;
            for (let i = 0; i < checkboxes.length; i++) {
                if (checkbox.checked) {
                    isChecked = true;
                    break;
                }
            };

            // Als er geen checkbox is aangevinkt, toon dan een melding en voorkom dat het formulier wordt ingediend
            if (!isChecked) {
                alert('Selecteer minstens één optie voordat je doorgaat.');
                console.log("geen checkbox");
                return false; // Voorkom dat het formulier wordt ingediend
            } else {
                console.log("wel checkbox");
            }
        }
    </script>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $huisdier->naam }}
        </h2>
    </x-slot>

    <div class="grid grid-cols-12">
        <x-image-carousel
            :fotos="$huisdier->dierfotos"
            :huisdier="$huisdier"
            :showAdd="$huisdier->baasje == $user"
            class="col-start-1 col-end-13 h-72">
            <x-slot name="addForm">
                <x-input.add-picture :route="route('dierfotos.store')" fotoname="dierfoto">
                    <x-slot name="connectTo">
                        <input type="hidden" name="huisdier" value="{{ $huisdier->id }}">
                    </x-slot>
                </x-input.add-picture>
            </x-slot>
        </x-image-carousel>
        <!--TODO: BIO toevoegen voor hieronder-->
        <p class="col-start-2 col-end-12 pt-2">Bio Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vel lectus ac tellus tincidunt suscipit sit amet ac sapien.</p>
        @if ($huisdier->baasje == $user)
            <x-button.secondary-button class="col-start-2 col-end-12 mt-3 w-max">Pas aan</x-button.secondary-button>
        @else
            <p class="col-start-2 col-end-12 pt-1 font-bold">Oppastijden</p>
            <div class="col-start-2 col-end-12 flex flex-col border border-gray-300 rounded-lg dark:bg-gray-700 dark:border-gray-600">
                <form onsubmit="return validateForm()" action="{{ route('aanvraag.store') }}" method="POST" class="grid grid-cols-1 dark:text-white border-b border-gray-300">
                    @csrf
                    @foreach($huisdier->oppastijds as $index=>$oppastijd)
                        @if($index%2 == 0)
                            @php($border_side = "border-r")
                        @else
                            @php($border_side = "")
                        @endif
                        <div class="col-span-1 {{$border_side}} border-gray-300 dark:border-gray-600">
                            <div class="flex items-center ps-3">
                                <input type="hidden" name="tijden[{{ $index }}][id]" value="{{ $oppastijd->id }}">
                                <input type="checkbox" name="tijden[{{ $index }}][selected]" value="1" id="vue-checkbox{{ $index }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="vue-checkbox{{ $index }}" class="py-3 ms-2 dark:text-gray-300">
                                    <p class="text-xs">{{ date("d-m-'y", strtotime($oppastijd->datum))}}</p>
                                    <p class="text-xs">{{ substr($oppastijd->start, 0, 5) }} - {{ substr($oppastijd->eind, 0, 5) }}</p>
                                </label>
                            </div>
                        </div>
                    @endforeach
                    <x-button.primary-button type="submit" class="justify-self-center self-center m-1">Pas op!</x-button.primary-button>
                </form>
            </div>
        @endif
    </div>
</x-app-layout>

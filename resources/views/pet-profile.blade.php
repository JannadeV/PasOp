<x-app-layout>
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

    <main class="flex flex-col md:flex-row">
        <x-image-carousel
            :fotos="$huisdier->dierfotos"
            :huisdier="$huisdier"
            :showAdd="$huisdier->baasje == $user"
            class="flex-grow md:flex-grow-0 z-0">
            <x-slot name="addForm">
                <x-input.add-picture :route="route('dierfotos.store')" fotoname="dierfoto">
                    <x-slot name="connectTo">
                        <input type="hidden" name="huisdier" value="{{ $huisdier->id }}">
                    </x-slot>
                </x-input.add-picture>
            </x-slot>
        </x-image-carousel>

        <div class="w-4/5 md:h-4/5 mx-auto md:mx-10 my-4 md:my-auto md:pt-4 border border-gray-300 rounded-lg flex flex-col">
            <p class="mx-auto mt-4 font-bold lg:text-lg">Oppastijden</p>
            @if($huisdier->baasje != $user)
            <form onsubmit="return validateForm()"
                  action="{{ route('aanvraag.store') }}"
                  method="POST"
                  class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-2 gap-4 p-4">
                @csrf
                @foreach($huisdier->oppastijds as $index=>$oppastijd)
                    <div class="col-span-1">
                        <div class="flex items-center">
                            <input type="hidden" name="tijden[{{ $index }}][id]" value="{{ $oppastijd->id }}">
                            <input type="checkbox" name="tijden[{{ $index }}][selected]" value="1" id="vue-checkbox{{ $index }}"
                                   class="w-4 h-4 text-blue-600 bg-white border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                            <label for="vue-checkbox{{ $index }}" class="py-3 ms-2">
                                <p class="text-sm">{{ date("d-m-'y", strtotime($oppastijd->datum))}}</p>
                                <p class="text-sm">{{ substr($oppastijd->start, 0, 5) }} - {{ substr($oppastijd->eind, 0, 5) }}</p>
                            </label>
                        </div>
                    </div>
                @endforeach
                <x-button.primary-button type="submit"
                                         class="col-span-2 sm:col-span-3 md:col-span-2 justify-self-center self-center m-1">
                    Pas op!
                </x-button.primary-button>
            </form>
            @else
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-2 gap-4 p-4 justify-items-center">
                @foreach($huisdier->oppastijds as $index=>$oppastijd)
                    <div class="m-1">
                        <div class="flex items-center ps-3">
                            <form method="POST"
                                  action="{{ route('oppastijd.destroy', ['oppastijd' => $oppastijd]) }}"
                                  class="flex flex-row w-full gap-2">
                                @csrf
                                @method('DELETE')
                                <label class="flex-grow">
                                    <p class="text-sm">{{ date("d-m-'y", strtotime($oppastijd->datum))}}</p>
                                    <p class="text-sm">{{ substr($oppastijd->start, 0, 5) }} - {{ substr($oppastijd->eind, 0, 5) }}</p>
                                </label>
                                <button type="submit"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                @endforeach
                <div class="col-span-2 sm:col-span-3 md:col-span-2 m-2 scrollable">
                    <div class="flex items-center ps-3">
                        <form method="POST"
                              action="{{ route('oppastijd.store') }}"
                              class="flex flex-row">
                            @csrf
                            <div class="flex flex-col">
                                <x-input.input-label for="datum" class="hidden">Datum: </x-input.input-label>
                                <x-input.text-input type="date" name="datum" id="datum" class="text-sm p-1"/>
                                <div class="flex flex-row">
                                    <x-input.input-label for="start" class="hidden">Van: </x-input.input-label>
                                    <x-input.text-input type="time" name="start" id="start" class="text-sm p-1"/>
                                    <x-input.input-label for="eind" class="hidden">Tot: </x-input.input-label>
                                    <x-input.text-input type="time" name="eind" id="eind" class="text-sm p-1"/>
                                </div>
                                <input type="hidden" name="huisdier_id" value="{{ $huisdier->id }}">
                            </div>
                            <x-button.small-secondary-button type="submit">
                                <i class="fa-solid fa-plus"></i>
                            </x-button.small-secondary-button>
                        </form>
                    </div>
                </div>
                </div>
            @endif
        </div>
    </main>
</x-app-layout>

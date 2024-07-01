<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            Oppasaanvraag
        </h2>
    </x-slot>
    <div>
        <div class="flex flex-row items-stretch bg-gray-200 w-screen space-x-2 p-2">
            <div class="grid grid-cols-2 grid-rows-3 place-items-center bg-gray-100 border border-solid border-gray-300 rounded-lg">
                <img class="col-span-1 row-span-full h-full w-full object-cover rounded-l-lg" src="{{ asset($aanvraag->oppastijds[0]->huisdier->dierfotos[0]->path) }}" alt="Foto van een huisdier" >
                <h2 class="text-lg">{{ $aanvraag->oppastijds[0]->huisdier->naam }}</h2>
                <p>Bio</p>
                <a href="{{ route('pet.show', ['id' => $aanvraag->oppastijds[0]->huisdier->id]) }}">
                    <x-primary-button>Profiel</x-primary-button>
                </a>
            </div>
            <div class="w-44 grid grid-rows-3 grid-flow-col gap-1 items-center">
                @foreach ($aanvraag->oppastijds as $oppastijd)
                    <div class="w-28 self-center border border-solid border-gray-300 rounded-lg p-2 bg-gray-100">
                        <p class="text-center leading-tight">{{ date("d-m-'y", strtotime($oppastijd->datum)) }}</p>
                        <p class="text-sm text-center leading-tight">{{ substr($oppastijd->start, 0, 5) }} - {{ substr($oppastijd->eind, 0, 5) }}</p>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="relative h-96">
            <div class="flex flex-col h-full place-items-center text-gray-600 space-y-2 py-4 overflow-scroll relative">
                @if (count($aanvraag->oppastijds) > 0)
                    <p>De oppasaanvraag is gedaan</p>
                    @if (count($aanvraag->huisfotos) == 0)
                        <p>.</p>
                        <p>Voeg foto's van uw huis toe zodat het baasje kan bepalen of u op het dier mag passen.</p>
                    @else
                        <p>.</p>
                        <p>De huisfoto's zijn toegevoegd</p>
                        <div class="flex flex-row">
                            @foreach ($aanvraag->huisfotos as $huisfoto)
                                <div>
                                    <img class="h-28 w-20 object-cover rounded-lg relative" src="{{ asset($huisfoto->path) }}" alt="Foto van een huis">
                                    <div class="h-28 w-20 bg-white bg-opacity-30 hover:bg-opacity-0 rounded-lg relative -top-28"></div>
                                </div>
                            @endforeach
                        </div>
                        <p class="-top-28 relative">.</p>
                        @if (!$aanvraag->antwoord)
                            <p class="-top-28 relative text-center">Wacht tot het baasje uw oppasaanvraag beantwoordt.</p>
                        @elseif ($aanvraag->antwoord == 0)
                            <p class="-top-28 relative">Helaas, uw oppasaanvraag is afgekeurd. Probeer het bij een ander dier opnieuw.</p>
                        @else
                            <p class="-top-28 relative">Gefeliciteerd! U kunt op de afgesproken tijden op het dier passen.</p>
                        @endif
                        <p class="-top-28 relative">.</p>
                    @endif
                @endif
                <x-danger-button class="-top-28 relative">Afbreken</x-danger-button>
            </div>
        </div>
    </div>
</x-app-layout>

<x-cards.general-card
    :bigFotoPath="asset(isset($aanvraag->huisfotos[0]->path) ? $aanvraag->huisfotos[0]->path : 'img/huis.png')"
    :bigFotoAlt="'foto van het huis van de oppasser'"
    :title="$aanvraag->oppasser->name . ' wil op ' . $huisdier->naam . ' passen'">

    <x-slot name="topRight">
        <img class="w-24 h-24 shadow rounded-full aspect-square object-cover"
             src="{{ asset($huisdier->dierfotos[0]->path) }}"
             alt="foto van het op te passen dier"/>
    </x-slot>

    <x-slot name="middle">
        <div class="max-h-24 overflow-scroll hidden sm:visible">
            @foreach ($aanvraag->oppastijds as $oppastijd)
            <div class="p-2 border border-solid">
                <p class="text-xs">{{ date("d-m-'y", strtotime($oppastijd->datum))}}</p>
                <p class="text-xs">
                    {{ substr($oppastijd->start, 0, 5) }} - {{ substr($oppastijd->eind, 0, 5) }}
                </p>
            </div>
            @endforeach
        </div>
    </x-slot>

    <x-slot name="button">
        <a href="{{ route('aanvraag.show', ['aanvraag' => $aanvraag]) }}">
            <x-button.primary-button>Naar aanvraag</x-button.primary-button>
        </a>
    </x-slot>

</x-cards.general-card>


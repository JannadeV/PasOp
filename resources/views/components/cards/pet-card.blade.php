@include('popper::assets')
<x-cards.general-card
    :bigFotoPath="asset($huisdier->dierfotos[0]->path)"
    :bigFotoAlt=" 'Foto van een huisdier' "
    :title="$huisdier->naam">

    <x-slot name="topRight">
        @switch( strtolower($huisdier->soort) )
        @case("hond")
            <i class="fa-solid fa-dog text-gray-700 text-4xl"></i>
            @break
        @case("kat")
            <i class="fa-solid fa-cat text-gray-700 text-4xl"></i>
            @break
        @case("vogel")
            <i class="fa-solid fa-feather text-gray-700 text-4xl"></i>
            @break
        @case("paard")
            <i class="fa-solid fa-horse text-gray-700 text-4xl"></i>
            @break
        @case("vis")
            <i class="fa-solid fa-fish text-gray-700 text-4xl"></i>
            @break
        @default
            <i class="fa-solid fa-question text-gray-700 text-4xl"></i>
        @endswitch
    </x-slot>

    <x-slot name="middle">
        @auth
        <div class="max-h-24 overflow-scroll hidden sm:visible">
            @foreach ($huisdier->oppastijds as $oppastijd)
            <div class="p-2 border border-solid">
                <p class="text-xs">{{ date("d-m-'y", strtotime($oppastijd->datum))}}</p>
                <p class="text-xs">{{ substr($oppastijd->start, 0, 5) }} - {{ substr($oppastijd->eind, 0, 5) }}</p>
            </div>
            @endforeach
        </div>
        @endauth
        @guest
        <p>Log in om de oppastijden te zien.</p>
        @endguest
    </x-slot>

    <x-slot name="button">
        @auth
        <a href="{{ route('huisdier.show', ['huisdier' => $huisdier]) }}">
            <x-button.primary-button class="justify-self-end">
                Naar profiel
            </x-button.primary-button>
        </a>
        @endauth
        @guest
        <x-button.disabled-button tooltip="log eerst in" class="justify-self-end">
            Naar profiel
        </x-button.disabled-button>
        @endguest
    </x-slot>

</x-cards.general-card>

<x-app-layout class="overflow-scroll">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="w-full p-3">
        <h2 class="text-lg">Over mij</h2>
        <p class="text-sm ml-1">Naam: {{ $user->name }}</p>
        <p class="text-sm ml-1">Email: {{ $user->email }}</p>
    </div>

    <x-dashboard-section header="Mijn huisdieren" :count="count($huisdieren)">
        <x-slot name="action">
            <x-button.secondary-button action="{{ route('huisdier.create') }}">
                <i class="fa-solid fa-plus"></i>
            </x-button.secondary-button>
        </x-slot>

        <x-slot name="cards">
            @if(count($huisdieren) > 0)
            @foreach ($huisdieren as $huisdier)
                <x-cards.pet-card :huisdier="$huisdier"/>
            @endforeach
            @endif
        </x-slot>
    </x-dashboard-section>

    @if(count($aanvragen) > 0)
    <x-dashboard-section header="Openstaande oppasaanvragen" :count="count($aanvragen)">
        <x-slot name="cards">
            @foreach($aanvragen as $aanvraag)
            <x-cards.aanvraag-card
                :aanvraag="$aanvraag"
                :huisdier="$aanvraag->oppastijds->first()->huisdier"/>
            @endforeach
        </x-slot>
    </x-dashboard-section>
    @endif

    @if(count($afspraken) > 0)
    <x-dashboard-section header="Geaccepteerde oppasaanvragen" :count="count($afspraken)">
        <x-slot name="cards">
            @foreach($afspraken as $afspraak)
            <x-cards.aanvraag-card
                :aanvraag="$afspraak"
                :huisdier="$afspraak->oppastijds->first()->huisdier"/>
            @endforeach
        </x-slot>
    </x-dashboard-section>
    @endif

    @if(count($aangeboden) > 0)
    <x-dashboard-section header="Aangeboden oppasaanvragen" :count="count($aangeboden)">
        <x-slot name="cards">
            @foreach($aangeboden as $aanbod)
            <x-cards.aanvraag-card
                :aanvraag="$aanbod"
                :huisdier="$aanbod->oppastijds->first()->huisdier"/>
            @endforeach
        </x-slot>
    </x-dashboard-section>
    @endif


    @if(count($reviews) > 0)
    <x-dashboard-section header="Mijn reviews" :count="count($reviews)">
        <x-slot name="cards">
            @foreach($reviews as $review)
            <x-cards.review-card :review="$review"/>
            @endforeach
        </x-slot>
    </x-dashboard-section>
    @endif

</x-app-layout>

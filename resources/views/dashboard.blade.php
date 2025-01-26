<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h1>
    </x-slot>

    <main class="relative">

        <div class="flex w-screen pb-2">
            <div class="p-3 flex-1">
                <h3 class="text-xl">Over mij</h3>
                <div class="flex text-sm flex-nowrap">
                    <span class="font-semibold">Naam:</span>
                    <span class="ml-2">{{ $user->name }}</span>
                </div>
                <div class="flex text-sm flex-nowrap">
                    <span class="font-semibold">Email:</span>
                    <span class="ml-2">{{ $user->email }}</span>
                </div>
            </div>

            <div class="flex-shrink px-8 max-w-xs">
                <img class="max-w-full h-auto relative scale-x-[-1]" src="img/kwispel-hond.gif" alt="kwispelende hond">
            </div>
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


    </main>
</x-app-layout>

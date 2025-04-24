<x-app-layout>
    <x-slot name="header">
            {{ __('Dashboard') }}
    </x-slot>

    <main class="relative">

        <div class="flex w-screen pb-2">
            <div class="p-3 flex-1 md:my-auto md:pl-10 lg:pl-20 xl:pl-40">
                <h3 class="text-lg">Over mij</h3>
                <div class="flex text-sm sm:text-base flex-nowrap">
                    <span class="font-semibold">Naam:</span>
                    <span class="ml-2">{{ $user->name }}</span>
                </div>
                <div class="flex text-sm sm:text-base flex-nowrap">
                    <span class="font-semibold">Email:</span>
                    <span class="ml-2">{{ $user->email }}</span>
                </div>
            </div>

            <div class="flex-shrink px-8 max-w-sm sm:w-1/3 lg:w-1/4 xl:w-60 md:mr-10 lg:mr-20 xl:mr-40">
                <img class="max-w-full h-auto relative scale-x-[-1]" src="{{ asset('img/kwispel-hond.gif') }}" alt="kwispelende hond">
            </div>
        </div>

        @if($user->role != "admin")
        <x-dashboard-section header="Mijn huisdieren" :count="count($huisdieren)">
            <x-slot name="action">
                <a href="{{ route('huisdier.create') }}">
                    <x-button.small-secondary-button class="p-2 mx-4">
                        <i class="fa-solid fa-plus"></i>
                    </x-button.small-secondary-button>
                </a>
            </x-slot>

            <x-slot name="cards">
                @if(count($huisdieren) > 0)
                @foreach ($huisdieren as $huisdier)
                    <x-cards.pet-card :huisdier="$huisdier"
                                      :path="isset($huisdier->dierfotos[0]) ? 'storage/' . $huisdier->dierfotos[0]->path : 'img/huisdieren.jpg'"/>
                @endforeach
                @endif
            </x-slot>
        </x-dashboard-section>
        @endif

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


        @if(count($reviews) > 0 && ! $user->role == "admin")
        <x-dashboard-section header="Mijn reviews" :count="count($reviews)">
            <x-slot name="cards">
                @foreach($reviews as $review)
                <x-cards.review-card :review="$review"/>
                @endforeach
            </x-slot>
        </x-dashboard-section>
        @endif

        @if($user->role == "admin")
        @if(count($gebruikers) > 0)
        <x-dashboard-section header="Gebruikers" :count="count($gebruikers)">
            <x-slot name="cards">
                @foreach($gebruikers as $gebruiker)
                <x-cards.gebruiker-card :gebruiker="$gebruiker"/>
                @endforeach
            </x-slot>
        </x-dashboard-section>
        @endif

        @if(count($blocked) > 0)
        <x-dashboard-section header="Geblokkeerde gebruikers" :count="count($blocked)">
            <x-slot name="cards">
                @foreach ($blocked as $gebruiker)
                <x-cards.gebruiker-card :gebruiker="$gebruiker"/>
                @endforeach
            </x-slot>
        </x-dashboard-section>
        @endif
        @endif


    </main>
</x-app-layout>

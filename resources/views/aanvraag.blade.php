<x-app-layout>
    <style>
        .star-rating {
            display: inline-flex;
            flex-direction: row-reverse;
        }

        .star-rating input[type="radio"] {
            display: none;
        }

        .star-rating label {
            font-size: 2rem;
            color: #ddd;
            cursor: pointer;
        }

        .star-rating input[type="radio"]:checked~label {
            color: #f39c12;
        }

        .star-rating label:hover,
        .star-rating label:hover~label {
            color: #f39c12;
        }

        .star-rating label:hover~label {
            color: #f39c12;
        }
    </style>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            Oppasaanvraag
        </h2>
    </x-slot>

    <div>
        <x-cards.pet-card :huisdier="$aanvraag->oppastijds[0]->huisdier" :tijden="$aanvraag->oppastijds" />

        <!--magic number for constant height for scrolling-->
        <div style="height:calc(100vh - 21.5rem);"
            class="flex flex-col h-full place-items-center items-center text-gray-600 space-y-2 py-4 overflow-scroll relative">

            @if ($aanvraag->antwoord != 1) <!--niet geaccepteerd-->

                @if (count($aanvraag->oppastijds) > 0)
                    @if ($user == $aanvraag->oppasser)
                        <p>De oppasaanvraag is gedaan.</p>
                    @endif

                    @if (count($aanvraag->huisfotos) == 0)
                        @if ($user == $aanvraag->oppasser)
                            <p>Voeg foto's van uw huis toe zodat het baasje kan bepalen of u op het dier mag passen.</p>
                        @else
                            <p>Wacht tot de potentiele oppasser foto's van hun huis opstuurt.</p>
                        @endif
                        <i class="fa-solid fa-circle py-2"></i>

                    @else
                        @if ($user == $aanvraag->oppasser)
                            <p>De huisfoto's zijn toegevoegd.</p>
                        @else
                            <p>Huisfoto's van de oppasser:</p>
                        @endif
                        <x-image-carousel
                            :fotos="$aanvraag->huisfotos"
                            :showAdd="$aanvraag->oppasser == $user"
                            :action="route('huisfotos.store')"
                            class="col-start-1 col-end-13 h-72">
                            <x-slot name="inputs">
                                <input type="file"id="myfile" name="huisfoto">
                                <input type="hidden" name="aanvraag" value="$aanvraag">
                            </x-slot>
                        </x-image-carousel>
                        <i class="fa-solid fa-seedling py-2"></i>

                        @if ($aanvraag->antwoord == -1) <!--niet beantwoord-->
                            @if ($user == $aanvraag->oppasser)
                                <p>Wacht tot het baasje uw oppasaanvraag beantwoordt.</p>
                            @else
                                <p>Vindt u het goed als {{ $aanvraag->oppasser->name }} op uw dier past?</p>
                                <form method="POST" enctype="multipart/form-data"
                                    action="{{ route('aanvraag.update', ['aanvraag' => $aanvraag]) }}">
                                    @csrf
                                    @method('PATCH')
                                    <x-button.primary-button type="submit" name="antwoord" value=1>
                                        Ja
                                    </x-button.primary-button>
                                    <x-button.primary-button type="submit" name="antwoord" value=0>
                                        Nee
                                    </x-button.primary-button>
                                </form>
                            @endif
                            <i class="fa-solid fa-tree py-2"></i>

                        @elseif ($aanvraag->antwoord == 0)
                            @if ($user == $aanvraag->oppasser)
                                <p>Helaas, uw oppasaanvraag is afgekeurd. Probeer het bij een ander dier opnieuw.</p>
                                <x-button.primary-button onclick="{{ route('huisdier.overview') }}">
                                    Aanbod huisdieren
                                </x-button.primary-button>
                            @else
                                <p>De oppasaanvraag is afgekeurd.</p>
                                <form method="POST" enctype="multipart/form-data"
                                    action="{{ route('aanvraag.update', ['aanvraag' => $aanvraag]) }}">
                                    @csrf
                                    @method('PATCH')
                                    <x-button.primary-button type="submit" name="antwoord" value=-1>
                                        Ongedaan maken
                                    </x-button.primary-button>
                                </form>
                            @endif
                            <i class="fa-solid fa-plant-wilt py-2"></i>
                        @endif

                    @endif
                @endif
            @else
                <p>De oppasafspraak staat vast</p>
                <i class="fa-solid fa-check py-2"></i>
                <p>"{{ $aanvraag->review }}"</p>
                @if ($user != $aanvraag->oppasser && $aanvraag->review == null)
                    <div class="text-center">
                        <form action="{{ route('review.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <p>Laat een review achter van de oppasser</p>
                                <input type="hidden" name="oppasser_id" value="$aanvraag->oppasser->id">
                                <input type="hidden" name="aanvraag_id" value="$aanvraag->id">
                                <label for="rating">Rating:</label>
                                <div class="star-rating">
                                    <input type="radio" id="star5" name="rating" value="5">
                                    <label for="star5" class="fa fa-star"></label>
                                    <input type="radio" id="star4" name="rating" value="4">
                                    <label for="star4" class="fa fa-star"></label>
                                    <input type="radio" id="star3" name="rating" value="3">
                                    <label for="star3" class="fa fa-star"></label>
                                    <input type="radio" id="star2" name="rating" value="2">
                                    <label for="star2" class="fa fa-star"></label>
                                    <input type="radio" id="star1" name="rating" value="1">
                                    <label for="star1" class="fa fa-star"></label>
                                </div>
                            </div>
                            <x-button.primary-button type="submit">Submit</x-button.primary-button>
                        </form>
                    </div>
                @endif
            @endif
        </div>
        <div class="flex justify-center items-center h-10">
            <form method="POST" enctype="multipart/form-data"
                action="{{ route('aanvraag.update', ['aanvraag' => $aanvraag]) }}">
                @csrf
                @method('PATCH')
                <x-button.danger-button type="submit" name="antwoord" value=0>Afbreken</x-button.danger-button>
            </form>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <style>
        .star-rating {
            display: inline-flex;
            flex-direction: row-reverse; /* Reverses the order to make the first label in HTML the last visually */
        }
        .star-rating input[type="radio"] {
            display: none;
        }
        .star-rating label {
            font-size: 2rem;
            color: #ddd;
            cursor: pointer;
        }
        .star-rating input[type="radio"]:checked ~ label, .star-display {
            color: #f39c12;
        }
        .star-rating label:hover,
        .star-rating label:hover ~ label {
            color: #f39c12;
        }
        .star-rating label:hover ~ label {
            color: #f39c12;
        }
        .star-display {
            display: inline-block;
            margin: 0;
            padding: 0;
        }
    </style>

    <x-slot name="header">
        {{ __('Oppasaanvraag') }}
    </x-slot>

    <div>
        <!--info-->
        <section class="flex flex-row w-screen space-x-2 p-2">
            <div class="w-3/5 bg-white border border-solid border-oranje3 rounded-lg grid grid-cols-2 grid-rows-2 place-items-center">
                <img class="col-span-1 row-span-full object-cover rounded-l-lg"
                     src="{{ asset($aanvraag->oppastijds[0]->huisdier->dierfotos[0]->path) }}"
                     alt="Foto van een huisdier" >
                <h2 class="text-lg">
                    {{ $aanvraag->oppastijds[0]->huisdier->naam }}
                </h2>
                <a href="{{ route('huisdier.show', ['huisdier' => $aanvraag->oppastijds[0]->huisdier]) }}">
                    <x-button.primary-button>Profiel</x-button.primary-button>
                </a>
            </div>
            <div class="w-2/5 flex flex-col gap-1 items-center justify-evenly">
                @foreach ($aanvraag->oppastijds as $oppastijd)
                    <div class="w-28 p-2 bg-white border border-solid border-oranje3 rounded-lg">
                        <p class="text-center leading-tight">
                            {{ date("d-m-'y", strtotime($oppastijd->datum)) }}
                        </p>
                        <p class="text-sm text-center leading-tight">
                            {{ substr($oppastijd->start, 0, 5) }} - {{ substr($oppastijd->eind, 0, 5) }}
                        </p>
                    </div>
                @endforeach
            </div>
        </section>

        <!--voortgang-->
        <div>
            <div class="relative text-gray-600 py-4 w-4/5 mx-auto flex flex-col place-items-center space-y-3">
                @if ($aanvraag->antwoord == 1)
                    <p>De oppasafspraak staat vast</p>
                    <p>.</p>
                    @if ($user != $aanvraag->oppasser && $aanvraag->review == null)
                    <div class="text-center">
                        <form action="{{ route('review.store') }}" method="POST">
                            @csrf
                            <p>Laat een review van de oppasser achter</p>
                            <input type="hidden" name="oppasser_id" value="{{ $aanvraag->oppasser->id }}">
                            <input type="hidden" name="aanvraag_id" value="{{ $aanvraag->id }}">
                            <input type="hidden" name="baasje_id" value="{{ $user->id }}">
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
                            <x-button.primary-button type="submit">Submit</x-button.primary-button>
                        </form>
                      </div>
                    @endif
                    @if($aanvraag->review != null)
                    <div class="star-display-container">
                    <label for="rating">Rating:</label>
                    @for($i = 0; $i < $aanvraag->review->rating; $i++)
                        <i class="fa-solid fa-star star-display"></i>
                    @endfor
                    @for($i = $aanvraag->review->rating; $i < 5; $i++)
                        <i class="fa-regular fa-star star-display"></i>
                    @endfor
                    </div>
                    @endif

                @else
                @if (count($aanvraag->oppastijds) > 0)
                    @if($user == $aanvraag->oppasser)
                    <p>De oppasaanvraag is gedaan</p>
                    <p>.</p>
                    @endif

                    @if (count($aanvraag->huisfotos) == 0)
                        @if ($user == $aanvraag->oppasser)
                        <p class="text-center">Voeg foto's van uw huis toe zodat het baasje kan bepalen of u op het dier mag passen.</p>
                        @else
                        <p class="text-center">Wacht tot de potentiele oppasser foto's van hun huis opstuurt.</p>
                        @endif
                        <p>.</p>

                    @else
                        @if($user == $aanvraag->oppasser)
                        <p>De huisfoto's zijn toegevoegd</p>
                        @else
                        <p>Huisfoto's van de oppasser: </p>
                        @endif
                        <div class="flex flex-row">
                            @foreach ($aanvraag->huisfotos as $huisfoto)
                            <div class="flex flex-row">
                                <img class="h-28 w-20 object-cover rounded-lg relative"
                                     src="{{ asset($huisfoto->path) }}"
                                     alt="Foto van een huis">
                            </div>
                            @endforeach
                        </div>
                        <p>.</p>

                        @if ($aanvraag->antwoord == -1)
                            @if($user == $aanvraag->oppasser)
                            <p class="text-center">Wacht tot het baasje uw oppasaanvraag beantwoordt.</p>
                            @elseif(! $user->role == "admin")
                            <p class="text-center">Vindt u het goed als {{ $aanvraag->oppasser->name }} op uw dier past?</p>
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

                        @elseif ($aanvraag->antwoord == 0)
                            @if ($user == $aanvraag->oppasser)
                            <p class="text-center">Helaas, uw oppasaanvraag is afgekeurd. Probeer het bij een ander dier opnieuw.</p>
                            <x-button.primary-button onclick="{{ route('huisdier.overview') }}">
                                Aanbod huisdieren
                            </x-button.primary-button>
                            @else
                            <p class="text-center">De oppasaanvraag is afgekeurd.</p>
                            <form method="POST" enctype="multipart/form-data"
                                  action="{{ route('aanvraag.update', ['aanvraag' => $aanvraag]) }}">
                                @csrf
                                @method('PATCH')
                                <x-button.primary-button type="submit" name="antwoord" value=-1>
                                    Ongedaan maken
                                </x-button.primary-button>
                            </form>
                            @endif
                        @endif

                    @endif
                @endif
                @endif
                @if($user == $aanvraag->oppasser || $user->role == "admin")
                <form method="POST"
                    action="{{ route('aanvraag.destroy', ['aanvraag' => $aanvraag]) }}">
                    @csrf
                    @method('DELETE')
                    <x-button.danger-button type="submit">Aanvraag verwijderen</x-button.danger-button>
                </form>
                @elseif($user == $aanvraag->oppastijds[0]->huisdier->baasje)
                <form method="POST" enctype="multipart/form-data"
                      action="{{ route('aanvraag.update', ['aanvraag' => $aanvraag]) }}">
                    @csrf
                    @method('PATCH')
                    <x-button.danger-button type="submit" name="antwoord" value=0>Afbreken</x-button.danger-button>
                </form>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>

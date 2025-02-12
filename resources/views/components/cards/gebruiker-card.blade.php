<x-cards.general-card
    :title="$gebruiker->name">

    <x-slot name="middle">
        <div class="max-h-24 overflow-scroll sm:visible">
            <p>E-mail: {{ $gebruiker->email }}</p>
            <p>Huisdieren: {{ count($gebruiker->huisdiers) }}</p>
            <p>Aanboden: {{ count($gebruiker->aanvraags) }}</p>
            <p>Gemiddeld gegeven review: {{ $gebruiker->reviewsLeft->avg('rating') }}</p>
            <p>Gemiddeld gekregen review: {{ $gebruiker->reviewsGot->avg('rating') }}</p>
        </div>
    </x-slot>

    <x-slot name="button">
        <form method="POST"
              enctype="multipart/form-data"
              action="{{ route('user.block', ['user' => $gebruiker]) }}">
            @csrf
            @method('PATCH')
            @if($gebruiker->role == "blocked")
            <x-button.primary-button type="submit" name="role" value="normal">Deblokkeer gebruiker</x-button.primary-button>
            @else
            <x-button.danger-button type="submit" name="role" value="blocked">Blokkeer gebruiker</x-button.danger-button>
            @endif
        </form>
    </x-slot>

</x-cards.general-card>

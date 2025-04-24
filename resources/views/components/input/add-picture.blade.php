<form method="POST"
      action="{{ $route }}"
      enctype="multipart/form-data"
      {{ $attributes->merge([
        'class' => 'flex flex-col items-start justify-center'
      ])}}
      >
    @csrf

    <label for="myfile">Selecteer een bestand: </label>
    <input type="file" id="myfile" name={{ $fotoname }}>
    @if (isset($connectTo))
    {{$connectTo}}
    @endif
    <x-button.secondary-button type="submit" class="self-center mx-2">Voeg toe</x-button.secondary-button>
</form>

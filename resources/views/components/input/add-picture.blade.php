<form method="POST"
      action="{{ $route }}"
      enctype="multipart/form-data"
      class="absolute w-20 h-full flex items-center justify-center">
    @csrf
    <label for="myfile">Selecteer een bestand: </label>
    <input type="file" id="myfile" name={{ $fotoname }}>
    @if (isset($connectTo))
    {{$connectTo}}
    @endif
    <x-button.secondary-button type="submit">Voeg toe</x-button.secondary-button>
</form>

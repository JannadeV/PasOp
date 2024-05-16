<div class="flex bg-white h-65 md:max-w-xl border border-gray-200 rounded-lg shadow dark:border-gray-700 dark:bg-gray-800">
    <img class="object-cover h-full w-48 rounded-l-lg md:rounded-none md:rounded-s-lg" src="{{ asset($pet->dierfotos[0]->path) }}" alt="Foto van een huisdier" >
    <div class="flex flex-col justify-between m-4 leading-normal">
        <div class="flex flex-row">
            <h2 class="text-3xl">{{ $pet->naam }}</h2>
            @switch( strtolower($pet->soort) )
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
        </div>
        <div class="max-h-24 overflow-scroll">
            @foreach ($pet->oppastijds as $oppastijd)
                <div class="p-1 border border-solid">
                    <p class="text-xs">{{ date('d-m-y', strtotime($oppastijd->datum))}}</p>
                    <p class="text-xs">{{ substr($oppastijd->start, 0, 5) }} - {{ substr($oppastijd->eind, 0, 5) }}</p>
                </div>
            @endforeach
        </div>
        <x-primary-button class="justify-self-end">Naar profiel</x-primary-button>
    </div>
</div>

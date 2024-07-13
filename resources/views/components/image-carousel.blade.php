<div {{ $attributes->merge(['class' => 'relative w-full', 'id' => 'default-carousel', 'data-carousel' => 'static']) }}>
    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
        @foreach($fotos as $index => $foto)
            <div class="{{ $index == 0 ? 'duration-700 ease-in-out' : 'hidden duration-700 ease-in-out' }}"
                 data-carousel-item="{{ $index == 0 ? 'active' : '' }}">
                <img src="{{ asset($foto->path) }}" class="w-full h-full object-cover" alt="foto">
            </div>
        @endforeach

        @if($showAdd)
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <form method="POST"
                    action="$action"
                    enctype="multipart/form-data"
                    class="absolute w-20 h-full flex items-center justify-center">
                @csrf
                <label for="myfile">Selecteer een bestand: </label>
                {{$inputs}}
                <x-button.secondary-button type="submit">Voeg toe</x-button.secondary-button>
            </div>
            @php($carousselAmount = count($fotos) + 1)
        @else
            @php($carousselAmount = count($fotos))
        @endif
    </div>

    <!-- Slider indicators -->
    <div class="absolute z-30 flex -translate-x-1/2 space-x-3 rtl:space-x-reverse bottom-5 left-1/2">
        @php($aria_current = true)
        @for($i=0; $i<$carousselAmount; $i++)
            <button type="button" class="w-3 h-3 rounded-full" aria-current="{{ $aria_current }}" aria-label="Slide {{$i + 1}}" data-carousel-slide-to="{{ $i }}"></button>
            @php($aria_current = false)
        @endfor
    </div>
    <!-- Slider controls -->
    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>

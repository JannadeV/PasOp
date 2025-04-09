<div class="relative flex bg-white h-40 border border-gray-200 rounded-lg shadow-md">
    @if( isset($bigFotoPath) )
    <img class="object-cover h-full w-48 rounded-l-lg md:rounded-none md:rounded-s-lg"
         src="{{ $bigFotoPath }}"
         alt="{{ $bigFotoAlt }}">
    @endif
    <div class="flex flex-col justify-between m-4 w-full">
        <div class="flex flex-row justify-between">
            <h2 class="text-lg leading-tight font-medium w-1/2">{{ $title }}</h2>
            @if(isset($topRight))
            {{ $topRight }}
            @endif
        </div>
        {{ $middle }}
        {{ $button }}
    </div>
</div>

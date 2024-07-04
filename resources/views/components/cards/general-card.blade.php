<div class="relative flex bg-white h-65 border border-gray-200 rounded-lg shadow dark:border-gray-700 dark:bg-gray-800">
    <img class="object-cover h-full w-48 rounded-l-lg md:rounded-none md:rounded-s-lg"
         src="{{ $bigFotoPath }}"
         alt="{{ $bigFotoAlt }}">
    <div class="flex flex-col justify-between m-4 w-full">
        <div class="flex flex-row justify-between items-center">
            <h2 class="text-xl font-medium w-1/2">{{ $title }}</h2>
            {{ $topRight }}
        </div>
        {{ $middle }}
        {{ $button }}
    </div>
</div>

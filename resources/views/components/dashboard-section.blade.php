<div class="relative"
     x-data="{ open: false }"
     @close.stop="open = false">
    <div class="w-full flex flex-row items-center justify-between h-16 bg-white border border-1 border-oranje3 pl-2"
         @click="open = ! open">
        <h2 class="text-lg">{{ $header }}</h2>
        <div class="inline-flex items-center">
            @if (isset($action))
            {{ $action }}
            @endif
            <p class="text-gray-500">{{$count}}</p>
            @if($count > 0)
            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                <div class="ms-1">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </div>
            </button>
            @endif
        </div>
    </div>

    <div class="mt-2 w-full rounded-md"
         x-show="open"
         style="display: none;"
         x-transition:enter="transistion ease-out duration-200"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-75"
         x-transition:leave-start="opacity-100 scale-100">
        <div class="rounded-md py-1 px-3 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-1">
            {{ $cards }}
        </div>
    </div>
</div>

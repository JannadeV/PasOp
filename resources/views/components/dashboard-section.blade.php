<div class="relative"
     x-data="{ open: false }"
     @close.stop="open = false">
    <div class="w-full flex flex-row items-center justify-between h-16 bg-white border border-1 border-oranje3 pl-2 cursor-pointer"
         @click="open = ! open">
        <h2 class="text-lg lg:mx-auto lg:pl-20">{{ $header }}</h2>
        <div class="inline-flex items-center">
            @if (isset($action))
            {{ $action }}
            @endif
            <p class="text-gray-500">{{$count}}</p>
            <div class="inline-flex items-center
                        px-3 py-2
                        border border-transparent rounded-md
                        text-sm leading-4 font-medium text-gray-500
                        bg-white
                        hover:text-gray-700 focus:outline-none
                        transition ease-in-out duration-150">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    @if($count > 0)
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    @endif
                </svg>
            </div>
        </div>
    </div>

    @if($count > 0)
    <div class="my-2 w-full rounded-md"
         x-show="open"
         style="display: none;"
         x-transition:enter="transistion ease-out duration-200"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-75"
         x-transition:leave-start="opacity-100 scale-100">
        <div class="rounded-md py-1 px-3 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-1">
            {{ $cards }}
        </div>
    </div>
    @endif
</div>

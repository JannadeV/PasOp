<div  x-data="{ open: false }" x-effect="console.log(open)"
      class="w-full flex justify-around items-baseline pt-4">

    @php $showClasses = $mobile ? "flex sm:hidden" : "hidden sm:flex"; @endphp

    <div class="-me-2 {{ $showClasses}} items-center">
        <button @click="open = !open"
                @click.outside="open = false"
                @close.stop="open = false"
                class="z-40 inline-flex items-center justify-center p-2 rounded-md text-gray-600 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
            {{ $trigger }}
        </button>
    </div>

    <div :class="{'top-0': open, '-top-full': ! open}"
          class="absolute mt-20 right-0 w-3/4 border-x-2 border-b-2 border-oranje3 block rounded-b-lg oranje1 z-20 transition-all duration-500">

        {{ $content }}
    </div>
    <div :class="{'overlay-aan': open, 'overlay-uit': ! open}" class="transition duration-500 absolute left-0 w-screen h-screen z-10"></div>
</div>

<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Pet Overview') }}
        </h2>
    </x-slot>

    <!--pet cards-->
    <div class="mx-2 p-1 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-1">
        @foreach ($huisdiers as $huisdier)
        <div class="col-span-1">
            <x-cards.pet-card :huisdier="$huisdier"
                              :path="isset($huisdier->dierfotos[0]) ? 'storage/' . $huisdier->dierfotos[0]->path : 'img/huisdieren.jpg'"
                              :showTimes='true'/>
        </div>
        @endforeach
    </div>

    <!--filter-->
    <div class="absolute h-screen top-full transition-all duration-500"
         x-data="{
            open: false,
            get isOpen() { return this.open },
            toggle() { this.open = ! this.open; console.log('getoggled') },
         }"
         transition
         :class="{'-mt-72': isOpen, '-mt-2': ! isOpen}">

        <!--toggle bar-->
        <div class="absolute flex flex-row w-screen top-0 z-10">
            <div class="relative flex-grow">
                <div class="absolute h-4 w-4 right-0 -translate-y-full translate-x-1/2 bg-gray-800"></div>
                <div class="absolute h-4 w-4 right-0 -translate-y-full oranje1 rounded-br-md border-0"></div>
            </div>
            <x-button.primary-button
                    class="relative -translate-y-full top-1 flex flex-col z-1"
                    @click="toggle()">
                <i class="fa-solid fa-filter"></i>
                <p class="text-white">Filter</p>
            </x-button.primary-button>
            <div class="relative flex-grow">
                <div class="absolute h-4 w-4 -translate-y-full -translate-x-1/2 bg-gray-800"></div>
                <div class="absolute h-4 w-4 -translate-y-full oranje1 rounded-bl-md border-0"></div>
            </div>
        </div>
        <div class="w-screen h-3 bg-gray-800 rounded-t-md"></div>

        <!--filters-->
        <div class="absolute w-screen min-h-screen bg-gray-800">
            <form method="GET"
                  action="{{ route('huisdier.overview') }}"
                  class="mb-4 gap-2">

                <section class="relative grid grid-cols-3 justify-items-center gap-2 w-2/3 mx-auto">

                    <x-input.text-input
                        type="text"
                        name="search"
                        placeholder="Zoek op naam of soort"
                        value="{{ request('search') }}"
                        class="col-span-3 sm:w-1/2 mt-4">
                    </x-input.text-input>

                    <p class="col-span-3 text-white justify-self-start pl-20">Soort: </p>
                    <div>
                        <input type="checkbox" name="soort[]" id="hond" value="hond"
                                {{ in_array('hond', request('soort', [])) ? 'checked' : '' }}>
                        <label for="hond"><i class="fa-solid fa-dog text-oranje5 text-4xl"></i></label>
                    </div>
                    <div>
                        <input type="checkbox" name="soort[]" id="kat" value="kat"
                                {{ in_array('kat', request('soort', [])) ? 'checked' : '' }}>
                        <label for="kat"><i class="fa-solid fa-cat text-oranje5 text-4xl"></i></label>
                    </div>
                    <div>
                        <input type="checkbox" name="soort[]" id="vogel" value="vogel"
                                {{ in_array('vogel', request('soort', [])) ? 'checked' : '' }}>
                        <label for="vogel"><i class="fa-solid fa-feather text-oranje5 text-4xl"></i></label>
                    </div>
                    <div>
                        <input type="checkbox" name="soort[]" id="paard" value="paard"
                                {{ in_array('paard', request('soort', [])) ? 'checked' : '' }}>
                        <label for="paard"><i class="fa-solid fa-horse text-oranje5 text-4xl"></i></label>
                    </div>
                    <div>
                        <input type="checkbox" name="soort[]" id="vis" value="vis"
                                {{ in_array('vis', request('soort', [])) ? 'checked' : '' }}>
                        <label for="vis"><i class="fa-solid fa-fish text-oranje5 text-4xl"></i></label>
                    </div>
                    <div>
                        <input type="checkbox" name="soort[]" id="anders" value="anders"
                                {{ in_array('anders', request('soort', [])) ? 'checked' : '' }}>
                        <label for="anders"><i class="fa-solid fa-ellipsis text-oranje5 text-4xl"></i></label>
                    </div>

                    <a href="{{ route('huisdier.overview') }}"
                       class="col-span-2 m-4">
                        <x-button.secondary-button>Verwijder filters</x-button.secondary-button>
                    </a>
                </section>


                <button class="right-0 top-48 absolute w-1/4 sm:top-40" type="submit">
                    <img class="w-3/5 relative md:w-2/5" src="{{ asset('img/button_paw.png') }}" alt="Ga">
                </button>

            </form>

        </div>
        <div class="w-screen oranje1 h-3 absolute bottom-2 z-0"></div>
    </div>


</x-app-layout>


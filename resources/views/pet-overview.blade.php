<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pet Overview') }}
        </h2>
    </x-slot>

    <!--pet cards-->
    <div class="p-1 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-1">
        @foreach ($huisdiers as $huisdier)
        <div class="col-span-1">
            <x-cards.pet-card :huisdier="$huisdier"
                              :path="isset($huisdier->dierfotos[0]) ? $huisdier->dierfotos[0]->path : 'img/huisdieren.jpg'"
                              :showTimes='true'/>
        </div>
        @endforeach
    </div>

    <!--filter-->
    <div class="bottom-0 absolute"
         x-data="{
            open: false,
            get isOpen() { return this.open },
            toggle() { this.open = ! this.open; console.log('getoggled') },
         }">

        <!--toggle bar-->
        <div class="absolute flex flex-row left-1/2 -translate-x-1/2 z-10">
            <div class="relative">
                <div class="bg-gray-800 h-3 w-3 absolute -translate-y-full -translate-x-1/2"></div>
                <div class="bg-gray-100 h-3 w-3 absolute -translate-y-full -translate-x-full rounded-br-md border-0"></div>
            </div>
            <x-button.primary-button
                    class="relative -translate-y-full top-1 flex flex-col z-1"
                    @click="toggle()">
                <i class="fa-solid fa-filter"></i>
                <p>Filter</p>
            </x-button.primary-button>
            <div class="relative">
                <div class="bg-gray-800 h-3 w-3 absolute -translate-y-full"></div>
                <div class="bg-gray-100 h-3 w-3 absolute -translate-y-full rounded-bl-md border-0"></div>
            </div>
        </div>

        <!--filters-->
            <div class="w-screen min-h-12 rounded-t-md border-0 bg-white" x-show="isOpen">
                <form method="GET"
                      action="{{ route('huisdier.overview') }}"
                      class="mb-4 flex flex-wrap gap-2">

                    <x-input.text-input
                          type="text"
                          name="search"
                          placeholder="Zoek op naam of soort"
                          value="{{ request('search') }}">
                    </x-input.text-input>

                    <p>Soort: </p>
                    <input type="checkbox" name="soort[]" id="hond" value="hond"
                           {{ in_array('hond', request('soort', [])) ? 'checked' : '' }}>
                    <label for="hond"><i class="fa-solid fa-dog text-gray-700 text-4xl"></i></label>

                    <input type="checkbox" name="soort[]" id="kat" value="kat"
                           {{ in_array('kat', request('soort', [])) ? 'checked' : '' }}>
                    <label for="kat"><i class="fa-solid fa-cat text-gray-700 text-4xl"></i></label>

                    <input type="checkbox" name="soort[]" id="vogel" value="vogel"
                           {{ in_array('vogel', request('soort', [])) ? 'checked' : '' }}>
                    <label for="vogel"><i class="fa-solid fa-feather text-gray-700 text-4xl"></i></label>

                    <input type="checkbox" name="soort[]" id="paard" value="paard"
                           {{ in_array('paard', request('soort', [])) ? 'checked' : '' }}>
                    <label for="paard"><i class="fa-solid fa-horse text-gray-700 text-4xl"></i></label>

                    <input type="checkbox" name="soort[]" id="vis" value="vis"
                           {{ in_array('vis', request('soort', [])) ? 'checked' : '' }}>
                    <label for="vis"><i class="fa-solid fa-fish text-gray-700 text-4xl"></i></label>

                    <input type="checkbox" name="soort[]" id="anders" value="anders"
                           {{ in_array('anders', request('soort', [])) ? 'checked' : '' }}>
                    <label for="anders"><i class="fa-solid fa-ellipsis text-gray-700 text-4xl"></i></label>

                    <a href="{{ route('huisdier.overview') }}">
                        <x-button.secondary-button>Verwijder filters</x-button.secondary-button>
                    </a>

                    <button class="relative left-4 w-1/4" type="submit">
                        <img class="w-4/5" src="{{ asset('img/button_paw.png') }}" alt="Ga">
                    </button>

                </form>

            </div>
        </div>
        <div class="w-screen bg-gray-100 h-3 absolute bottom-2 z-0"></div>
    </div>


</x-app-layout>


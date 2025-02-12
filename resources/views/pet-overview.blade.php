<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pet Overview') }}
        </h2>
    </x-slot>

    <div class="p-1 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-1">
        @foreach ($huisdiers as $huisdier)
        <div class="col-span-1">
            <x-cards.pet-card :huisdier="$huisdier"
                              :path="isset($huisdier->dierfotos[0]) ? $huisdier->dierfotos[0]->path : 'img/huisdieren.jpg'"
                              :showTimes='true'/>
        </div>
        @endforeach
    </div>

    <div class="bottom-0 absolute"
         x-data="{
            open: false,
            get isOpen() { return this.open },
            toggle() { this.open = ! this.open; console.log('getoggled') },
         }">

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
        <div class="w-screen rounded-t-md border-t-8 border-gray-800">
            <div class="w-screen min-h-12 rounded-t-md border-0" x-show="isOpen"></div>
        </div>
        <div class="w-screen bg-gray-100 h-3 absolute bottom-2 z-0"></div>
    </div>

</x-app-layout>


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pet Overview') }}
        </h2>
    </x-slot>

    <div class="p-1 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-1">
        @foreach ($huisdiers as $huisdier)
        <div class="col-span-1">
            <x-pet-card :huisdier="$huisdier"/>
        </div>
        @endforeach
    </div>
</x-app-layout>


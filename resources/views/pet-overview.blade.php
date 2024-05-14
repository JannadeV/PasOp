<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pet Overview') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="row">
            @foreach ($huisdiers as $huisdier)
                <div class="col-md-4 mb-3">
                    <x-huisdier.card :pet="$huisdier"/>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>


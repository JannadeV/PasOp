<x-app-layout :header="$huisdier->naam">
    <div class="grid grid-cols-12">
        <x-image-carousel :fotos="$huisdier->dierfotos" class="col-start-1 col-end-13 h-72"></x-image-carousel>
        <p class="col-start-2 col-end-12 pt-1">Bio <br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vel lectus ac tellus tincidunt suscipit sit amet ac sapien.</p>
        <p class="col-start-2 col-end-12 pt-1 font-bold">Oppastijden</p>
        <div class="col-start-2 col-end-12 flex flex-col border border-gray-300 rounded-lg dark:bg-gray-700 dark:border-gray-600">
            <ul class="grid grid-cols-2 dark:text-white border-b border-gray-300">
                @foreach($huisdier->oppastijds as $index=>$oppastijd)
                    @if($index%2 == 0)
                        @php($border_side = "border-r")
                    @else
                        @php($border_side = "")
                    @endif
                    <li class="col-span-1 {{$border_side}} border-gray-300 dark:border-gray-600">
                        <div class="flex items-center ps-3">
                            <input id="vue-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="vue-checkbox" class="py-3 ms-2 dark:text-gray-300">
                                <p class="text-xs">{{ date("d-m-'y", strtotime($oppastijd->datum))}}</p>
                                <p class="text-xs">{{ substr($oppastijd->start, 0, 5) }} - {{ substr($oppastijd->eind, 0, 5) }}</p>
                            </label>
                        </div>
                    </li>
                @endforeach
            </ul>
            <x-primary-button class="justify-self-center self-center m-1">Pas op!</x-primary-button>
        </div>
    </div>
</x-app-layout>

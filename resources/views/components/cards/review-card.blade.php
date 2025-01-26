<div class="relative flex bg-white h-40 border border-gray-200 rounded-lg shadow dark:border-gray-700 dark:bg-gray-800">
    <div class="flex flex-col justify-between m-4 w-full">
        <div class="flex flex-col justify-between">
            <h2 class="text-lg leading-tight font-medium w-1/2">{{ $review->baasje->name . " geeft " . $review->oppasser->name }}</h2>
            <div class="flex flex-row">
                @for($i = 0; $i < $review->rating; $i++)
                <i class="fa-solid fa-star"></i>
                @endfor
                @for($i = 0; $i < 5 - $review->rating; $i++)
                <i class="fa-regular fa-star"></i>
                @endfor
            </div>
            <p>Hier staat eventueel tekst die de review toelicht.</p>
        </div>
    </div>
</div>

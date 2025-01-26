@props(['value'])

<label {{ $attributes->merge(['class' => '
    block
    text-base sm:text-lg
    font-medium
    text-gray-700
']) }}>
    {{ $value ?? $slot }}
</label>

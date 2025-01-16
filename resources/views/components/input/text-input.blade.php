@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' =>'
    border-oranje
    focus:border-indigo-500
    focus:ring-indigo-500
    rounded-xl
    shadow-sm
    h-6
']) !!}>

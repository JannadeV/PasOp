@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full ps-3 pl-4 pe-4 py-2 border-l-4 border-oranje7     text-center text-base font-medium text-gray-700                                                            focus:outline-none                     focus:oranje3                          transition duration-150 ease-in-out'
            : 'block w-full ps-3      pe-4 py-2 border-l-4 border-transparent text-center text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

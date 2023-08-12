@props(['active'])

@php
$classes = ($active ?? false)
            ? 'active p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer bg-[#1AB188] text-white'
            : 'p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-[#1AB188] text-white';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

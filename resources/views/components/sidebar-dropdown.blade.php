@props(['align' => 'right', 'width' => '48', 'contentClasses' => 'p-2', 'dropdownClasses' => '', 'links' => []])

@php

    switch ($align) {
        case 'left':
            $alignmentClasses = 'origin-top-left left-0';
            break;
        case 'top':
            $alignmentClasses = 'origin-top';
            break;
        case 'none':
        case 'false':
            $alignmentClasses = '';
            break;
        case 'right':
        default:
            $alignmentClasses = 'origin-top-right right-0';
            break;
    }

    switch ($width) {
        case '48':
            $width = 'w-48';
            break;
    }

    $dropdownExpanded = 'false';
    foreach ($links as $link) {
        if(request()->routeIs($link[0])) {
            $dropdownExpanded = 'true';
        }
    }

@endphp

<div class="relative" x-data="{ open: {{ $dropdownExpanded }} }" @click.away="open = false" @close.stop="open = false">

    <div @click="open = ! open">
        {{ $trigger }}
    </div>

    <div x-show="open"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="transform opacity-0 scale-95"
         x-transition:enter-end="transform opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-75"
         x-transition:leave-start="transform opacity-100 scale-100"
         x-transition:leave-end="transform opacity-0 scale-95"
         class="z-50 flex flex-col items-center mt-2 {{ $width }} {{ $alignmentClasses }} {{ $dropdownClasses }}"
         style="display: none;"
         @click="open = false">
        @foreach($links as $link)
            <x-responsive-nav-link class="w-4/5" href="{{ route($link[0]) }}" :active="request()->routeIs($link[0])" >
                <i class="bi bi-{{ $link[2] }}"></i>
                <span class="text-[15px] ml-4 text-gray-200 font-bold">{{ $link[1] }}</span>
            </x-responsive-nav-link>
        @endforeach
    </div>
</div>

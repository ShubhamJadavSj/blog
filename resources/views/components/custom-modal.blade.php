@props(['id', 'maxWidth'])

@php
$id = $id ?? md5($attributes->wire('model'));

$maxWidth = [
    'sm' => 'max-w-sm',
    'md' => 'max-w-md',
    'lg' => 'max-w-lg',
    'xl' => 'max-w-xl',
    '2xl' => 'max-w-2xl',
][$maxWidth ?? 'sm'];
@endphp

<div
    x-data="{
        show: @entangle($attributes->wire('model')).defer
    }"
>
    <div x-cloak
        x-show="show"
        x-on:click="show = false"
        class="fixed inset-0 z-20 bg-black bg-opacity-75"
        x-on:keydown.escape.window="show = false"
        x-transition:enter="transition transform ease-in duration-150"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition transform ease-in duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0">
    </div>

    <div x-cloak x-show="show" class="fixed top-1/2 left-1/2 z-20 w-11/12 md:w-full transform -translate-x-1/2 -translate-y-1/2 {{$maxWidth}}"
        x-transition:enter="transition transform ease-in duration-150"
        x-transition:enter-start="transform opacity-0 scale-90"
        x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition transform ease-in duration-150"
        x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-90">
        <div class="flex flex-col items-center justify-center bg-white w-full rounded-lg lg:rounded-2xl">
            <div class="p-4 sm:p-6 flex items-center justify-between flex-wrap w-full border-b border-gray-light">
                <h4 class="text-blue-dark font-bold tracking-wide">{{ $title }}</h4>
                <a href="javascript:void(0);" @click="show = false" class="text-xl text-blue-dark w-8 h-8 flex items-center justify-center rounded-md duration-300 hover:bg-blue-light">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
            <div class="p-4 sm:p-6 w-full">
                {{ $slot }}
            </div>
            <div class="p-4 sm:p-6 border-t border-gray-light w-full">
                {{ $footer ?? '' }}
            </div>
        </div>
    </div>
</div>

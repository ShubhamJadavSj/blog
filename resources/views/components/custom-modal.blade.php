@props(['id', 'maxWidth'])

@php
$id = $id ?? md5($attributes->wire('model'));

$maxWidth = [
    'sm' => 'sm:max-w-sm',
    'md' => 'sm:max-w-md',
    'lg' => 'sm:max-w-lg',
    'xl' => 'sm:max-w-xl',
    '2xl' => 'sm:max-w-2xl',
][$maxWidth ?? '2xl'];
@endphp

<div
    x-data="{
        show: @entangle($attributes->wire('model')).defer
    }"
>
    <div x-cloak
        x-show="show"
        x-on:click="show = false"
        @click="show=false"
        class="fixed inset-0 z-20 bg-black bg-opacity-75"
        x-on:keydown.escape.window="show = false"
        x-transition:enter="transition transform ease-in duration-150"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition transform ease-in duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0">
    </div>

    <div x-cloak x-show="show" class="fixed top-1/2 left-1/2 z-20 w-11/12 md:w-full max-w-lg transform -translate-x-1/2 -translate-y-1/2"
        x-transition:enter="transition transform ease-in duration-150"
        x-transition:enter-start="transform opacity-0 scale-90"
        x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition transform ease-in duration-150"
        x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-90">
        <div class="flex flex-col items-center justify-center bg-white w-full rounded-lg lg:rounded-2xl">
            <div class="p-4 sm:p-6 flex items-center justify-between flex-wrap w-full border-b border-gray-light">
                <h4 class="text-blue-dark font-medium tracking-wide">{{ $title }}</h4>
                <a href="javascript:void(0);" @click="show = false" class="text-xl text-blue-dark w-8 h-8 flex items-center justify-center rounded-md duration-300 hover:bg-blue-light">
                    <i class="fal fa-times"></i>
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
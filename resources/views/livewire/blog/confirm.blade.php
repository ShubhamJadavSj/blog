<div>
    <x-custom-modal wire:model="show" maxWidth="2xl">
        <x-slot name="title">
            {{ $title }}
        </x-slot>
        <div class="w-full">
            {{ $message }}
        </div>
        <x-slot name="footer">
            <div class="flex justify-end flex-shrink-0 space-x-2">
                <button x-on:click="show = false" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                    {{ __('Cancel') }}
                </button>
                <button wire:click='confirm' class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                    {{ __('Confirm') }}
                </button>
            </div>
        </x-slot>
    </x-custom-modal>
</div>

<div>
    <x-custom-modal wire:model="show">
        <x-slot name="title">
            {{ $editMode ? 'Update Blog' : 'Create Blog' }}
        </x-slot>
        <div class="w-full">
            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                <div class="grid grid-cols-3 gap-6">
                    <div class="col-span-3 sm:col-span-2">
                        <label for="title" class="block text-sm font-medium text-gray-700"> Title </label>
                        <div class="mt-1 flex rounded-md shadow-sm">
                            <input type="text" wire:model.defer="blog.title" id="title" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full sm:text-sm border-gray-300">
                        </div>
                        <x-jet-input-error for="blog.title" class="mt-4" />
                    </div>
                </div>
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700"> Description </label>
                    <div class="mt-1">
                        <textarea id="description" wire:model.defer="blog.description" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"></textarea>
                    </div>
                    <x-jet-input-error for="blog.description" class="mt-4" />
                </div>
            </div>
        </div>
        <x-slot name="footer">
            <div class="flex justify-end flex-shrink-0 space-x-2">
                <x-jet-button x-on:click="show = false" class="w-full sm:w-auto">
                    {{ __('Cancel') }}
                </x-jet-button>
                <x-jet-button wire:click='submit' class="w-full sm:w-auto">
                    {{ __('Submit') }}
                </x-jet-button>
            </div>
        </x-slot>
    </x-custom-modal>
</div>

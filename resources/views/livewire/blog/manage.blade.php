<div>
    <x-custom-modal wire:model="show" maxWidth="2xl">
        <x-slot name="title">
            {{ $editMode ? 'Update Blog' : 'Create Blog' }}
        </x-slot>
        <div class="w-full">
            <div class="bg-white space-y-6">
                <div class="grid grid-cols-3 gap-6">
                    <div class="col-span-3 sm:col-span-2">
                        <label for="title" class="block text-sm font-medium text-gray-700"> Title </label>
                        <div class="mt-1 flex rounded-md shadow-sm">
                            <input type="text" wire:model.defer="blog.title" id="title" class="focus:ring-indigo-500 focus:border-indigo-500 rounded-md flex-1 block w-full sm:text-sm border-gray-300">
                        </div>
                        <x-jet-input-error for="blog.title" class="mt-4" />
                    </div>
                </div>
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700"> Description </label>
                    <div class="mt-1">
                        <textarea id="description" wire:model.defer="blog.description" rows="8" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"></textarea>
                    </div>
                    <x-jet-input-error for="blog.description" class="mt-4" />
                </div>
            </div>
        </div>
        <x-slot name="footer">
            <div class="flex justify-end flex-shrink-0 space-x-2">
                <button x-on:click="show = false" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                    {{ __('Cancel') }}
                </button>
                <button wire:click='submit' class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                    {{ __('Submit') }}
                </button>
            </div>
        </x-slot>
    </x-custom-modal>
</div>

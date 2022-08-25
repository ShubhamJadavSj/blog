<div>
    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="px-4 py-5 sm:px-6">
            <div>
                <label for="search" class="block text-sm font-medium text-gray-700">Search</label>
                <div class="mt-1">
                    <input type="search" wire:model="search" id="search" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Search Title">
                </div>
            </div>
            <div>
                <label for="search" class="block text-sm font-medium text-gray-700">Search by date of creation</label>
                <div class="mt-1">
                    <input type="date" wire:model="created_at" id="search" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Search Title">
                </div>
            </div>
            <button type="button" wire:click='resetFilters' class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Clear Filters</button>
        </div>
        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead class="bg-gray-50">
                        <tr class="select-none">
                            <x-sort wire:click="sort('title')" sort="title" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                Title
                            </x-sort>
                            <x-sort wire:click="sort('created_at')" sort="created_at">
                                Created at
                            </x-sort>
                            <x-sort wire:click="sort('published_at')" sort="published_at">
                                Published at
                            </x-sort>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        @forelse ($blogs as $blog)
                            <tr>
                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ $blog->title }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $blog->created_at->format('d M Y') }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $blog->published_at ? $blog->published_at->diffForHumans() : '-'}}</td>
                                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                    <span wire:click="$emit('openBlogModal', {{ $blog }})" class="text-indigo-600 hover:text-indigo-900">Edit<span class="sr-only">, {{ $blog->title }}</span></span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="whitespace-nowrap text-center px-3 py-4 text-sm text-gray-500">No Blogs Found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $blogs->links() }}
            </div>
        </div>
    </div>

    <livewire:blog.manage>
</div>

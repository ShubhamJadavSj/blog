<div>
    <div class="flex items-center justify-center fixed {{ $newBlogCount ? 'top-20 opacity-100' : 'top-0 opacity-0' }} left-0 right-0 z-[99] transition-all duration-300" wire:poll='fetchBlogCount' wire:click='fetchBlogs'>
        <span class="w-full bg-indigo-400 px-4 py-1 border border-transparent rounded-md flex items-center justify-center text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:w-auto sm:inline-flex">{{ $newBlogCount }} new blogs..</span>
    </div>
    <div class="pt-16 pb-20 lg:pt-24 lg:pb-28 px-4 max-w-7xl w-full mx-auto space-y-5">
        @forelse ($blogs as $blog)
            <div class="bg-white flex flex-col justify-start p-6 rounded shadow">
                <span class="text-blue-700 text-sm font-bold uppercase pb-4">Blog #{{ $loop->iteration }}</span>
                <span class="text-3xl font-bold hover:text-gray-700 pb-4">{{ $blog->title }}</span>
                <p class="text-sm pb-3">
                    By <span class="font-semibold hover:text-gray-800">{{ $blog->creator->name }}</span>, Published {{ $blog->published_at->diffForHumans() }}
                </p>
                <span class="pb-6">{{ $blog->description }}</span>
            </div>
        @empty
        <div class="bg-white flex flex-col justify-start p-6 rounded shadow">
            <span class="text-3xl font-bold hover:text-gray-700 pb-4">No blog Found! Please visit Again....</span>
        </div>
        @endforelse
    </div>
</div>

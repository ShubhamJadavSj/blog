<div>
    <div class="pt-16 pb-20 lg:pt-24 lg:pb-28 px-4 max-w-7xl mx-auto space-y-5" wire:poll>
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

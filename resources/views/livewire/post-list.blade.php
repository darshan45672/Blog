    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}

    <div id="posts" class=" px-3 lg:px-7 py-6">
        <div class="flex justify-between items-center border-b border-gray-100">
            <div id="filter-selector" class="flex items-center space-x-4 font-light ">
                <button class="{{ $sort === 'desc' ? 'text-gray-900 border-b border-gray-700' : 'text-gray-500' }} py-4" wire:click="setSort('desc')">Latest</button>
                <button class="{{ $sort === 'asc' ? 'text-gray-900 border-b border-gray-700' : 'text-gray-500' }} py-4 " wire:click="setSort('asc')">Oldest</button>
            </div>
        </div>
        <div class="py-4">
            @foreach ($posts as $post)    
            <x-posts.post-item :post='$post' />
            @endforeach
        </div>

        <div class="my-3">
            {{ $posts->links() }}
        </div>
    </div>

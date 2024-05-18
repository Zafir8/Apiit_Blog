<div>
    <!-- Hero Section with New Image -->
    <div class="relative py-12 px-4" style="background-color: #dc2626;"> <!-- Adjust the background color to match the vibrant red of your image -->
        <img src="{{ asset('images/DALL·E 2024-05-19 04.14.42 - Create a vibrant red digital poster featuring a realistic photo of diverse university students at a lively event. The students should be of various et.webp') }}" alt="Diverse Students at APIIT" class="absolute inset-0 object-cover w-full h-full opacity-75"> <!-- Semi-transparent image overlay -->

        <div class="container mx-auto relative z-10"> <!-- Ensure text is above the image -->
            <div class="text-center text-white">
                <h1 class="text-4xl font-bold"> APIIT Blog</h1>
                <p class="text-xl mt-2">Stay updated with the latest posts and insights from our community.</p>
            </div>
        </div>
    </div>

    <!-- Existing Content -->
    <div class="px-3 py-6 lg:px-7">
        <div class="flex items-center justify-between border-b border-gray-100">
            <div class="text-gray-600">
                @if ($this->activeCategory || $search)
                    <button class="mr-3 text-xs gray-500" wire:click="clearFilters()">X</button>
                @endif
                @if ($this->activeCategory)
                    <x-badge wire:navigate href="{{ route('posts.index', ['category' => $this->activeCategory->slug]) }}"
                             :textColor="$this->activeCategory->text_color" :bgColor="$this->activeCategory->bg_color">
                        {{ $this->activeCategory->title }}
                    </x-badge>
                @endif
                @if ($search)
                    <span class="ml-2">
                        containing : <strong>{{ $search }}</strong>
                    </span>
                @endif
            </div>
            <div class="flex items-center space-x-4 font-light">
                <button class="{{ $sort === 'desc' ? 'text-gray-900 border-b border-gray-700' : 'text-gray-500' }} py-4"
                        wire:click="setSort('desc')">Latest</button>
                <button class="{{ $sort === 'asc' ? 'text-gray-900 border-b border-gray-700' : 'text-gray-500' }} py-4"
                        wire:click="setSort('asc')">Oldest</button>
            </div>
        </div>
        <div class="py-4">
            @foreach ($this->posts as $post)
                <x-posts.post-item :key="$post->id" :post="$post" />
            @endforeach
        </div>

        <div class="my-3">
            {{ $this->posts->onEachSide(1)->links() }}
        </div>
    </div>
</div>

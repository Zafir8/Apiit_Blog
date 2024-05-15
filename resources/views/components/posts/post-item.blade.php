@props(['post'])
<article class="border-b border-gray-100 pb-10 last:border-b-0">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 mt-5 bg-white p-4 rounded-lg shadow-lg transition-transform duration-300 hover:-translate-y-1">
        <div class="lg:col-span-4">
            <a href="{{ route('posts.show', $post->slug) }}" class="block hover:opacity-95 transition-opacity duration-200">
                <img class="rounded-lg mx-auto shadow-sm hover:shadow-md transition-shadow duration-300" src="{{ $post->getThumbnailUrl() }}" alt="{{ $post->title }}">
            </a>
        </div>
        <div class="lg:col-span-8 bg-white p-4 rounded-lg shadow-md">
            <div class="flex items-center text-xs lg:text-sm text-gray-500 mb-2">
                <x-posts.author :author="$post->author" size="xs" class="mr-2"/>
                <span>{{ $post->published_at->diffForHumans() }}</span>
            </div>
            <h2 class="text-xl lg:text-2xl font-bold text-gray-900 mb-3">
                <a href="{{ route('posts.show', $post->slug) }}" class="hover:text-red-700 transition-colors duration-200 ease-in-out">
                    {{ $post->title }}
                </a>
            </h2>
            <p class="text-gray-700 mb-4 truncate">
                {{ $post->getExcerpt() }}
            </p>
            <div class="flex flex-wrap items-center justify-between gap-2">
                <div class="flex gap-2">
                    @foreach ($post->categories as $category)
                        <x-posts.category-badge :category="$category" class="bg-blue-100 text-red-700 text-xs px-2 py-1 rounded-full" />
                    @endforeach
                    <span class="text-gray-500 text-xs lg:text-sm">{{ $post->getReadingTime() }} min read</span>
                </div>
                <div>
                    <livewire:like-button :key="'like-' . $post->id" :post="$post" class="hover:text-blue-500 transition-colors duration-200 ease-in-out"/>
                </div>
            </div>
        </div>
    </div>
</article>

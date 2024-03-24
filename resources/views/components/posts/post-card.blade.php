@props(['post'])

<div {{ $attributes->merge(['class' => 'bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 ease-in-out']) }}>
    <a href="{{ route('posts.show', $post->slug) }}" class="block hover:opacity-90 transition-opacity duration-300 ease-in-out">
        <img class="w-full h-56 object-cover" src="{{ $post->getThumbnailUrl() }}" alt="{{ $post->title }}">
    </a>
    <div class="p-5">
        <div class="flex items-center mb-2 gap-x-2">
            @if ($category = $post->categories()->first())
                <x-posts.category-badge :category="$category" class="text-xs font-semibold uppercase tracking-wide text-white bg-blue-500 px-2.5 py-0.5 rounded" />
            @endif
            <p class="text-xs text-gray-400">{{ $post->published_at->format('M d, Y') }}</p>
        </div>
        <!-- Author Component -->
        <x-posts.author :author="$post->author" size="md" />
        <a href="{{ route('posts.show', $post->slug) }}" class="block mt-2 text-lg md:text-xl font-semibold text-gray-900 hover:text-blue-600 transition-colors duration-300 ease-in-out">
            {{ $post->title }}
        </a>
        <p class="text-gray-600 mt-2">
            {{ Str::limit($post->excerpt, 150, '...') }}
        </p>
        <a href="{{ route('posts.show', $post->slug) }}" class="text-blue-600 hover:underline mt-4 inline-block">
            Continue Reading
        </a>
    </div>
</div>

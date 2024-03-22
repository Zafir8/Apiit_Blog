@props(['post'])

<div {{ $attributes->merge(['class' => 'bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 ease-in-out']) }}>
    <a  href="{{ route('posts.show', $post->slug) }}" class="block hover:opacity-90 transition-opacity duration-300 ease-in-out">
        <div>
            <img class="w-full h-56 object-cover" src="{{ $post->getThumbnailUrl() }}" alt="Post Thumbnail">
        </div>
    </a>
    <div class="p-5">
        <div class="flex items-center mb-4 gap-x-2">
            @if ($category = $post->categories()->first())
                <x-posts.category-badge :category="$category" class="text-xs font-semibold uppercase tracking-wide text-white bg-blue-500 px-2.5 py-0.5 rounded" />
            @endif
            <p class="text-xs text-gray-400">{{ $post->published_at->format('M d, Y') }}</p>
        </div>
        <a href="{{ route('posts.show', $post->slug) }}" class="text-lg md:text-xl font-semibold text-gray-900 hover:text-blue-600 transition-colors duration-300 ease-in-out">{{ $post->title }}</a>
    </div>
</div>

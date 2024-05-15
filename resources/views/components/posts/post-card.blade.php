@props(['post'])

<div {{ $attributes->merge(['class' => 'bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 ease-in-out min-h-[350px]']) }}>
    <a href="{{ route('posts.show', $post->slug) }}" class="block hover:opacity-90 transition-opacity duration-300 ease-in-out">
        <!-- Ensure a placeholder for missing images -->
        <div class="aspect-w-16 aspect-h-9 w-full overflow-hidden">
            <img class="object-cover w-full h-full" src="{{ $post->getThumbnailUrl() ?? asset('images/default-placeholder.png') }}" alt="{{ $post->title }}">
        </div>
    </a>
    <div class="p-5">
        <div class="flex items-center mb-2 gap-x-2">
            @if ($category = $post->categories()->first())
                <!-- Category Badge Component -->
                <x-posts.category-badge :category="$category" class="text-xs font-semibold uppercase tracking-wide text-white bg-red-700 px-2.5 py-0.5 rounded" />
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
        <a href="{{ route('posts.show', $post->slug) }}" class="text-red-700 hover:underline mt-4 inline-block">
            Continue Reading
        </a>
    </div>
</div>

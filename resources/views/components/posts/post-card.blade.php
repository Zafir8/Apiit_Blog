@props(['post'])

<div {{ $attributes->class('bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300 ease-in-out') }}>
    <a href="#" class="block overflow-hidden">
        <img class="w-full transform hover:scale-105 transition-transform duration-300 ease-in-out" src="{{ $post->getThumbnailUrl() }}" alt="Post Thumbnail" style="height: 200px; object-fit: cover;">
    </a>
    <div class="p-5">
        <div class="flex items-center justify-between mb-4">
            @if ($category = $post->categories()->first())
                <a href="{{ route('posts.index', ['category' => $category->slug]) }}" class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium leading-5 shadow-sm" style="background-color: {{ $category->bg_color }}; color: {{ $category->text_color }};">
                    {{ $category->title }}
                </a>
            @endif
            <p class="text-sm text-gray-400">{{ $post->published_at->format('M d, Y') }}</p>
        </div>
        <a href="#" class="block text-lg font-semibold text-gray-900 hover:text-primary-500">{{ $post->title }}</a>
    </div>
</div>

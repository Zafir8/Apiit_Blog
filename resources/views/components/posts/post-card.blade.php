<div class="rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300">
    <a href="{{ $post->url }}">
        <img class="w-full h-48 object-cover" src="{{ $post->getThumbnailUrl() }}" alt="Post Image">
    </a>
    <div class="p-6">
        <div class="flex items-center justify-between mb-4">
            <a href="#" class="inline-block bg-blue-600 text-white rounded-full px-3 py-1 text-sm font-medium mr-2">blog</a>
            <span class="text-gray-500 text-sm">{{ $post->published_at->toFormattedDateString() }}</span>
        </div>
        <a href="{{ $post->url }}" class="block text-lg lg:text-xl font-semibold text-gray-900 hover:text-gray-700 mb-2">
            {{ $post->title }}
        </a>
        <p class="text-gray-600 text-sm">
            {{ $post->getExcerpt(100) }} <!-- Assuming getExcerpt() accepts a character limit -->
        </p>
    </div>
</div>

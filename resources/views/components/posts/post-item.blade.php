@props(['post'])
<article class="border-b border-gray-200 pb-8 mb-8 last:border-b-0">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
        <div class="lg:col-span-5">
            <a href="{{ $post->url }}">
                <img class="w-full h-auto rounded-lg shadow" src="{{ $post->getThumbnailUrl() }}" alt="Article thumbnail">
            </a>
        </div>
        <div class="lg:col-span-7">
            <div class="flex items-center mb-4">
                <img class="w-8 h-8 rounded-full mr-3" src="{{ $post->author->profile_photo_url }}" alt="{{ $post->author->name }}">
                <div class="flex flex-col">
                    <span class="font-medium">{{ $post->author->name }}</span>
                    <span class="text-gray-500 text-xs">{{ $post->published_at->diffForHumans() }}</span>
                </div>
            </div>
            <h2 class="text-2xl font-semibold text-gray-900 hover:text-gray-700">
                <a href="{{ $post->url }}">
                    {{ $post->title }}
                </a>
            </h2>
            <p class="mt-3 text-gray-600">
                {{ $post->getExcerpt() }}
            </p>
            <div class="flex items-center justify-between mt-6">
                <span class="text-sm text-gray-500">{{ $post->getReadingTime() }} min read</span>
                <a href="#" class="flex items-center text-gray-600 hover:text-gray-800">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                    </svg>
                    <span class="ml-2">1</span>
                </a>
            </div>
        </div>
    </div>
</article>

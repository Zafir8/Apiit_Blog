
<x-app-layout>
    <article class="w-full col-span-4 py-5 mx-auto mt-10 md:col-span-3" style="max-width:700px; background-color: hsl(0, 0%, 100%);">
        <div class="flex flex-col items-center justify-center bg-gradient-to-r from-blue-900 to-blue-300 p-4 rounded-lg shadow-lg">
            <h1 class="text-4xl font-bold text-center text-white">
                {{ $post->title }}
            </h1>
            <img class="w-full my-2 rounded-lg" src="{{ $post->getThumbnailUrl() }}" alt="thumbnail">
        </div>

        <div class="flex flex-col items-center justify-center mt-2 bg-white p-4 rounded-lg shadow-md">
            <div class="flex items-center py-5">
                <x-posts.author :author="$post->author" size="md" />
                <span class="text-sm text-gray-500">| {{ $post->getReadingTime() }} min read</span>
            </div>
            <div class="flex items-center">
                <span class="mr-2 text-gray-500">{{ $post->published_at->diffForHumans() }}</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.3"
                     stroke="currentColor" class="w-5 h-5 text-gray-500">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
        </div>

        <div
            class="flex flex-col items-center justify-center px-2 py-4 my-6 text-sm border-t border-b border-gray-200 article-actions-bar bg-gradient-to-r from-blue-200 to-blue-100 p-4 rounded-lg shadow-md">
            <div class="flex items-center">
                <livewire:like-button :key="'like-' . $post->id" :$post />
            </div>
            <div>
                <div class="flex items-center">
                </div>
            </div>
        </div>

        <div class="py-3 text-lg prose text-justify text-gray-800 article-content bg-white p-4 rounded-lg shadow-md">
            {!! $post->body !!}
        </div>

        <div class="flex flex-wrap items-center justify-center mt-10 space-x-4 bg-gradient-to-r from-blue-200 to-blue-100 p-4 rounded-lg shadow-md">
            @foreach ($post->categories as $category)
                <x-posts.category-badge :category="$category" />
            @endforeach
        </div>

        <div class="mt-10 p-4 bg-white shadow-lg rounded-lg">
            <livewire:post-comments :key="'comments' . $post->id" :$post />
        </div>
    </article>
</x-app-layout>

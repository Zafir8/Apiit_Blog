<article class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow transition-shadow duration-300 ease-in-out [&:not(:last-child)]:border-b border-gray-100 pb-10">
    <div class="grid items-start grid-cols-1 md:grid-cols-12 gap-4 mt-5 p-4 md:p-6 article-body">
        <div class="md:col-span-4 article-thumbnail flex justify-center">
            <a href="#" class="block w-full max-w-sm">
                <img class="mx-auto rounded-lg transition-transform duration-300 ease-in-out hover:scale-105" src="{{ $post->getThumbnailUrl() }}" alt="thumbnail">
            </a>
        </div>
        <div class="md:col-span-8">
            <div class="flex items-center py-1 text-sm gap-x-2 article-meta">
                <img class="mr-3 rounded-full w-8 h-8" src="{{ $post->author->profile_photo_url }}" alt="{{ $post->author->name }}">
                <div>
                    <span class="font-medium text-gray-900">{{ $post->author->name }}</span>
                    <span class="text-xs text-gray-500 block">{{ $post->published_at->diffForHumans() }}</span>
                </div>
            </div>
            <h2 class="mt-2 text-2xl font-bold text-gray-900 hover:text-primary-500">
                <a href="#">
                    {{ $post->title }}
                </a>
            </h2>
            <p class="mt-3 text-base font-normal text-gray-700">
                {{ $post->getExcerpt() }}
            </p>
            <div class="mt-6 flex items-center justify-between flex-wrap gap-2 article-actions-bar">
                @foreach ($post->categories as $category)
                    <a href="{{ route('posts.index', ['category' => $category->slug]) }}" class="px-3 py-1 rounded-full text-sm font-medium leading-5 shadow-sm" style="background-color: {{ $category->bg_color }}; color: {{ $category->text_color }};">
                        {{ $category->title }}
                    </a>
                @endforeach
                <span class="text-sm text-gray-500">{{ $post->getReadingTime() }} min read</span>
                <div>
                    <livewire:like-button :key="$post->id" :post="$post" />
                </div>
            </div>
        </div>
    </div>
</article>


{{-- <x-app-layout>
    
    <article class="w-full col-span-4 py-5 mx-auto mt-10 md:col-span-3" style="max-width:700px">
        <h1 class="text-4xl font-bold text-left text-gray-800">
            {{ $post->title }}
        </h1>
        <img class="w-full my-2 rounded-lg" src="{{ $post->getThumbnailUrl() }}" alt="thumbnail">
        
        
        <div class="flex items-center justify-between mt-2">
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
            class="flex items-center justify-between px-2 py-4 my-6 text-sm border-t border-b border-gray-100 article-actions-bar">
            <div class="flex items-center">
                <livewire:like-button :key="'likebutton-' . $post->id" :$post />
            </div>
            <div>
                <div class="flex items-center">
                </div>
            </div>
        </div>

        <div class="py-3 text-lg prose text-justify text-gray-800 article-content">
            {!! $post->body !!}
        </div>

        <div class="flex items-center mt-10 space-x-4">
            @foreach ($post->categories as $category)
                <x-posts.category-badge :category="$category" />
            @endforeach
        </div>

        <livewire:post-comments :key="'comments' . $post->id" :$post />
    </article>
</x-app-layout> --}}



{{-- <x-app-layout>
    <article class="w-full col-span-4 py-5 mx-auto mt-10 md:col-span-3" style="max-width:700px">
        <div class="flex flex-col items-center justify-center">
            <h1 class="text-4xl font-bold text-center text-gray-800">
                {{ $post->title }}
            </h1>
            <img class="w-full my-2 rounded-lg" src="{{ $post->getThumbnailUrl() }}" alt="thumbnail">
        </div>
        
        <div class="flex flex-col items-center justify-center mt-2">
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
            class="flex flex-col items-center justify-center px-2 py-4 my-6 text-sm border-t border-b border-gray-100 article-actions-bar">
            <div class="flex items-center">
                <livewire:like-button :key="'likebutton-' . $post->id" :$post />
            </div>
            <div>
                <div class="flex items-center">
                </div>
            </div>
        </div>

        <div class="py-3 text-lg prose text-justify text-gray-800 article-content">
            {!! $post->body !!}
        </div>

        <div class="flex flex-wrap items-center justify-center mt-10 space-x-4">
            @foreach ($post->categories as $category)
                <x-posts.category-badge :category="$category" />
            @endforeach
        </div>

        <livewire:post-comments :key="'comments' . $post->id" :$post />
    </article>
</x-app-layout> --}}



{{-- <x-app-layout>
    <article class="w-full col-span-4 py-5 mx-auto mt-10 md:col-span-3" style="max-width:700px; background-color: #f0f8ff;">
        <div class="flex flex-col items-center justify-center bg-gradient-to-r from-purple-400 via-pink-500 to-red-500 p-4 rounded-lg shadow-lg">
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
            class="flex flex-col items-center justify-center px-2 py-4 my-6 text-sm border-t border-b border-gray-100 article-actions-bar bg-gradient-to-r from-green-400 via-blue-500 to-purple-600 p-4 rounded-lg shadow-md">
            <div class="flex items-center">
                <livewire:like-button :key="'likebutton-' . $post->id" :$post />
            </div>
            <div>
                <div class="flex items-center">
                </div>
            </div>
        </div>

        <div class="py-3 text-lg prose text-justify text-gray-800 article-content bg-white p-4 rounded-lg shadow-md">
            {!! $post->body !!}
        </div>

        <div class="flex flex-wrap items-center justify-center mt-10 space-x-4 bg-gradient-to-r from-yellow-400 via-green-500 to-blue-600 p-4 rounded-lg shadow-md">
            @foreach ($post->categories as $category)
                <x-posts.category-badge :category="$category" />
            @endforeach
        </div>

        <div class="mt-10 p-4 bg-white shadow-lg rounded-lg">
            <livewire:post-comments :key="'comments' . $post->id" :$post />
        </div>
    </article>
</x-app-layout> --}}

{{-- 
<x-app-layout>
    <article class="w-full col-span-4 py-5 mx-auto mt-10 md:col-span-3" style="max-width:700px; background-color: hsl(0, 0%, 100%);">
        <div class="flex flex-col items-center justify-center bg-gradient-to-r from-gray-500 to-gray-700 p-4 rounded-lg shadow-lg">
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
            class="flex flex-col items-center justify-center px-2 py-4 my-6 text-sm border-t border-b border-gray-200 article-actions-bar bg-gradient-to-r from-gray-200 to-gray-300 p-4 rounded-lg shadow-md">
            <div class="flex items-center">
                <livewire:like-button :key="'likebutton-' . $post->id" :$post />
            </div>
            <div>
                <div class="flex items-center">
                </div>
            </div>
        </div>

        <div class="py-3 text-lg prose text-justify text-gray-800 article-content bg-white p-4 rounded-lg shadow-md">
            {!! $post->body !!}
        </div>

        <div class="flex flex-wrap items-center justify-center mt-10 space-x-4 bg-gradient-to-r from-gray-200 to-gray-300 p-4 rounded-lg shadow-md">
            @foreach ($post->categories as $category)
                <x-posts.category-badge :category="$category" />
            @endforeach
        </div>

        <div class="mt-10 p-4 bg-white shadow-lg rounded-lg">
            <livewire:post-comments :key="'comments' . $post->id" :$post />
        </div>
    </article>
</x-app-layout> --}}


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
                <livewire:like-button :key="'likebutton-' . $post->id" :$post />
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




{{-- <x-app-layout>
    <div class="container mx-auto">
        <div class="max-w-3xl mx-auto px-4 py-8">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">{{ $post->title }}</h1>
            <img class="w-full rounded-lg mb-6" src="{{ $post->getThumbnailUrl() }}" alt="thumbnail">
            
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center">
                    <x-posts.author :author="$post->author" size="md" />
                    <span class="text-sm text-gray-500 ml-2">{{ $post->getReadingTime() }} min read</span>
                </div>
                <div class="flex items-center">
                    <span class="mr-2 text-gray-500">{{ $post->published_at->diffForHumans() }}</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.3" stroke="currentColor" class="w-5 h-5 text-gray-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>

            <div class="flex items-center justify-between px-2 py-4 my-6 text-sm border-t border-b border-gray-100 article-actions-bar">
                <div class="flex items-center">
                    <livewire:like-button :key="'likebutton-' . $post->id" :$post />
                </div>
                <div>
                    <!-- Add additional article actions if necessary -->
                </div>
            </div>

            <div class="prose text-justify text-gray-800 article-content">
                {!! $post->body !!}
            </div>

            <div class="flex items-center mt-8 space-x-4">
                @foreach ($post->categories as $category)
                    <x-posts.category-badge :category="$category" />
                @endforeach
            </div>
        </div>
    </div>
    <div class="bg-gray-100 px-4 py-8">
        <livewire:post-comments :key="'comments' . $post->id" :$post />
    </div>
</x-app-layout> --}}


{{-- 
<x-app-layout>
    <div class="flex flex-col items-center justify-center h-full">
        <h1 class="text-4xl font-bold text-center text-gray-800 my-10">
            {{ $post->title }}
        </h1>
        <article class="w-full col-span-4 py-5 mx-auto md:col-span-3" style="max-width:700px">
            <img class="w-full my-2 rounded-lg" src="{{ $post->getThumbnailUrl() }}" alt="thumbnail">
            <div class="flex items-center justify-between mt-2">
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
                class="flex items-center justify-between px-2 py-4 my-6 text-sm border-t border-b border-gray-100 article-actions-bar">
                <div class="flex items-center">
                    <livewire:like-button :key="'likebutton-' . $post->id" :$post />
                </div>
                <div>
                    <div class="flex items-center">
                    </div>
                </div>
            </div>

            <div class="py-3 text-lg prose text-justify text-gray-800 article-content">
                {!! $post->body !!}
            </div>

            <div class="flex items-center mt-10 space-x-4">
                @foreach ($post->categories as $category)
                    <x-posts.category-badge :category="$category" />
                @endforeach
            </div>

            <livewire:post-comments :key="'comments' . $post->id" :$post />
        </article>
    </div>
</x-app-layout>
 --}}


{{-- <x-app-layout>
    <h1 class="text-4xl font-bold text-left text-gray-800 mt-10 mx-auto max-w-3xl">
        {{ $post->title }}
    </h1>
    <div class="flex justify-center">
        <article class="w-full col-span-4 py-5 mx-auto mt-10 md:col-span-3" style="max-width:700px">
            <img class="w-full my-2 rounded-lg" src="{{ $post->getThumbnailUrl() }}" alt="thumbnail">
            <div class="flex items-center justify-between mt-2">
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
                class="flex items-center justify-between px-2 py-4 my-6 text-sm border-t border-b border-gray-100 article-actions-bar">
                <div class="flex items-center">
                    <livewire:like-button :key="'likebutton-' . $post->id" :$post />
                </div>
                <div>
                    <div class="flex items-center">
                    </div>
                </div>
            </div>

            <div class="py-3 text-lg prose text-justify text-gray-800 article-content">
                {!! $post->body !!}
            </div>

            <div class="flex items-center mt-10 space-x-4">
                @foreach ($post->categories as $category)
                    <x-posts.category-badge :category="$category" />
                @endforeach
            </div>

            <livewire:post-comments :key="'comments' . $post->id" :$post />
        </article>
    </div>
</x-app-layout> --}}



{{-- <x-app-layout>
    <div class="flex flex-col items-center justify-center">
        <h1 class="text-4xl font-bold text-center text-gray-800 mt-10 mb-6 max-w-3xl">
            {{ $post->title }}
        </h1>
        <article class="w-full col-span-4 py-5 mx-auto mt-10 md:col-span-3" style="max-width:700px">
            <img class="w-full my-2 rounded-lg" src="{{ $post->getThumbnailUrl() }}" alt="thumbnail">
            <div class="flex items-center justify-between mt-2">
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
                class="flex items-center justify-between px-2 py-4 my-6 text-sm border-t border-b border-gray-100 article-actions-bar">
                <div class="flex items-center">
                    <livewire:like-button :key="'likebutton-' . $post->id" :$post />
                </div>
                <div>
                    <div class="flex items-center">
                    </div>
                </div>
            </div>

            <div class="py-3 text-lg prose text-justify text-gray-800 article-content">
                {!! $post->body !!}
            </div>

            <div class="flex items-center mt-10 space-x-4">
                @foreach ($post->categories as $category)
                    <x-posts.category-badge :category="$category" />
                @endforeach
            </div>

            <livewire:post-comments :key="'comments' . $post->id" :$post />
        </article>
    </div>
</x-app-layout> --}}


{{-- <x-app-layout>
    <div class="flex flex-col items-center justify-center px-4">
        <h1 class="text-4xl font-bold text-center text-gray-800 mt-10 mb-6 max-w-3xl">
            {{ $post->title }}
        </h1>
        <article class="w-full col-span-4 py-5 mx-auto mt-10 md:col-span-3" style="max-width:700px">
            <img class="w-full my-2 rounded-lg" src="{{ $post->getThumbnailUrl() }}" alt="thumbnail">
            <div class="flex items-center justify-between mt-2">
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
                class="flex items-center justify-between px-2 py-4 my-6 text-sm border-t border-b border-gray-100 article-actions-bar">
                <div class="flex items-center">
                    <livewire:like-button :key="'likebutton-' . $post->id" :$post />
                </div>
                <div>
                    <div class="flex items-center">
                    </div>
                </div>
            </div>

            <div class="py-3 text-lg prose text-justify text-gray-800 article-content">
                {!! $post->body !!}
            </div>

            <div class="flex items-center mt-10 space-x-4">
                @foreach ($post->categories as $category)
                    <x-posts.category-badge :category="$category" />
                @endforeach
            </div>

            <livewire:post-comments :key="'comments' . $post->id" :$post />
        </article>
    </div>
</x-app-layout> --}}


{{-- <x-app-layout>
    <article class="w-full col-span-4 py-5 mx-auto mt-10 md:col-span-3 max-w-screen-lg">
        <div class="rounded-lg overflow-hidden shadow-lg">
            <img class="w-full object-cover h-72 md:h-96" src="{{ $post->getThumbnailUrl() }}" alt="thumbnail">
            <div class="p-6">
                <h1 class="text-4xl font-bold text-gray-800 mb-4">{{ $post->title }}</h1>
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center">
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
                <div class="text-gray-800 prose prose-lg text-justify article-content">
                    {!! $post->body !!}
                </div>
                <div class="flex items-center mt-8 space-x-4">
                    @foreach ($post->categories as $category)
                        <x-posts.category-badge :category="$category" />
                    @endforeach
                </div>
                <div class="mt-8">
                    <livewire:like-button :key="'likebutton-' . $post->id" :$post />
                </div>
            </div>
        </div>
        <livewire:post-comments :key="'comments' . $post->id" :$post />
    </article>
</x-app-layout> --}}


{{-- <x-app-layout>
    <div class="relative">
        <!-- Blog Image -->
        <img class="w-full object-cover h-72 md:h-96" src="{{ $post->getThumbnailUrl() }}" alt="thumbnail">
        <!-- Highlighted Heading -->
        <h1 class="absolute top-0 left-0 right-0 px-6 py-4 text-4xl font-bold text-blac bg-blue-200 bg-opacity-70">{{ $post->title }}</h1>
    </div>
    <article class="w-full col-span-4 py-5 mx-auto mt-10 md:col-span-3 max-w-screen-lg">
        <div class="rounded-lg overflow-hidden shadow-lg">
            <div class="p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center">
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
                <div class="text-gray-800 prose prose-lg text-justify article-content">
                    {!! $post->body !!}
                </div>
                <div class="flex items-center mt-8 space-x-4">
                    @foreach ($post->categories as $category)
                        <x-posts.category-badge :category="$category" />
                    @endforeach
                </div>
                <div class="mt-8">
                    <livewire:like-button :key="'likebutton-' . $post->id" :$post />
                </div>
            </div>
        </div>
        <livewire:post-comments :key="'comments' . $post->id" :$post />
    </article>
</x-app-layout> --}}
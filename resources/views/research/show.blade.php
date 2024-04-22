<x-app-layout>
    <article class="w-full col-span-4 py-5 mx-auto mt-10 md:col-span-3" style="max-width:700px">
        <div class="flex flex-col items-center justify-center">
            <h1 class="text-4xl font-bold text-center text-gray-800">
                {{ $research->title }}
            </h1>
            <img class="w-full my-2 rounded-lg" src="{{ $research->getThumbnailUrl() }}" alt="Thumbnail of {{ $research->title }}">
        </div>

        <div class="flex flex-col items-center justify-center mt-2">
            <div class="flex items-center py-5">
                <span class="text-sm text-gray-500">{{ $research->published_at->diffForHumans() }}</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.3"
                     stroke="currentColor" class="w-5 h-5 text-gray-500 ml-2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
        </div>

        <!-- Centering the description text and author component -->
        <div class="flex flex-col items-center justify-center py-3 text-lg prose text-center text-gray-800 article-content">
            {!! $research->description !!}
        </div>

        @if (isset($research->author))
            <div class="flex flex-col items-center justify-center py-5">
                <x-research.author :author="$research->author" size="md" />
            </div>
        @endif
    </article>
</x-app-layout>

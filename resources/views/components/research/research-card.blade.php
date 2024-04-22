<div class="bg-white shadow-md hover:shadow-lg transition-shadow duration-300 rounded-lg overflow-hidden">
    <!-- Link to the research detail page using the research slug -->
    <a href="{{ route('research.show', $research) }}" class="block hover:opacity-90 transition-opacity duration-300">
        <img class="w-full object-cover" style="height: 200px;" src="{{ $research->getThumbnailUrl() }}" alt="{{ $research->title }}">
    </a>
    <div class="p-4">
        <!-- Date display only -->
        <div class="text-sm text-gray-600 mb-2">
            {{ $research->published_at->format('M d, Y') }}
        </div>
        <!-- Research title with link -->
        <a href="{{ route('research.show', $research) }}" class="text-lg font-bold text-gray-800 hover:text-red-600 transition-colors duration-300">
            {{ $research->title }}
        </a>
        <!-- Author information -->
        <div class="flex items-center mt-2">
            <img src="{{ $research->author->profile_photo_url }}" alt="{{ $research->author->name }}" class="w-8 h-8 rounded-full mr-2">
            <span class="text-sm text-gray-700">{{ $research->author->name }}</span>
        </div>
    </div>
</div>


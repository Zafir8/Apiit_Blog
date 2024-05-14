<div class="max-w-md mx-auto bg-white rounded-lg shadow-lg overflow-hidden md:max-w-lg">
    <!-- Image section with dynamic sizing -->
    <div class="relative">
        <a href="#">
            <!-- Adjust the height or remove the fixed height to allow the image to scale naturally -->
            <img class="w-full object-cover" style="height: 100%; min-height: 200px;" src="{{ $event->getThumbnailUrl() }}" alt="{{ $event->title }}">
        </a>
        <!-- Overlay with event type on the image -->
        <h1 class="absolute top-0 left-0 bg-yellow-300 text-white text-xs uppercase px-3 py-1 rounded-br-lg">
            Event
        </h1>
    </div>

    <!-- Content section -->
    <div class="p-4">
        <!-- Event title -->
        <a href="#" class="block text-lg leading-tight font-medium text-black hover:underline">
            {{ $event->title }}
        </a>
        <!-- Event date and other details -->
        <div class="flex items-center text-sm text-gray-500 mt-2 space-x-4">
            <span><i class="fas fa-calendar-alt"></i> {{ $event->start_date->format('M d, Y') }}</span>
        </div>

        <!-- Author information -->
        <div class="flex items-center mt-2">
            <img src="{{ $event->author->profile_photo_url }}" alt="{{ $event->author->name }}" class="w-6 h-6 rounded-full mr-2">
            <span class="text-sm text-gray-600">By {{ $event->author->name }}</span>
        </div>

        <!-- Event description (truncated) -->
        <p class="text-gray-500 mt-2 line-clamp-3">
            {!! $event->description !!}
        </p>

        <!-- Event location -->
        <p class="text-gray-500 mt-2">
            <i class="fas fa-map-marker-alt"></i> {{ $event->location }}
        </p>

        <!-- RSVP button, visible only if the user is logged in -->
        @auth
            <a href="{{ $event->rsvp_link }}" class="mt-4 inline-block bg-blue-500 text-white text-sm font-semibold py-2 px-4 rounded-lg hover:bg-blue-700">
                Add to calendar
            </a>
        @endauth
    </div>
</div>

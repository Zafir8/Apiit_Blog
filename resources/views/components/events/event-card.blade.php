<div class="max-w-md mx-auto bg-white rounded-lg shadow-lg overflow-hidden md:max-w-lg">
    <!-- Image section with overlay link to read more -->
    <div class="relative">
        <a href="#">
            <img class="w-full h-56 object-cover" src="{{ $event->getThumbnailUrl() }}" alt="{{ $event->title }}">
        </a>
        <!-- Overlay with event type on the image -->
        <a href="#" class="absolute top-0 left-0 bg-yellow-300 text-white text-xs uppercase px-3 py-1 rounded-br-lg">
            Event
        </a>
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

        <!-- Event description (truncated) -->
        <p class="text-gray-500 mt-2 line-clamp-3">
            {!! $event->description !!}
        </p>

        <!-- Event location -->
        <p class="text-gray-500 mt-2">
            <i class="fas fa-map-marker-alt"></i> {{ $event->location }}
        </p>
    </div>
</div>

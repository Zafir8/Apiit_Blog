<x-app-layout>
    @section('hero')
        <div class="w-full py-32 bg-gradient-to-r from-blue-700 via-blue-800 to-blue-900 relative">
            <!-- Image Container with Overlay -->
            <div class="absolute inset-0 w-full h-full">
                <img src="{{ asset('images/DALL·E 2024-05-19 03.51.49 - Create a vibrant red digital poster featuring a realistic photo of diverse university students at a lively event. The students should be of various et.webp') }}" alt="Hero" class="object-cover w-full h-full">
                <!-- Dark Shadow Overlay -->
                <div class="absolute inset-0 bg-black opacity-50"></div>
            </div>

            <div class="container mx-auto px-4 relative z-10">
                <div class="flex flex-col items-center justify-center text-center">
                    <h1 class="text-5xl md:text-6xl font-bold text-white tracking-tight">
                        APIIT<span class="text-red-600"> Events</span>
                    </h1>
                    <p class="mt-2 text-lg md:text-2xl text-white">
                        Explore the latest updates and insights at APIIT.
                    </p>
                </div>
            </div>
        </div>
    @endsection


    <div class="mb-10 w-full">
        <div class="mb-16">
            <h2 class="mt-16 mb-5 text-3xl font-bold text-red-700 text-center">Featured Events</h2>
            <div class="w-full">
                <div class="grid grid-cols-1 gap-10 px-4 md:px-32">
                    @foreach ($featuredEvents as $event)
                        <div class="max-w-3xl mx-auto">
                            <x-events.event-card :event="$event" />
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <hr>

        <h2 class="mt-16 mb-5 text-3xl font-bold text-red-700 text-center">Latest Events</h2>
        <div class="w-full mb-5">
            <div class="grid grid-cols-1 gap-10 px-4 md:px-32">
                @foreach ($latestEvents as $event)
                    <div class="max-w-3xl mx-auto">
                        <x-events.event-card :event="$event" />
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>

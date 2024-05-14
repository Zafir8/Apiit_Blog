<x-app-layout>
    @section('hero')
        <div class="w-full py-32 bg-gradient-to-r from-blue-700 via-blue-800 to-blue-900 relative">
            <img src="{{ asset('images/404139637_906793541070493_6611027920097910057_n.jpg') }}" alt="Hero" class="absolute inset-0 object-cover w-full h-full" />


            <div class="container mx-auto px-4 relative">
                <div class="flex flex-col items-center justify-center text-center">
                    <h1 class="text-5xl md:text-6xl font-bold text-white tracking-tight">
                        APIIT<span class="text-blue-300"> News</span>
                    </h1>
                    <p class="mt-4 text-lg md:text-xl text-blue-100">
                        Explore the latest updates and insights at APIIT.
                    </p>
                </div>
            </div>
        </div>
    @endsection



    <div class="mb-10 w-full">
        <div class="mb-16">
            <h2 class="mt-16 mb-5 text-3xl font-bold text-blue-500 text-center">Featured Events</h2>
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

        <h2 class="mt-16 mb-5 text-3xl font-bold text-blue-500 text-center">Latest Events</h2>
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

<x-app-layout>
    @section('hero')
        <div class="w-full py-32 bg-gradient-to-r from-blue-700 via-blue-800 to-blue-900 relative">
            <img src="https://scontent.fcmb11-1.fna.fbcdn.net/v/t39.30808-6/404114002_905654354517745_9160902799627901410_n.jpg?_nc_cat=104&ccb=1-7&_nc_sid=5f2048&_nc_ohc=zJATyecPv9AAb6dvhei&_nc_zt=23&_nc_ht=scontent.fcmb11-1.fna&oh=00_AfA_JGg8Ikqz1yhjWqntL1eIzpKJc0AirlQ8sTTRvkMOkQ&oe=6629C92D" class="absolute inset-0 object-cover w-full h-full opacity-50" alt="APIIT Background">
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

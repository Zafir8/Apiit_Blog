<x-app-layout>

    @section('hero')
        <div class="w-full py-32 bg-gradient-to-r from-blue-800 to-blue-900">
            <div class="container mx-auto px-4">
                <div class="flex flex-col items-center justify-center text-center">
                    <h1 class="text-4xl md:text-5xl font-extrabold text-white">
                        APIIT<span class="text-blue-300"> Research</span>
                    </h1>
                    <p class="text-xl text-blue-200 mt-3">
                        Your source for all things research at APIIT.
                    </p>
                    <a class="mt-6 bg-blue-300 hover:bg-blue-200 text-blue-900 font-semibold py-3 px-6 rounded shadow"
                       href="http://127.0.0.1:8000/blog" >Discover More</a>
                </div>
            </div>
        </div>

    @endsection

    <div class="mb-10 w-full">
        <div class="mb-16">
            <h2 class="mt-16 mb-5 text-3xl text-yellow-500 font-bold">Featured Research</h2>
            <div class="w-full">
                <div class="grid grid-cols-3 gap-10 w-full">
                    @foreach ($featuredResearch as $research)
                        <div class="md:col-span-1 col-span-3">
                            <x-research.research-card :research="$research" />
                        </div>
                    @endforeach
                </div>
            </div>
            <a class="mt-10 block text-center text-lg text-yellow-500 font-semibold"
               href="http://127.0.0.1:8000/blog">More
                Research</a>
        </div>
        <hr>

        <h2 class="mt-16 mb-5 text-3xl text-yellow-500 font-bold">Latest Research</h2>
        <div class="w-full mb-5">
            <div class="grid grid-cols-3 gap-10 w-full">
                @foreach ($latestResearch as $research)
                    <div class="md:col-span-1 col-span-3">
                        <x-research.research-card :research="$research" />
                    </div>
                @endforeach
            </div>
        </div>
        <a class="mt-10 block text-center text-lg text-yellow-500 font-semibold" href="http://127.0.0.1:8000/blog">More
            Research</a>

</div>

</x-app-layout>

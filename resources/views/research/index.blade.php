<x-app-layout>
    <!-- Hero Section with Background Image -->
    @section('hero')
        <div class="w-full py-32 relative">
            <!-- Background image -->
            <img src="https://media.istockphoto.com/id/1344939844/photo/hand-holding-drawing-virtual-lightbulb-with-brain-on-bokeh-background-for-creative-and-smart.jpg?s=612x612&w=0&k=20&c=2GLUy6eqCSr0NFRO8CHm8_PUMy9Qc8ryqcsRoe0DEYM=" class="absolute inset-0 w-full h-full object-cover" alt="APIIT Research Background">
            <div class="container mx-auto px-4 relative">
                <div class="flex flex-col items-center justify-center text-center">
                    <h1 class="text-4xl md:text-6xl font-extrabold text-white">
                        APIIT<span class="text-blue-400"> Research</span>
                    </h1>
                    <p class="text-xl text-white mt-3">
                        Explore cutting-edge research at APIIT.
                    </p>
                </div>
            </div>
        </div>
    @endsection

    <!-- Main Content -->
    <div class="mb-10 w-full">
        <!-- Featured Research Section -->
        <section class="mb-16 px-4 md:px-12">
            <h2 class="text-center mt-16 mb-5 text-3xl text-blue-800 font-bold">Featured Research</h2>
            <div class="grid md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-6">
                @foreach ($featuredResearch as $research)
                    <div>
                        <x-research.research-card :research="$research" />
                    </div>
                @endforeach
            </div>
            <div class="text-center mt-10">
                <a href="http://127.0.0.1:8000/blog" class="text-lg text-blue-800 font-semibold hover:underline">
                    More Research
                </a>
            </div>
        </section>

        <!-- Latest Research Section -->
        <hr class="mx-4 md:mx-12">
        <section class="px-4 md:px-12">
            <h2 class="text-center mt-16 mb-5 text-3xl text-blue-800 font-bold">Latest Research</h2>
            <div class="grid md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-6">
                @foreach ($latestResearch as $research)
                    <div>
                        <x-research.research-card :research="$research" />
                    </div>
                @endforeach
            </div>
        </section>
    </div>
</x-app-layout>


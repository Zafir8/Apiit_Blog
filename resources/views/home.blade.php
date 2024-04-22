<x-app-layout>

    @section('hero')
        <div class="relative h-screen flex items-center justify-center bg-cover bg-center" style="background-image: url('{{ asset('images/PHOTO-APIIT-01.jpg') }}');">
            <div class="absolute inset-0 bg-black bg-opacity-40"></div>
            <div class="relative z-10 text-center">
                <h1 class="text-white font-bold text-5xl md:text-7xl animate-pulse">Welcome to Connect Space apiit<</h1>
            </div>
        </div>
    @endsection

    <div class="mb-10 w-full">
        <div class="mb-16">
            <h2 class="mt-16 mb-5 text-3xl font-bold text-white bg-gradient-to-r from-blue-900 to-blue-300 p-2 rounded-lg shadow-lg">Featured Blogs</h2>
            <div class="w-full">
                <div class="grid grid-cols-3 gap-10 w-full">
                    @foreach ($featuredPosts as $post)
                        <x-posts.post-card :post="$post" class="md:col-span-1 col-span-3" />
                    @endforeach
                </div>
            </div>
        </div>
        <hr class="border-blue-300">

        <h2 class="mt-16 mb-5 text-3xl font-bold text-white bg-gradient-to-r from-blue-900 to-blue-300 p-2 rounded-lg shadow-lg">Latest Blogs</h2>
        <div class="w-full mb-5">
            <div class="grid grid-cols-3 gap-10 w-full">
                @foreach ($latestPosts as $post)
                    <x-posts.post-card :post="$post" class="md:col-span-1 col-span-3" />
                @endforeach
            </div>
        </div>
        <a class="mt-10 block text-center text-lg font-semibold text-white bg-gradient-to-r from-blue-900 to-blue-300 p-2 rounded-lg shadow-lg" href="{{ route('posts.index') }}">More Posts</a>
    </div>

</x-app-layout>

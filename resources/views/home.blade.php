<x-app-layout>

@section('hero')
        <div class="h-screen flex items-center justify-center bg-cover bg-center" style="background-image: url('https://images.pexels.com/photos/3807755/pexels-photo-3807755.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2');">
            <h1 class="text-white font-bold text-5xl">Our blogs</h1>
        </div>
    @endsection

    @section('about')
        <div class="container mx-auto px-4 py-10">
            <h2 class="text-3xl text-blue-950 font-bold mb-6">About Us</h2>
            <div class="flex flex-col md:flex-row items-center gap-8">
                <!-- Image Container -->
                <div class="flex-1">
                    <img src="{{asset("images/apiit.jpg")}}" alt="About Us" class="rounded-lg shadow-md w-full h-auto object-cover max-w-md mx-auto md:mx-0">
                </div>

                <!-- Text Container -->
                <div class="flex-1 text-lg text-gray-700">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
            </div>
        </div>
    @endsection



    <div class="mb-10 w-full">
        <div class="mb-16">
            <h2 class="mt-16 mb-5 text-3xl text-blue-950 font-bold">Featured Posts</h2>
            <div class="w-full">
                <div class="grid grid-cols-3 gap-10 w-full">
                    @foreach ($featuredPosts as $post)
                        <x-posts.post-card :post="$post" class="md:col-span-1 col-span-3" />
                    @endforeach
                </div>
            </div>
            <a class="mt-10 block text-center text-lg text-blue-950 font-semibold"
               href="http://127.0.0.1:8000/blog">More
                Posts</a>
        </div>
        <hr>

        <h2 class="mt-16 mb-5 text-3xl text-blue-950 font-bold">Latest Posts</h2>
        <div class="w-full mb-5">
            <div class="grid grid-cols-3 gap-10 w-full">
                @foreach ($latestPosts as $post)
                    <x-posts.post-card :post="$post" class="md:col-span-1 col-span-3" />
                @endforeach
            </div>
        </div>
        <a class="mt-10 block text-center text-lg text-blue-950 font-semibold" href="http://127.0.0.1:8000/blog">More
            Posts</a>
    </div>
</x-app-layout>

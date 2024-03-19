<x-app-layout>

@section('hero')
        <div class="h-screen flex items-center justify-center bg-cover bg-center" style="background-image: url('https://images.pexels.com/photos/3807755/pexels-photo-3807755.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2');">
            <h1 class="text-white font-bold text-5xl">Our blogs</h1>
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

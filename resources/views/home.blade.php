<x-app-layout>

    {{-- @section('hero')
            <div class="h-screen flex items-center justify-center bg-cover bg-center" style="background-image: url('https://images.pexels.com/photos/3807755/pexels-photo-3807755.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2');">
                <h1 class="text-white font-bold text-5xl">Our blogs</h1>
            </div>
        @endsection --}}

        {{-- @section('hero')
    <div class="h-screen flex items-center justify-center bg-cover bg-center" style="background-image: url('{{ asset("images/PHOTO-APIIT-01.jpg") }}');">
        <h1 class="text-white font-bold text-5xl">Our blogs</h1>
    </div>
@endsection --}}

 {{-- @section('hero')
    <div class="relative h-screen flex items-center justify-center overflow-hidden">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <img class="absolute inset-0 object-cover w-full h-full" src="{{ asset('images/PHOTO-APIIT-01.jpg') }}" alt="Background Image">
            <div class="absolute inset-0 bg-black opacity-40"></div> <!-- Overlay -->
        </div>
        <!-- Content -->
        <div class="relative z-10 text-center text-white">
            <h1 class="text-5xl font-bold tracking-wide md:text-7xl">Welcome to Our Blogs</h1>
            <p class="mt-4 text-lg md:text-xl">Discover a world of knowledge and inspiration</p>
        </div>
    </div>
@endsection   --}}


@section('hero')
    <style>
        .hero-container {
            position: relative;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            cursor: pointer; /* Add cursor pointer to indicate clickable */
        }

        .overlay {
            opacity: 0;
            transition: opacity 0.5s;
        }

        .background-image {
            opacity: 1;
            transition: opacity 0.5s;
        }

        .text-content {
            opacity: 0;
            animation: fadeIn 1s forwards, slideInUp 1s forwards; /* Apply multiple animations */
            animation-delay: 0.5s; /* Delay the animations */
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes slideInUp {
            from {
                transform: translateY(20px); /* Slide up animation */
            }
            to {
                transform: translateY(0);
            }
        }
    </style>

    <div class="hero-container" id="hero-container">
        <!-- Background Image -->
        <div class="absolute inset-0 w-full h-full">
            <img class="absolute inset-0 object-cover w-full h-full background-image" src="{{ asset('images/PHOTO-APIIT-01.jpg') }}" alt="Background Image">
            <div class="absolute inset-0 z-0">
                <img class="absolute inset-0 object-cover w-full h-full" src="{{ asset('images/PHOTO-APIIT-01.jpg') }}" alt="Background Image">
                <div class="absolute inset-0 bg-black opacity-40"></div> <!-- Overlay -->
            </div>
            {{-- <img class="absolute inset-0 object-cover w-full h-full background-image hide" src="{{ asset('images/apiit.jpg') }}" alt="Background Image"> --}}
        </div>
        <!-- Overlay -->
        <div class="absolute inset-0 bg-black overlay"></div>
        <!-- Content -->
        <div class="relative z-10 text-center text-white text-content">
            <h1 class="text-5xl font-bold tracking-wide md:text-7xl">Welcome to Our Blogs</h1>
            <p class="mt-4 text-lg md:text-xl">Discover a world of knowledge and inspiration</p>
        </div>
    </div>

    <script>
        document.getElementById('hero-container').addEventListener('click', function() {
            var backgroundImage1 = document.querySelector('.background-image:nth-child(1)');
            var backgroundImage2 = document.querySelector('.background-image:nth-child(2)');
            var overlay = document.querySelector('.overlay');

            // Toggle opacity between the two images
            backgroundImage1.classList.toggle('hide');
            backgroundImage2.classList.toggle('hide');

            // Toggle overlay opacity
            overlay.classList.toggle('opacity-0');
        });
    </script>
@endsection




@section('about')
    <div class="container mx-auto px-4 py-10">
        <h2 class="text-3xl text-blue-950 font-bold mb-6">About Us</h2>
        <div class="flex flex-col md:flex-row items-center gap-8">
            <!-- Image Container with Animation -->
            <div class="flex-1 relative overflow-hidden animate__animated animate__fadeInLeft">
                <img src="{{ asset('images/apiit.jpg') }}" alt="About Us" class="rounded-lg shadow-md w-full h-auto object-cover max-w-md mx-auto md:mx-0">
                <div class="absolute inset-0 bg-blue-900 opacity-50 hover:opacity-75 transition duration-300"></div>
            </div>

            <!-- Text Container with Animation -->
            <div class="flex-1 text-lg text-gray-700 animate__animated animate__fadeInRight">
                <p class="mb-4">The Asia Pacific Institute of Information Technology (APIIT) Sri Lanka is a leading private higher education institution in Sri Lanka. We offer internationally recognized degrees in Business, Computing/IT, and Law.</p>
                <p class="mb-4">Our mission is to provide quality education and develop professionals who can contribute to the global industry with confidence and competence.</p>
                <p>We are committed to fostering innovation, creativity, and excellence in our students.</p>
            </div>
        </div>
    </div>
@endsection

{{-- @section('hero')
    <div class="relative h-screen flex items-center justify-center overflow-hidden">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0 transition-all duration-500">
            <img class="absolute inset-0 object-cover w-full h-full" src="{{ asset('images/PHOTO-APIIT-01.jpg') }}" alt="Background Image">
            <img class="absolute inset-0 object-cover w-full h-full opacity-0 hover:opacity-100 transition-all duration-500" src="{{ asset('images/apiit.jpg') }}" alt="Alternate Background Image">
            <div class="absolute inset-0 bg-black opacity-40"></div> <!-- Overlay -->
        </div>
        <!-- Content -->
        <div class="relative z-10 text-center text-white">
            <h1 class="text-5xl font-bold tracking-wide md:text-7xl">Welcome to Our Blogs</h1>
            <p class="mt-4 text-lg md:text-xl">Discover a world of knowledge and inspiration</p>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.relative').hover(function() {
                $('.absolute img').toggleClass('opacity-0 opacity-100');
            });
        });
    </script>
@endpush




    
        

    
        {{-- doesnt work --}}


        {{-- @section('hero')
        <style>
            .hero-container {
                position: relative;
                height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                overflow: hidden;
                cursor: pointer; /* Add cursor pointer to indicate clickable */
            }
    
            .overlay {
                opacity: 0;
                transition: opacity 0.5s;
            }
    
            .background-image {
                opacity: 1;
                transition: opacity 0.5s;
            }
    
            .hide {
                display: none;
            }
        </style>
    
        <div class="hero-container" id="hero-container">
            <!-- Background Image -->
            <div class="absolute inset-0 w-full h-full">
                <img class="absolute inset-0 object-cover w-full h-full background-image" src="{{ asset('images/PHOTO-APIIT-01.jpg') }}" alt="Background Image 1">
                <img class="absolute inset-0 object-cover w-full h-full background-image hide" src="{{ asset('images/apiit.jpg') }}" alt="Background Image 2">
            </div>
            <!-- Overlay -->
            <div class="absolute inset-0 bg-black overlay"></div>
            <!-- Content -->
            <div class="relative z-10 text-center text-white">
                <h1 class="text-5xl font-bold tracking-wide md:text-7xl">Welcome to Our Blogs</h1>
                <p class="mt-4 text-lg md:text-xl">Discover a world of knowledge and inspiration</p>
            </div>
        </div>
    
        <script>
            document.getElementById('hero-container').addEventListener('click', function() {
                var backgroundImage1 = document.querySelector('.background-image:nth-child(1)');
                var backgroundImage2 = document.querySelector('.background-image:nth-child(2)');
                var overlay = document.querySelector('.overlay');
    
                // Check if the first background image is currently visible
                if (!backgroundImage1.classList.contains('hide')) {
                    // If the first image is visible, hide it and show the second image
                    backgroundImage1.classList.add('hide');
                    backgroundImage2.classList.remove('hide');
                } else {
                    // If the second image is visible, hide it and show the first image
                    backgroundImage1.classList.remove('hide');
                    backgroundImage2.classList.add('hide');
                }
    
                // Toggle overlay opacity
                overlay.classList.toggle('opacity-0');
            });
        </script>
    @endsection --}}
    
        {{-- <div class="mb-10 w-full">
            <div class="mb-16">
                <h2 class="mt-16 mb-5 text-3xl text-blue-950 font-bold">Featured Blogs</h2>
                <div class="w-full">
                    <div class="grid grid-cols-3 gap-10 w-full">
                        @foreach ($featuredPosts as $post)
                            <x-posts.post-card :post="$post" class="md:col-span-1 col-span-3" />
                        @endforeach
                    </div>
                </div>
            </div>
            <hr>
    
            <h2 class="mt-16 mb-5 text-3xl text-blue-950 font-bold">Latest Blogs</h2>
            <div class="w-full mb-5">
                <div class="grid grid-cols-3 gap-10 w-full">
                    @foreach ($latestPosts as $post)
                        <x-posts.post-card :post="$post" class="md:col-span-1 col-span-3" />
                    @endforeach
                </div>
            </div>
            <a class="mt-10 block text-center text-lg text-blue-950 font-semibold" href="{{ route('posts.index') }}">More
                Posts</a>
        </div> --}}
    

        {{-- <div class="mb-10 w-full">
            <div class="mb-16">
                <h2 class="mt-16 mb-5 text-3xl text-blue-950 font-bold animate__animated animate__fadeInUp">Featured Blogs</h2>
                <div class="w-full">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                        @foreach ($featuredPosts as $post)
                            <x-posts.post-card :post="$post" class="col-span-1 animate__animated animate__fadeInLeft" />
                        @endforeach
                    </div>
                </div>
            </div>
            <hr>
        
            <h2 class="mt-16 mb-5 text-3xl text-blue-950 font-bold animate__animated animate__fadeInUp">Latest Blogs</h2>
            <div class="w-full mb-5">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                    @foreach ($latestPosts as $post)
                        <x-posts.post-card :post="$post" class="col-span-1 animate__animated animate__fadeInRight" />
                    @endforeach
                </div>
            </div>
            <a class="mt-10 block text-center text-lg text-blue-950 font-semibold animate__animated animate__fadeInUp" href="{{ route('posts.index') }}">More Posts</a>
        </div>
    
    </x-app-layout> --}}



    {{-- <x-app-layout> --}}
        <div class="mb-10 w-full">
            <div class="mb-16">
                <h2 class="mt-16 mb-5 text-3xl font-bold text-white bg-gradient-to-r from-blue-900 to-blue-300 p-2 rounded-lg shadow-lg animate__animated animate__fadeInUp">Featured Blogs</h2>
                <div class="w-full">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                        @foreach ($featuredPosts as $post)
                            <x-posts.post-card :post="$post" class="col-span-1 animate__animated animate__fadeInLeft" />
                        @endforeach
                    </div>
                </div>
            </div>
            <hr class="border-blue-300">
            
            <div class="mb-16">
                <h2 class="mt-16 mb-5 text-3xl font-bold text-white bg-gradient-to-r from-blue-900 to-blue-300 p-2 rounded-lg shadow-lg animate__animated animate__fadeInUp">Latest Blogs</h2>
                <div class="w-full mb-5">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                        @foreach ($latestPosts as $post)
                            <x-posts.post-card :post="$post" class="col-span-1 animate__animated animate__fadeInRight" />
                        @endforeach
                    </div>
                </div>
            </div>
            <a class="mt-10 block text-center text-lg font-semibold text-white bg-gradient-to-r from-blue-900 to-blue-300 p-2 rounded-lg shadow-lg animate__animated animate__fadeInUp" href="{{ route('posts.index') }}">More Posts</a>
        </div>
    </x-app-layout>
    
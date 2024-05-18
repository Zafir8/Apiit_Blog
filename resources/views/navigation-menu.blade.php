<div>
    <header x-data="{ open: false }" class="bg-white shadow-sm relative z-30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-6 md:justify-start md:space-x-10">
                <div class="flex justify-start lg:w-0 lg:flex-1">
                    <a href="{{ route('home') }}">
                        <img src="https://apiit.lk/wp-content/uploads/2023/05/apiit-logo_Courses.png" alt="Logo" class="h-20 w-auto">
                    </a>
                </div>

                <div class="-mr-2 -my-2 md:hidden">
                    <button @click="open = !open" type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
                        <span class="sr-only">Open menu</span>
                        <!-- Icon for mobile menu button -->
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                    </button>
                </div>

                <!-- Mobile Menu -->
                <div x-show="open" @click.away="open = false" class="absolute top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden z-50">
                    <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white divide-y-2 divide-gray-50">
                        <div class="pt-5 pb-6 px-5">
                            <div class="flex items-center justify-between">
                                <div>
                                    <img class="h-8 w-auto" src="https://apiit.lk/wp-content/uploads/2023/05/apiit-logo_Courses.png" alt="APIIT Logo">
                                </div>
                                <div class="-mr-2">
                                    <button @click="open = false" type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
                                        <span class="sr-only">Close menu</span>
                                        <!-- Close icon -->
                                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="mt-6">
                                <nav class="grid gap-y-8">
                                    <a href="{{ route('home') }}" class="text-base font-medium text-black hover:text-gray-900">Home</a>
                                    <a href="{{ route('posts.index') }}" class="text-base font-medium text-black hover:text-gray-900">Blogs</a>
                                    <a href="{{ route('events.index') }}" class="text-base font-medium text-black hover:text-gray-900">Events</a>
                                    @auth
                                        @if(auth()->user()->canAccessPanel(new \Filament\Panel()))
                                            <a href="/admin" class="text-base font-medium text-black hover:text-gray-900">Dashboard</a>
                                        @endif
                                        <a href="{{ route('profile.show') }}" class="text-base font-medium text-black hover:text-gray-900">Profile</a>
                                        <span class="text-base font-medium text-black">Hello, {{ Auth::user()->name }}</span>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="text-base font-medium text-black hover:text-gray-900">Logout</button>
                                        </form>
                                    @endauth
                                    @guest
                                        <a href="{{ route('login') }}" class="text-base font-medium text-black hover:text-gray-900">Login</a>
                                        <a href="{{ route('register') }}" class="text-base font-medium text-black hover:text-gray-900">Register</a>
                                    @endguest
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center justify-end md:flex-1 lg:w-0 space-x-10">
                    <a href="{{ route('home') }}" class="text-base font-medium text-black hover:text-red-500">Home</a>
                    <a href="{{ route('posts.index') }}" class="text-base font-medium text-black hover:text-red-500">Blogs</a>
                    <a href="{{ route('events.index') }}" class="text-base font-medium text-black hover:text-red-500">Events</a>
                    @auth
                        @if(auth()->user()->canAccessPanel(new \Filament\Panel()))
                            <a href="/admin" class="text-base font-medium text-black hover:text-red-500">Compose</a>
                        @endif
                        <!-- Desktop Profile Dropdown -->
                        <div x-data="{ profileOpen: false }" class="relative">
                            <button @click="profileOpen = !profileOpen" type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
                                <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                <span class="ml-2 text-black">{{ Auth::user()->name }}</span>
                            </button>
                            <div x-show="profileOpen" @click.away="profileOpen = false" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 divide-y-2 divide-gray-50">
                                <div class="py-1">
                                    <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-sm text-black hover:bg-gray-50">Profile</a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-black hover:bg-gray-50">Logout</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endauth
                    @guest
                        <a href="{{ route('login') }}" class="text-base font-medium text-black hover:text-red-500">Login</a>
                        <a href="{{ route('register') }}" class="text-base font-medium text-black hover:text-red-500">Register</a>
                    @endguest
                </div>
            </div>
        </div>
    </header>
</div>


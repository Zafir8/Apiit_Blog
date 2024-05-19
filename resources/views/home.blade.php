<x-app-layout>
    @section('hero')
        <div class="flex items-center justify-center bg-cover bg-center md:bg-top lg:bg-center min-h-screen"
             style="background-image: url('{{ asset('images/DALL·E 2024-05-18 14.59.42 - A professional digital poster featuring a young woman in graduation attire. She is Caucasian, with light brown hair and a warm smile, wearing a black .webp') }}');">
        </div>
    @endsection



    <div class="mb-10 w-full">
        <div class="mb-16">
            <h2 class="mt-16 mb-5 text-3xl font-bold text-gray-900">Featured Blogs</h2>
            <div class="w-full">
                <div class="grid grid-cols-3 gap-10 w-full">
                    @foreach ($featuredPosts as $post)
                        <x-posts.post-card :post="$post" class="md:col-span-1 col-span-3" />
                    @endforeach
                </div>
            </div>
        </div>


        <hr class="border-gray-300">

        <h2 class="mt-16 mb-5 text-3xl font-bold text-gray-900">Latest blogs</h2>
        <div class="w-full mb-5">
            <div class="grid grid-cols-3 gap-10 w-full">
                @foreach ($latestPosts as $post)
                    <x-posts.post-card :post="$post" class="md:col-span-1 col-span-3" />
                @endforeach
            </div>
        </div>
    </div>

        @section('blogger')
            <div class="bg-black">
                <section id="features"
                         class="relative block px-6 py-10 md:py-20 md:px-10 border-t border-b border-neutral-900 bg-neutral-900/30">

                    <div class="relative mx-auto max-w-5xl text-center">
            <span class="text-gray-400 my-3 flex items-center justify-center font-medium uppercase tracking-wider">
                Become a blogger at
            </span>
                        <h2 class="block w-full bg-gradient-to-b from-white to-gray-400 bg-clip-text font-bold text-transparent text-3xl sm:text-4xl">
                            CONNECT SPACE
                        </h2>
                        <p class="mx-auto my-4 w-full max-w-xl bg-transparent text-center font-medium leading-relaxed tracking-wide text-gray-400">
                            Are you passionate about sharing your knowledge, experiences, and perspectives with the world? Do you have a unique voice and valuable insights that you believe others would benefit from? If so, then becoming a blogger might just be the perfect avenue for you to explore!
                        </p>
                    </div>

                    <div class="relative mx-auto max-w-7xl z-10 grid grid-cols-1 gap-10 pt-14 sm:grid-cols-2 lg:grid-cols-3 items-stretch">
                        <!-- Card with hover effect and equal height -->
                        <div class="transform transition duration-300 ease-in-out hover:scale-105 hover:shadow-xl flex flex-col">
                            <div class="rounded-md border border-neutral-800 bg-neutral-900/50 p-8 text-center shadow flex-grow">
                                <div class="button-text mx-auto flex h-12 w-12 items-center justify-center rounded-md border"
                                     style="background-image: linear-gradient(rgb(184,53,58) 0%,rgb(163,20,32) 100%); border-color: rgb(218,11,46);">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-color-swatch" width="24"
                                         height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                         stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M19 3h-4a2 2 0 0 0 -2 2v12a4 4 0 0 0 8 0v-12a2 2 0 0 0 -2 -2"></path>
                                        <path d="M13 7.35l-2 -2a2 2 0 0 0 -2.828 0l-2.828 2.828a2 2 0 0 0 0 2.828l9 9"></path>
                                        <path d="M7.3 13h-2.3a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h12"></path>
                                        <line x1="17" y1="17" x2="17" y2="17.01"></line>
                                    </svg>
                                </div>
                                <h3 class="mt-6 text-gray-400">Eligibility</h3>
                                <p class="my-4 mb-0 font-normal leading-relaxed tracking-wide text-gray-400">
                                    Only individuals who are currently affiliated with APIIT as staff, lecturers, students, or alumni are eligible to become a blogger.
                                </p>
                            </div>
                        </div>

                        <!-- Card with hover effect and equal height -->
                        <div class="transform transition duration-300 ease-in-out hover:scale-105 hover:shadow-xl flex flex-col">
                            <div class="rounded-md border border-neutral-800 bg-neutral-900/50 p-8 text-center shadow flex-grow">
                                <div class="button-text mx-auto flex h-12 w-12 items-center justify-center rounded-md border"
                                     style="background-image: linear-gradient(rgb(184, 33, 58) 10%, rgb(163, 20, 32) 10%); border-color: rgb(218, 11, 46);">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bolt" width="24"
                                         height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                         stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <polyline points="13 3 13 10 19 10 11 21 11 14 5 14 13 3"></polyline>
                                    </svg>
                                </div>
                                <h3 class="mt-6 text-gray-400">Opportunity Awaits</h3>
                                <p class="my-4 mb-0 font-normal leading-relaxed tracking-wide text-gray-400">
                                    Join a vibrant community of bloggers and readers who share your interests. Engage in discussions, make new friends, and build a network.
                                </p>
                            </div>
                        </div>

                        <!-- Card with hover effect and equal height -->
                        <div class="transform transition duration-300 ease-in-out hover:scale-105 hover:shadow-xl flex flex-col">
                            <div class="rounded-md border border-neutral-800 bg-neutral-900/50 p-8 text-center shadow flex-grow">
                                <div class="button-text mx-auto flex h-12 w-12 items-center justify-center rounded-md border"
                                     style="background-image: linear-gradient(rgb(184, 33, 58) 0%, rgb(163, 20, 32) 100%); border-color: rgb(218, 11, 46);">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-tools" width="24"
                                         height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                         stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M3 21h4l13 -13a1.5 1.5 0 0 0 -4 -4l-13 13v4"></path>
                                        <line x1="14.5" y1="5.5" x2="18.5" y2="9.5"></line>
                                        <polyline points="12 8 7 3 3 7 8 12"></polyline>
                                        <line x1="7" y1="8" x2="5.5" y2="9.5"></line>
                                        <polyline points="16 12 21 17 17 21 12 16"></polyline>
                                        <line x1="16" y1="17" x2="14.5" y2="18.5"></line>
                                    </svg>
                                </div>
                                <h3 class="mt-6 text-gray-400">How to become a blogger?</h3>
                                <p class="my-4 mb-0 font-normal leading-relaxed tracking-wide text-gray-400">
                                    Fill the form provided at the bottom of the page and get verified as a blogger.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="absolute bottom-0 left-0 z-0 h-1/3 w-full border-b"
                         style="background-image: linear-gradient(to right top, rgba(79, 70, 229, 0.2) 0%, transparent 50%, transparent 100%); border-color: rgba(92, 79, 240, 0.2);">
                    </div>
                    <div class="absolute bottom-0 right-0 z-0 h-1/3 w-full"
                         style="background-image: linear-gradient(to left top, rgba(220, 38, 38, 0.2) 0%, transparent 50%, transparent 100%); border-color: rgba(92, 79, 240, 0.2);">
                    </div>
                </section>
            </div>
        @endsection

    @section('sliders')

<div class="container my-24 mx-auto md:px-6">
  <!-- Section: Design Block -->
  <section class="mb-32">
    <div class="flex flex-wrap">
      <div class="mb-12 w-full shrink-0 grow-0 basis-auto lg:mb-0 lg:w-5/12">
        <div class="flex lg:py-12">
          <img src="https://lmd.lk/wp-content/uploads/2020/11/IMAGE-APIIT-Staffordshire.jpg"
            class="z-[10] w-full rounded-lg shadow-lg dark:shadow-black/20 lg:ml-[50px]" alt="image" />
        </div>
      </div>

      <div class="w-full shrink-0 grow-0 basis-auto lg:w-7/12">
        <div
          class="flex h-full items-center rounded-lg bg-black p-6 text-center text-white lg:pl-12 lg:text-left">
          <div class="lg:pl-12">
            <h2 class="mb-8 text-3xl font-bold">  CONNECT SPACE</h2>
            <p class="mb-8 pb-2 lg:pb-0">
                Turning your passion of blogging into a platform

            </p>

            <div class="mx-auto mb-8 flex flex-col md:flex-row md:justify-around xl:justify-start">
              <p class="mx-auto mb-4 flex items-center md:mx-0 md:mb-2 lg:mb-0 xl:mr-20">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                  stroke="currentColor" class="mr-2 h-5 w-5">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Network
              </p>

              <p class="mx-auto mb-4 flex items-center md:mx-0 md:mb-2 lg:mb-0 xl:mr-20">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                  stroke="currentColor" class="mr-2 h-5 w-5">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Innovation
              </p>

              <p class="mx-auto mb-2 flex items-center md:mx-0 lg:mb-0">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                  stroke="currentColor" class="mr-2 h-5 w-5">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Discovery
              </p>
            </div>

            <p>

Connect Space is a digital hub for collaboration, innovation, and networking, offering a diverse array of categories to keep you informed and engaged.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

 @endsection

    @section('cards')
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap items-center justify-center w-full text-center">

                <!-- Focus Room Card -->
                <div class="w-full p-4 md:w-1/2 lg:w-1/3">
                    <div class="flex flex-col rounded-lg border-2 border-black bg-black">
                        <div class="py-5 text-black bg-white rounded-t-lg">
                            <p class="text-2xl font-bold">FOCUS ROOM</p>
                        </div>
                        <div class="py-5 bg-black text-white rounded-b-lg">
                            <p>Require assistance from Alumni? </p>
                            <p>Alumni is there to help you!</p>
                            <p>Fill out this form! </p>
                            <br>
                            <a href="https://forms.office.com/Pages/ResponsePage.aspx?id=vnsShoAUrkevNR_ModMj5MRdGLgV-01LkdjXpXD5ZmhUNExBVU8zNzdOVkVPSzJMRkZSTURCQTNDNi4u" class="mt-4 px-4 py-2 uppercase rounded bg-white text-black font-medium hover:bg-red-500 hover:text-white">View Form</a>
                        </div>
                    </div>
                </div>

                <!-- Blogger Card -->
                <div class="w-full p-4 md:w-1/2 lg:w-1/3">
                    <div class="flex flex-col rounded-lg border-2 border-black bg-black">
                        <div class="py-5 bg-black text-white rounded-t-lg">
                            <h3 class="text-xl">Become a</h3>
                            <p class="text-3xl font-bold">BLOGGER</p>
                        </div>
                        <div class="py-5 bg-black text-white rounded-b-lg">
                            <p>Start blogging at connect space</p>
                            <p>Fill the form to get entitled as a</p>
                            <p>Blogger</p>
                            <br>
                            <a href="https://forms.office.com/Pages/ResponsePage.aspx?id=vnsShoAUrkevNR_ModMj5MRdGLgV-01LkdjXpXD5ZmhUQlU2SEVVQjVGVE42TEM5R1kzMFFJVEJZVy4u" class="mt-4 px-4 py-2 uppercase rounded bg-white text-black font-medium hover:bg-red-500 hover:text-white">View Form</a>
                        </div>
                    </div>
                </div>

                <!-- Events Card -->
                <div class="w-full p-4 md:w-1/2 lg:w-1/3">
                    <div class="flex flex-col rounded-lg border-2 border-black bg-black">
                        <div class="py-5 text-black bg-white rounded-t-lg">
                            <p class="text-2xl font-bold">EVENTS</p>
                        </div>
                        <div class="py-5 bg-black text-white rounded-b-lg">
                            <p>Visit our events page!</p>
                            <p>To get updated on the latest events</p>
                            <p>at APIIT</p>
                            <br>
                            <a href="{{ route('events.index') }}" class="mt-4 px-4 py-2 uppercase rounded bg-white text-black font-medium hover:bg-red-500 hover:text-white">View Events</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endsection


</x-app-layout>

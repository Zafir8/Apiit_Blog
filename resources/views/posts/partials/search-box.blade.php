<div x-data="{ query: '' }" id="search-box" class="max-w-sm mx-auto">
    <h3 class="text-xl font-semibold text-gray-900 mb-4">Search</h3>
    <div class="relative">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-400">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/>
            </svg>
        </div>
        <input x-model="query"
               class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
               placeholder="Type to search..." type="text">
    </div>
    <button x-on:click="$dispatch('search', {search: query})"
            class="mt-3 w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full transition duration-200 ease-in-out shadow-lg focus:outline-none focus:shadow-outline">
        Search
    </button>
</div>

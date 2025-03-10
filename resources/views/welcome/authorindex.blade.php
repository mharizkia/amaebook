<x-layout>

    <form method="GET" action="{{ route('welcome.search') }}" class="max-w-md mx-auto my-3">   
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="query" id="default-search" name="query" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Author" required />
            <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Search</button>
        </div>
    </form>
    <div class="container mx-auto mt-8">
        <div class="bg-linear-to-b from-amber-950 to-black to-15% shadow-md rounded-lg p-6">
            <h1 class="text-center font-bold font-[Open-Sans] text-2xl text-white mb-4">Author</h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($authors as $author)
                    <div class="bg-gray-100 p-4 rounded-lg">
                        <a href="{{ route('welcome.authorshow', $author->id) }}">
                            <img src="{{ asset('images/' . $author->gambar) }}" alt="{{ $author->nama }}" class="rounded-lg shadow-lg w-full h-78 object-contain hover:scale-105">
                        </a>
                        <h3 class="text-lg font-semibold text-gray-800 mt-4">{{ $author->nama }}</h3>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <footer class="bg-black max-w-full mx-auto py-6 px-4 sm:px-6 lg:px-8 mt-4">
            <div class="text-center text-white">
                © 2025
            </div>
    </footer>
</x-layout>
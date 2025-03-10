<x-layout>
    <form method="GET" action="{{ route('welcome.search') }}" class="max-w-md mx-auto my-3">   
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="query" id="default-search" name="query" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Buku" required />
            <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
        </div>
    </form>
<div class="relative py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-linear-to-b from-amber-950 to-black to-15% overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h1 class="text-center font-bold font-[Open-Sans] text-2xl text-white">Genre</h1>
                @foreach($bukus as $genre => $books)
                    <div class="mb-8">
                        <h3 class="text-xl font-semibold mb-4 text-white">{{ $genre }}</h3>
                        <div class="overflow-x-auto">
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 min-w-full">
                                @foreach($books as $buku)
                                    <div class="relative bg-gray-100 p-4 rounded-lg group scale-90">
                                        <a href="{{ route('welcome.bukushow', $buku->id) }} " class="block relative">
                                            <img src="{{ asset('images/' . $buku->gambar) }}" alt="{{ $buku->judul }}" class="rounded-lg shadow-lg w-full h-full object-cover transition-transform transform group-hover:scale-105" title="{{ $buku->judul }}">
                                            <div class="absolute inset-0 bg-black/70 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 hover:scale-105">
                                                <p class="text-white text-lg font-semibold text-center">{{ $buku->judul }} by {{ $buku->author->nama }} </p>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
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
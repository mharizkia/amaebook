<x-layout>
    <x-slot name="header">
        <form method="GET" action="{{ route('welcome.search') }}" class="max-w-md mx-auto my-3">   
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="query" id="default-search" name="query" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Buku/Author" required />
                <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-amber-800 hover:bg-amber-900 focus:ring-4 focus:outline-none focus:ring-amber-400 font-medium rounded-lg text-sm px-4 py-2 dark:bg-amber-700 dark:hover:bg-amber-800 dark:focus:ring-amber-900">Search</button>
            </div>
        </form>
    </x-slot>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <h2 class="font-semibold text-xl text-black leading-tight pt-2 text-center">
                {{ __('Hasil Pencarian untuk: ') }} "{{ $query }}"
            </h2>
                <div class="p-6 bg-linear-to-b from-white to-amber-950 to-5% border-b-2 shadow-lg border-black">
                    
                    <h3 class="text-xl font-semibold mb-4 text-white">Buku</h3>
                    @if($bukus->isNotEmpty())
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                            @foreach($bukus as $buku)
                                <div class="bg-gray-100 p-4 rounded-lg shadow-lg">
                                    <a href="{{ route('welcome.bukushow', $buku->id) }}">
                                        <img src="{{ asset('images/' . $buku->gambar) }}" alt="{{ $buku->judul }}" class="rounded-lg shadow-lg w-full h-84 object-cover hover:scale-105">
                                        <h4 class="mt-4 text-center font-semibold">{{ $buku->judul }}</h4>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-center text-white">Tidak ada buku yang ditemukan.</p>
                    @endif

                    <h3 class="text-xl font-semibold mt-8 mb-4 text-white">Penulis</h3>
                    @if($authors->isNotEmpty())
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                            @foreach($authors as $author)
                                <div class="bg-gray-100 p-4 rounded-lg shadow-lg">
                                    <a href="{{ route('welcome.authorshow', $author->id) }}">
                                        <img src="{{ asset('images/' . $author->gambar) }}" alt="{{ $author->nama }}" class="rounded-lg shadow-lg w-full h-64 object-cover">
                                        <h4 class="mt-4 text-center font-semibold">{{ $author->nama }}</h4>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-center text-white">Tidak ada penulis yang ditemukan.</p>
                    @endif

                </div>
            </div>
        </div>
    </div>

    <footer class="bg-black max-w-full mx-auto py-6 px-4 sm:px-6 lg:px-8 mt-4">
        <div class="text-center text-white">
            © 2025
        </div>
    </footer>
</x-layout>
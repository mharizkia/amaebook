<x-layout>
    <x-slot name="header">
        <div class="grid grid-cols-2 gap-4 ">
            <h2 class="font-semibold text-xl text-black leading-tight pt-2">
                {{ __('Hasil Pencarian untuk: ') }} "{{ $query }}"
            </h2>
        </div>
    </x-slot>

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

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <!-- Hasil Pencarian Buku -->
                    <h3 class="text-xl font-semibold mb-4">Buku</h3>
                    @if($bukus->isNotEmpty())
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                            @foreach($bukus as $buku)
                                <div class="bg-gray-100 p-4 rounded-lg shadow-lg">
                                    <a href="{{ route('welcome.bukushow', $buku->id) }}">
                                        <img src="{{ asset('images/' . $buku->gambar) }}" alt="{{ $buku->judul }}" class="rounded-lg shadow-lg w-full h-64 object-cover">
                                        <h4 class="mt-4 text-center font-semibold">{{ $buku->judul }}</h4>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-center">Tidak ada buku yang ditemukan.</p>
                    @endif

                    <!-- Hasil Pencarian Penulis -->
                    <h3 class="text-xl font-semibold mt-8 mb-4">Penulis</h3>
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
                        <p class="text-center">Tidak ada penulis yang ditemukan.</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-layout>
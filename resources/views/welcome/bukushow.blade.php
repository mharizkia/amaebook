<x-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="flex">
                    <!-- Gambar Buku -->
                    <div class="w-1/3">
                        <img src="{{ asset('images/' . $buku->gambar) }}" alt="{{ $buku->judul }}" class="rounded-lg shadow-lg w-full h-full object-cover">
                    </div>

                    <!-- Detail Buku -->
                    <div class="w-2/3 pl-6">
                        <h3 class="text-2xl font-semibold mb-2">{{ $buku->judul }}</h3>
                        <p class="text-gray-700 mb-4">Genre: {{ $buku->genre }}</p>
                        <p class="text-gray-700 mb-4">Rilis: {{ $buku->rilis }}</p>
                        <p class="text-gray-700 mb-4">Harga: Rp {{ number_format($buku->harga, 0, ',', '.') }}</p>

                        <!-- Tampilkan Author -->
                        <p class="text-gray-700 mb-4">Author: 
                            <a href="{{ route('welcome.authorshow', $buku->author->id) }}" class="text-blue-600 hover:text-blue-800">
                                {{ $buku->author->nama }}
                            </a>
                        </p>

                        <p class="text-gray-700 mb-4">{{ $buku->sinopsis }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($genres->count() > 0)
        <div class="mt-10">
            <h4 class="text-xl font-semibold">Buku dengan Genre yang Sama: {{ $buku->genre }}</h4>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-4">
                @foreach($genres as $genre)
                    <div class="bg-gray-100 p-4 rounded-lg shadow-lg">
                        <a href="{{ route('welcome.bukushow', $genre->id) }}">
                            <img src="{{ asset('images/' . $genre->gambar) }}" alt="{{ $genre->judul }}" class="rounded-lg shadow-lg w-full h-64 object-cover transition transform hover:scale-105">
                            <h4 class="mt-4 text-center font-semibold">{{ $genre->judul }}</h4>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</x-app-layout>

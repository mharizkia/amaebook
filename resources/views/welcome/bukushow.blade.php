<x-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white text-center leading-tight">
            {{ __('Detail Buku') }}
        </h2>
    </x-slot>

    <div class="relative container mx-auto mt-9 ml-3">
        <div class="bg-gradient-to-l from-black from-70% via-amber-950 via-5% to-gray-200 to-5% shadow-md rounded-lg p-6 border-2">
            <div class="max-w-8xl mx-auto px-2 sm:px-6 lg:px-8"> 
                <h1 class="text-2xl font-bold mb-6 text-black w-auto max-w-72">{{ $buku->judul }}</h1>
            </div>
            <div class="flex flex-col md:flex-row">
                <div class="md:w-1/3">
                    <img src="{{ asset('images/' . $buku->gambar) }}" alt="{{ $buku->judul }}" class="shadow-lg ml-6 w-50 w-65 sm:object-contain border-2 border-white transition delay-100 duration-300 ease-in-out hover:scale-105">
                </div>
                <div class="md:w-2/3 mt-4 md:mt-0 text-white absolute top-8 right-2">
                    <p class="text-lg"><strong>Genre:</strong> {{ $buku->genre }}</p>
                    <p class="text-lg"><strong>Tanggal Rilis:</strong> {{ $buku->rilis }}</p>
                    <p class="text-lg"><strong>Harga:</strong> Rp {{ number_format($buku->harga, 0, ',', '.') }}</p>
                    <p class="text-lg">  
                        <strong>Author:
                            <a href="{{ route('welcome.authorshow', $buku->author->id) }}" class="text-blue-600 hover:underline">
                                {{ $buku->author->nama }}
                            </a>
                        </strong>
                    </p> 
                    <p class="mt-4"><strong>Sipnosis:</strong> {{ $buku->sipnosis }}</p>

                    <a href="{{ route('welcome.bukuindex') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-6">
                        Kembali ke Daftar Buku
                    </a>
                        <a href="{{ route('welcome.index') }}" class="inline-block bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mt-6">
                        Kembali ke Home
                    </a>
                </div>
            </div>
        </div>
    </div>

    @if($genres->count() > 0)
        <div class="mt-10 bg-gray-950 rounded-sm">
            <h4 class="text-xl text-center text-gray-100 font-semibold pt-4">Buku dengan Genre yang Sama: {{ $buku->genre }}</h4>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-4 pb-4 mx-4">
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

    <footer class="bg-black max-w-full mx-auto py-6 px-4 sm:px-6 lg:px-8 mt-4">
            <div class="text-center text-white">
                © 2025
            </div>
    </footer>
</x-layout>

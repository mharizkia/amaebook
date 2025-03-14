<x-layout2>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-8">
        <div class="bg-linear-to-b from-black to-white to-20% shadow-md rounded-lg p-6">
            <h1 class="text-xl text-white text-center bg-black mb-4">List of Books</h1>
            <div class="overflow-x-auto pb-4">
                <div class="flex flex-nowrap gap-6 px-4">
                    @foreach($bukus as $buku)
                        <div class="w-64 flex-shrink-0 transform transition-transform hover:scale-105">
                            <a href="{{ route('bukus.show', $buku->id) }} " class="block relative group">
                                <img src="{{ asset('images/' . $buku->gambar) }}" alt="{{ $buku->judul }}" class="rounded-lg shadow-lg w-full h-full object-cover transition-transform transform group-hover:scale-105" title="{{ $buku->judul }}">
                                <div class="absolute inset-0 bg-black bg-opacity-70 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 hover:scale-105">
                                    <span class="text-white text-lg font-semibold text-center">{{ $buku->judul }} by {{ $buku->author->nama }} </span>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto mt-8">
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($authors as $author)
                    <div class="bg-gray-100 p-4 rounded-lg">
                        <a href="{{ route('authors.show', $author->id) }}">
                            <img src="{{ asset('images/' . $author->gambar) }}" alt="{{ $author->nama }}" class="rounded-lg shadow-lg w-full h-78 object-contain hover:scale-105">
                        </a>
                        <h3 class="text-lg font-semibold text-gray-800 mt-4">{{ $author->nama }}</h3>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-layout2>

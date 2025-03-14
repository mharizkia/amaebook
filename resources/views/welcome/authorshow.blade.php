<x-layout>
<!--Detail Author-->
    <div class="relative container mx-auto mt-9 ml-3">
        <div class="bg-gradient-to-l from-black from-70% via-amber-950 via-5% to-gray-200 to-5% shadow-md rounded-lg p-6 border-2">
            <div class="max-w-8xl mx-auto px-2 sm:px-6 lg:px-8"> 
                <h1 class="text-2xl font-bold mb-6 text-black w-80">{{ $author->nama }}</h1>
            
            <div class="flex flex-col md:flex-row">
                <div class="md:w-1/3">
                    <img src="{{ asset('images/' . $author->gambar) }}" alt="{{ $author->nama }}" class="shadow-lg w-70 h-85 transition delay-100 duration-300 ease-in-out hover:-translate-y-0.5 hover:scale-100">
                </div>
                <div class="md:w-2/3 mt-4 md:mt-0 text-white">
                    <p class="text-lg"><strong>Tanggal Lahir:</strong> {{ $author->birth }}</p>
                    <p class="text-lg mt-2"><strong>Tempat Lahir:</strong> {{ $author->tempat }}</p>
                    <p class="text-lg mt-2"><strong>Buku yang dibuat:</strong></p>
                    <ul class="list-disc list-inside">
                        @forelse($author->bukus as $buku)
                            <li class="mb-2">
                                <a href="{{ route('welcome.bukushow', $buku->id) }}" class="text-blue-500 hover:underline">
                                    {{ $buku->judul }} ({{ $buku->rilis }})
                                </a>
                                - Genre: {{ $buku->genre }}
                            </li>
                        @empty
                            <p>Author ini belum merilis buku.</p>
                        @endforelse
                    </ul> 
                    
                    <a href="{{ route('welcome.authorindex') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-6">
                        Kembali ke Home
                    </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
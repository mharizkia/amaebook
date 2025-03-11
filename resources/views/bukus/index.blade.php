<x-layout2>

<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <x-slot name="header">
        <div class="grid grid-cols-2 gap-4 ">
            <h2 class="font-semibold text-xl text-black leading-tight pt-2">
                {{ __('Daftar Buku') }}
            </h2>
                <div class="flex justify-end">
                    @if ($errors->any())
                        <div class="bg-red-100 text-red-700 p-4 mb-4">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="inline-flex items-center px-4 py-2 bg-blue-500 text-white font-semibold text-xs uppercase rounded-md hover:bg-blue-700 " type="button">
                    + Buku
                    </button>
                    <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                                <!-- Modal header -->
                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                        Tambah Buku
                                    </h3>
                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Close</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <form action="{{ route('bukus.store') }}" method="POST" enctype="multipart/form-data" class="p-4 md:p-5">
                                    @csrf

                                    <div class="grid gap-4 mb-4 grid-cols-2">
                                    
                                        <div class="col-span-2">
                                            <label for="judul" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul Buku</label>
                                            <input type="text" name="judul" id="judul" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Judul Buku">
                                        </div>

                                        <div class="col-span-2 sm:col-span-1">
                                            <label for="harga" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
                                            <input type="number" name="harga" id="harga" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Rp.00000,00">
                                        </div>

                                        <div class="col-span-2 sm:col-span-1">
                                            <label for="genre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                                            <input type="text" name="genre" id="genre" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Genre...">
                                        </div>

                                        <div class="col-span-2 sm:col-span-1">
                                            <label for="rilis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Rilis</label>
                                            <input type="date" name="rilis" id="rilis" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        </div>

                                        <div class="col-span-2">
                                            <label for="author_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penulis</label>
                                            <select name="author_id" id="author_id" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                <option value="">Pilih Penulis</option>
                                                @foreach($authors as $author)
                                                    <option value="{{ $author->id }}">
                                                        {{ $author->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-span-2">
                                            <label for="sipnosis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sipnosis</label>
                                            <textarea name="sipnosis" id="sipnosis" rows="4" required class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tuliskan sipnosis"></textarea>                    
                                        </div>

                                        <div class="col-span-2">
                                            <label for="gambar" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gambar Buku</label>
                                            <input type="file" name="gambar" id="gambar" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        </div>
                                    </div>
                                    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                        Simpan
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                            <div class="absolute inset-0 bg-black/70 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 hover:scale-105">
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
</x-layout2>

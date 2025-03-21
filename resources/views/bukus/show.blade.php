<x-layout2>
<script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <div class="relative container mx-auto mt-9 ml-3">
        <div class="bg-gradient-to-l from-black via-amber-950 to-gray-200 shadow-md rounded-lg p-6">
            <div class="max-w-8xl mx-auto px-2 sm:px-6 lg:px-8"> 
                <div class="flex">
                    <h1 class="text-2xl font-bold mb-6 text-black w-auto max-w-sm">{{ $buku->judul }}</h1>
                        <div class="absolute top-6 right-6">
                            <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="inline-flex items-center px-4 py-2 bg-blue-500 text-white font-semibold text-xs uppercase rounded-md hover:bg-blue-700 " type="button">
                            Edit
                            </button>
                            <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                                        <!-- Modal header -->
                                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                Edit Buku
                                            </h3>
                                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                </svg>
                                                <span class="sr-only">Close</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <form action="{{ route('bukus.update', $buku->id) }}" method="POST" enctype="multipart/form-data" class="p-4 md:p-5">
                                            @csrf
                                            @method('PUT')

                                            <div class="grid gap-4 mb-4 grid-cols-2">
                                                <div class="col-span-2">
                                                    <label for="judul" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul Buku</label>
                                                    <input type="text" name="judul" id="judul" value="{{ old('judul', $buku->judul) }}" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Judul Buku">
                                                    @error('judul')
                                                        <div class="text-red-600">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-span-2 sm:col-span-1">
                                                    <label for="harga" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
                                                    <input type="number" name="harga" id="harga" value="{{ old('harga', $buku->harga) }}" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Rp.00000,00">
                                                    @error('harga')
                                                        <div class="text-red-600">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-span-2 sm:col-span-1">
                                                    <label for="genre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                                                    <input type="text" name="genre" id="genre" value="{{ old('genre', $buku->genre) }}" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Genre...">
                                                </div>
                                                <div class="col-span-2 sm:col-span-1">
                                                    <label for="rilis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Rilis</label>
                                                    <input type="date" name="rilis" id="rilis" value="{{ old('rilis', $buku->rilis) }}" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                    @error('rilis')
                                                        <div class="text-red-500 text-sm">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-span-2">
                                                    <label for="author_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penulis</label>
                                                    <select name="author_id" id="author_id" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                        <option value="">Pilih Penulis</option>
                                                        @foreach($authors as $author)
                                                            <option value="{{ $author->id }}" {{ $buku->author_id == $author->id ? 'selected' : '' }}>
                                                                {{ $author->nama }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('author_id')
                                                        <div class="text-red-500 text-sm">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-span-2">
                                                    <label for="sipnosis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sipnosis</label>
                                                    <textarea name="sipnosis" id="sipnosis" rows="4" required class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tuliskan sipnosis">{{ old('sipnosis', $buku->sipnosis) }}</textarea>                    
                                                </div>
                                                <div class="col-span-2">
                                                    <label for="gambar" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gambar Buku</label>
                                                    <input type="file" name="gambar" id="gambar" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                    @error('gambar')
                                                        <div class="text-red-500 text-sm">{{ $message }}</div>
                                                    @enderror

                                                    @if($buku->gambar)
                                                        <div class="mt-2">
                                                            <img src="{{ asset('images/' . $buku->gambar) }}" alt="{{ $buku->judul }}" class="w-48 h-auto">
                                                        </div>
                                                    @endif
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
                            
                        <button id="delete-button" class="inline-flex items-center px-4 py-2 bg-red-500 text-white font-semibold text-xs uppercase rounded-md hover:bg-red-700" type="button">
                            Delete
                        </button>

                        <script>
                            document.getElementById('delete-button').addEventListener('click', function () {
                                Swal.fire({
                                    title: 'Delete?',
                                    text: "Apakah anda ingin menghapus data ini?",
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#d33',
                                    cancelButtonColor: '#3085d6',
                                    confirmButtonText: 'Iya',
                                    cancelButtonText: 'Tidak'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        const form = document.createElement('form');
                                        form.method = 'POST';
                                        form.action = "{{ route('bukus.destroy', $buku->id) }}";

                                        const csrfToken = document.createElement('input');
                                        csrfToken.type = 'hidden';
                                        csrfToken.name = '_token';
                                        csrfToken.value = '{{ csrf_token() }}';
                                        form.appendChild(csrfToken);

                                        const methodField = document.createElement('input');
                                        methodField.type = 'hidden';
                                        methodField.name = '_method';
                                        methodField.value = 'DELETE';
                                        form.appendChild(methodField);

                                        document.body.appendChild(form);
                                        form.submit();
                                    }
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
            <div class="flex flex-col md:flex-row ">
                <div class="md:w-1/3">
                    <img src="{{ asset('images/' . $buku->gambar) }}" alt="{{ $buku->judul }}" class="shadow-lg ml-6 w-50 w-65 sm:object-contain border-2 border-white transition delay-100 duration-300 ease-in-out hover:scale-105">
                </div>
                <div class="md:w-2/3 mt-4 md:mt-0 text-white">
                    <p class="text-lg"><strong>Genre:</strong> {{ $buku->genre }}</p>
                    <p class="text-lg"><strong>Tanggal Rilis:</strong> {{ $buku->rilis }}</p>
                    <p class="text-lg"><strong>Harga:</strong> Rp {{ number_format($buku->harga, 0, ',', '.') }}</p>
                    <p class="text-lg">  
                        <strong>Author:
                            <a href="{{ route('authors.show', $buku->author->id) }}" class="text-blue-600 hover:underline">
                                {{ $buku->author->nama }}
                            </a>
                        </strong>
                    </p> 
                    <p class="mt-4"><strong>Sipnosis:</strong> {{ $buku->sipnosis }}</p>

                    <a href="{{ route('bukus.index') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-6">
                        Kembali ke Daftar Buku
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layout2>

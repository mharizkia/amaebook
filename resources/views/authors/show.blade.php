<x-layout2>
<script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <div class="relative container mx-auto mt-9 ml-3">
        <div class="bg-gradient-to-l from-black from-70% via-amber-950 via-5% to-gray-200 to-5% shadow-md rounded-lg p-6 border-2">
            <div class="max-w-8xl mx-auto px-2 sm:px-6 lg:px-8"> 
                <h1 class="text-2xl font-bold mb-6 text-black w-80">{{ $author->nama }}</h1>
                <div class="absolute top-5 right-5">
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
                                <form action="{{ route('authors.update', $author->id) }}" method="POST" enctype="multipart/form-data" class="p-4 md:p-5">
                                    @csrf
                                    @method('PUT')

                                    <div class="grid gap-4 mb-4 grid-cols-2">
                                        <div class="col-span-2">
                                            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">nama Buku</label>
                                            <input type="text" name="nama" id="nama" value="{{ old('nama', $author->nama) }}" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="nama Buku">
                                            @error('nama')
                                                <div class="text-red-600">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
                                            <label for="tempat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat Lahir</label>
                                            <input type="text" name="tempat" id="tempat" value="{{ old('tempat', $author->tempat) }}" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Tempat Lahir">
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
                                            <label for="birth" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal birth</label>
                                            <input type="date" name="birth" id="birth" value="{{ old('birth', $author->birth) }}" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            @error('birth')
                                                <div class="text-red-500 text-sm">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-span-2">
                                            <label for="gambar" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gambar Buku</label>
                                            <input type="file" name="gambar" id="gambar" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            @error('gambar')
                                                <div class="text-red-500 text-sm">{{ $message }}</div>
                                            @enderror

                                            @if($author->gambar)
                                                <div class="mt-2">
                                                    <img src="{{ asset('images/' . $author->gambar) }}" alt="{{ $author->nama }}" class="w-48 h-auto">
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
                                    // Submit form via AJAX or by submitting the form normally
                                    const form = document.createElement('form');
                                    form.method = 'POST';
                                    form.action = "{{ route('authors.destroy', $author->id) }}";

                                    // Add CSRF token and method spoofing inputs
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
                                <a href="{{ route('bukus.show', $buku->id) }}" class="text-blue-500 hover:underline">
                                    {{ $buku->judul }} ({{ $buku->rilis }})
                                </a>
                                - Genre: {{ $buku->genre }}
                            </li>
                        @empty
                            <p>Author ini belum merilis buku.</p>
                        @endforelse
                    </ul> 
                    
                    <a href="{{ route('authors.index') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-6">
                        Kembali ke Daftar author
                    </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout2>
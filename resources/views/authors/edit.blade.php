<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <title>Tambah author</title>
</head>
<body>
    <div class="container mx-auto mt-8">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-4">Edit author</h1>

            <form action="{{ route('authors.update', $author->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="nama" class="block font-medium text-sm text-gray-700">Nama Author</label>
                    <input type="text" name="nama" id="nama" value="{{ old('nama', $author->nama) }}" required class="form-input rounded-md shadow-sm mt-1 block w-full">
                    @error('nama')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="birth" class="block font-medium text-sm text-gray-700">Tanggal Lahir</label>
                    <input type="date" name="birth" id="birth" value="{{ old('birth', $author->birth) }}" required class="form-input rounded-md shadow-sm mt-1 block w-full">
                    @error('birth')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="tempat" class="block font-medium text-sm text-gray-700">Tempat Lahir</label>
                    <input type="text" name="tempat" id="tempat" value="{{ old('tempat', $author->tempat) }}" required class="form-input rounded-md shadow-sm mt-1 block w-full">
                    @error('tempat')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="gambar" class="block font-medium text-sm text-gray-700">Gambar author</label>
                    <input type="file" name="gambar" id="gambar" class="form-input rounded-md shadow-sm mt-1 block w-full">
                    @error('gambar')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror

                    @if($author->gambar)
                        <div class="mt-2">
                            <img src="{{ asset('images' . $author->gambar) }}" alt="{{ $author->nama }}" class="w-48 h-auto">
                        </div>
                    @endif
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>


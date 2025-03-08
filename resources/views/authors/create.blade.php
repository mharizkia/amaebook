<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <title>Tambah Author</title>
</head>
<body>
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Tambah Author Baru</h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('authors.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="nama" class="block text-gray-700 font-bold mb-2">Nama Author:</label>
                <input type="text" id="nama" name="nama" class="border border-gray-300 rounded-md p-2 w-full" value="{{ old('nama') }}" required>
            </div>

            <div class="mb-4">
                <label for="birth" class="block text-gray-700 font-bold mb-2">Tanggal Lahir:</label>
                <input type="date" id="birth" name="birth" class="border border-gray-300 rounded-md p-2 w-full">
            </div>

            <div class="mb-4">
                <label for="tempat" class="block text-gray-700 font-bold mb-2">Tempat Lahir:</label>
                <input type="text" id="tempat" name="tempat" class="border border-gray-300 rounded-md p-2 w-full">
            </div>

            <div class="mb-4">
                <label for="gambar" class="block text-gray-700 font-bold mb-2">Gambar</label>
                <input type="file" id="gambar" name="gambar" class="border border-gray-300 rounded-md p-2 w-full">
            </div>
            
            <div class="mb-4">
                <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600">Simpan</button>
                <a href="{{ route('authors.index') }}" class="bg-gray-500 text-white font-bold py-2 px-4 rounded hover:bg-gray-600">Kembali</a>
            </div>
        </form>
    </div>
</body>
</html>

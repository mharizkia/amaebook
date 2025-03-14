<div>
    <input type="text" wire:model="query" class="form-input w-full p-2 border rounded" placeholder="Cari buku atau penulis...">

    @if(strlen($query) > 2)
        <div class="mt-4 bg-white rounded shadow-md">
            @if($results->isEmpty())
                <div class="p-4 text-gray-600">Tidak ada hasil ditemukan</div>
            @else
                <ul>
                    @foreach($results as $result)
                        <li class="p-4 border-b">
                            <a href="{{ route('buku.show', $result->id) }}" class="block hover:bg-gray-100">
                                {{ $result->judul }} oleh {{ $result->author->nama }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    @endif
</div>
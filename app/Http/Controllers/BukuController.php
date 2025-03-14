<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Author;
use Illuminate\Support\Facades\Storage;


class BukuController extends Controller
{

    public function index()
    {
        $bukus = Buku::orderBy('rilis', 'DESC')->with('author')->get();
        $bukus = Buku::paginate(4);
        $authors = Author::all();

        return view('bukus.index', compact('bukus','authors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'sipnosis' => 'required',
            'genre' => 'required',
            'rilis' => 'required',
            'harga' => 'required|numeric',
            'author_id' => 'required|exists:authors,id',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        if ($request->hasFile('gambar')) {
            $imageName = time().'.'.$request->gambar->extension();
            $request->gambar->move(public_path('images'), $imageName);
        } else {
            $imageName = null;
        }
    
        Buku::create([
            'judul' => $request->judul,
            'sipnosis' => $request ->sipnosis,
            'genre' => $request->genre,
            'rilis' => $request->rilis,
            'harga' => $request->harga,
            'author_id' => $request->author_id,
            'gambar' => $imageName,
        ]);
    
        return redirect()->route('bukus.index')->with('success', 'Buku berhasil ditambahkan!');
    }
    
    public function show($id)
    {
        $buku = Buku::with('author')->findOrFail($id);
        $buku = Buku::findOrFail($id);
        $authors = Author::all();

        return view('bukus.show', compact('buku','authors'));
    }  

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'sipnosis' => 'required|string',
            'genre' => 'required|string|max:255',
            'rilis' => 'required|date',
            'harga' => 'required|numeric',
            'author_id' => 'required|exists:authors,id',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $buku = Buku::findOrFail($id);
        $buku->update($request->all());

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('images', 'public');
            $buku->gambar = $path;
        }

        $buku->update([
            'judul' => $request->judul,
            'sipnosis' => $request->sipnosis,
            'genre' => $request->genre,
            'rilis' => $request->rilis,
            'harga' => $request->harga,
            'author_id' => $request->author_id,
        ]);
    
        return redirect()->route('bukus.index')->with('success', 'Buku berhasil diperbarui');    
    }

    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);

        if ($buku->gambar) {
            Storage::delete('public/' . $buku->gambar);
        }

        $buku->delete();

        return redirect()->route('bukus.index')->with('success', 'Buku berhasil dihapus.');
    }
}
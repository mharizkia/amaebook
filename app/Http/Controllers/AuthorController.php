<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AuthorController extends Controller
{
    public function __construct()
    {
        
    }

    public function index()
    {
        $authors = Author::all();
        return view('authors.index', compact('authors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'birth' => 'nullable|date',
            'tempat' => 'nullable|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
    
        if ($request->hasFile('gambar')) {
            $gambarName = time().'.'.$request->gambar->extension();
            $request->gambar->move(public_path('images'), $gambarName);
        } else {
            $gambarName = null;
        }

        Author::create([
            'nama' => $request->nama,
            'birth' => $request->birth,
            'tempat' => $request->tempat,
            'gambar' => $gambarName, 
        ]);
    
        return redirect()->route('authors.index');
    }

    public function show($id)
    {
        $author = Author::with('bukus')->findOrFail($id);

        return view('authors.show', compact('author'));
    }  

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'birth' => 'required|date',
            'tempat' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $author = Author::findOrFail($id);
    
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('images', 'public');
            $author->gambar = $path;
        }
    
        $author->update([
            'nama' => $request->nama,
            'birth' => $request->birth,
            'tempat' => $request->tempat,
            'gambar' => $author->gambar,
        ]);
    
        return redirect()->route('authors.index')->with('success', 'Author berhasil diupdate');
    }    

    public function destroy($id)
    {
        $author = Author::findOrFail($id);

        if ($author->gambar) {
            Storage::delete('public/' . $author->gambar);
        }

        $author->delete();

        return redirect()->route('authors.index')->with('success', 'Author berhasil dihapus.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Author;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $bukus = Buku::with('author')->get()->groupBy('genre');

        $baruRilis = Buku::orderBy('rilis', 'desc')->take(4)->get();
                
        return view('welcome.welcome', compact('bukus', 'baruRilis'));
    }

    public function bukuindex()
    {
        $bukus = Buku::with('author')->get()->groupBy('genre');

        return view('welcome.bukuindex', compact('bukus'));
    }

    public function authorindex()
    {
        $authors = Author::paginate(4);

        return view('welcome.authorindex', compact('authors'));
    }


    public function bukushow($id)
    {
        $buku = Buku::with('author')->findOrFail($id);

        $genres = Buku::where('genre', $buku->genre)
                        ->where('id', '!=', $id)->take(5)
                        ->get();

        return view('welcome.bukushow', compact('buku','genres'));
    }

    public function authorshow($id)
    {
        $author = Author::with('bukus')->findOrFail($id);

        return view('welcome.authorshow', compact('author'));
    }  

    public function search(Request $request)
    {
        $query = $request->input('query');

        $bukus = Buku::where('judul','LIKE',"%{$query}%")->get();

        $authors = Author::where('nama', 'LIKE', "%{$query}%")->get();

        return view('welcome.search', compact('bukus','authors','query'));

    }
}

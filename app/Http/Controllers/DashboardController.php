<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Buku;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $bukus = Buku::with('author')->get();
        $authors = Author::all();

        return view('dashboard', compact('bukus','authors'));
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul', 
        'sipnosis',
        'genre', 
        'rilis', 
        'harga', 
        'author_id', 
        'gambar'
    ];

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }
}

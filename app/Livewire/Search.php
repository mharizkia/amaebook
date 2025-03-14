<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Buku;
use App\Models\Author;

class Search extends Component
{
    public $query;
    public $results = [];

    public function updatedQuery()
    {
        $this->results = Buku::where('judul', 'like', '%' . $this->query . '%')
            ->orWhereHas('author', function($q) {
                $q->where('name', 'like', '%' . $this->query . '%');
            })
            ->get();
    }

    public function render()
    {
        return view('livewire.search');
    }
}

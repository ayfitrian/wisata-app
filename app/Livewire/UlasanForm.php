<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Ulasan;
use Illuminate\Support\Facades\Auth;

class UlasanForm extends Component
{
    public $wisataId;
    public $rating = 5;
    public $komentar = '';

    public function render()
    {
        return view('livewire.ulasan-form');
    }

    public function submit()
    {
        $this->validate([
            'rating' => 'required|integer|min:1|max:5',
            'komentar' => 'nullable|string',
        ]);

        Ulasan::create([
            'wisata_id' => $this->wisataId,
            'user_id' => Auth::id(),
            'rating' => $this->rating,
            'komentar' => $this->komentar,
        ]);

        session()->flash('message', 'Ulasan berhasil ditambahkan.');
        $this->reset('rating', 'komentar');
    }
}

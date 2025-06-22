<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Wisata;

class WisataTerpopuler extends Component
{
    public function render()
    {
        $wisatas = Wisata::with('kota', 'kategori', 'ulasans')
            ->withAvg('ulasans as avg_rating', 'rating')
            ->orderByDesc('avg_rating')
            ->take(10)
            ->get();

        return view('livewire.wisata-terpopuler', compact('wisatas'))->layout('components.layouts.app');
    }
}


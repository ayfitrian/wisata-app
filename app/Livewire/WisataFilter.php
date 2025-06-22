<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Wisata;
use App\Models\Kota;

class WisataFilter extends Component
{
    public $kota_id = '';
    public $biaya_maksimal = '';
    public $filterKota = '';
    public $filterBiaya = '';
    public $filteredWisatas = [];
    public function render()
    {
        $kotas = Kota::all();

        $wisatas = Wisata::with('kota', 'kategori')
            ->when($this->kota_id, fn($query) => $query->where('kota_id', $this->kota_id))
            ->when($this->biaya_maksimal, fn($query) => $query->where('biaya_masuk', '<=', $this->biaya_maksimal))
            ->get();
        logger('Filtered Wisata:', $wisatas->toArray());

        return view('livewire.wisata-filter', compact('wisatas', 'kotas'))->layout('components.layouts.app');
    }

    public function mount()
    {
        $this->filteredWisatas = Wisata::with('kota', 'kategori')->get();
    }

    public function applyFilter()
    {
        $this->filteredWisatas = Wisata::with('kota', 'kategori')
            ->when($this->filterKota, fn($q) => $q->where('kota_id', $this->filterKota))
            ->when($this->filterBiaya, fn($q) => $q->where('biaya_masuk', '<=', $this->filterBiaya))
            ->get();
    }
}


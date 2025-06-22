<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Wisata;

class WisataDetail extends Component
{
    public $wisata;

    public function mount($id)
    {
        $this->wisata = Wisata::with(['kota', 'kategori', 'ulasans.user'])->findOrFail($id);
    }

    public function render()
    {
        return view('livewire.wisata-detail')->layout('components.layouts.app');
    }

    protected $listeners = ['ulasanDitambahkan' => 'refreshData'];

    public function refreshData()
    {
        $this->wisata = Wisata::with(['kota', 'kategori', 'ulasans.user'])->findOrFail($this->wisata->id);
    }

}

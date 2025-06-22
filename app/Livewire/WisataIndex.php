<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Wisata;
use App\Models\Kota;
use App\Models\Kategori;

class WisataIndex extends Component
{
    public $nama, $deskripsi, $biaya_masuk, $kota_id, $kategori_id;
    public $wisataId;
    public $isEdit = false;

    public function render()
    {
        $wisatas = Wisata::with(['kota', 'kategori'])->get();
        $kotas = Kota::all();
        $kategoris = Kategori::all();

        return view('livewire.wisata-index', compact('wisatas', 'kotas', 'kategoris'))->layout('components.layouts.app');
    }

    public function store()
    {
        $this->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'biaya_masuk' => 'required|numeric|min:0',
            'kota_id' => 'required|exists:kotas,id',
            'kategori_id' => 'required|exists:kategoris,id',
        ]);

        Wisata::create([
            'nama' => $this->nama,
            'deskripsi' => $this->deskripsi,
            'biaya_masuk' => $this->biaya_masuk,
            'kota_id' => $this->kota_id,
            'kategori_id' => $this->kategori_id,
        ]);

        session()->flash('message', 'Destinasi berhasil ditambahkan.');

        $this->resetInput();
    }

    public function resetInput()
    {
        $this->nama = '';
        $this->deskripsi = '';
        $this->biaya_masuk = '';
        $this->kota_id = '';
        $this->kategori_id = '';
        $this->isEdit = false;
    }

    public function edit($id)
    {
        $wisata = Wisata::findOrFail($id);
        $this->wisataId = $id;
        $this->nama = $wisata->nama;
        $this->deskripsi = $wisata->deskripsi;
        $this->biaya_masuk = $wisata->biaya_masuk;
        $this->kota_id = $wisata->kota_id;
        $this->kategori_id = $wisata->kategori_id;
        $this->isEdit = true;
    }

    public function update()
    {
        $this->validate([
            'nama' => 'required|string',
            'deskripsi' => 'required|string',
            'biaya_masuk' => 'required|numeric',
            'kota_id' => 'required|exists:kotas,id',
            'kategori_id' => 'required|exists:kategoris,id',
        ]);

        $wisata = Wisata::findOrFail($this->wisataId);
        $wisata->update([
            'nama' => $this->nama,
            'deskripsi' => $this->deskripsi,
            'biaya_masuk' => $this->biaya_masuk,
            'kota_id' => $this->kota_id,
            'kategori_id' => $this->kategori_id,
        ]);

        session()->flash('message', 'Data destinasi berhasil diperbarui.');
        $this->resetInput();
    }

    public function delete($id)
    {
        $wisata = Wisata::findOrFail($id);
        $wisata->delete();
        session()->flash('message', 'Data destinasi berhasil dihapus.');
    }

    public function submit()
    {
        if ($this->isEdit) {
            $this->update();
        } else {
            $this->store();
        }
    }

}

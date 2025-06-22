<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Kota;

class KotaIndex extends Component
{
    public $nama_kota, $kotaId;
    public $isEdit = false;

    public function render()
    {
        $kotas = Kota::all();
        return view('livewire.kota-index', compact('kotas'))->layout('components.layouts.app');
    }

    public function store()
    {
        $this->validate(['nama_kota' => 'required|string']);
        Kota::create(['nama_kota' => $this->nama_kota]);
        session()->flash('message', 'Kota berhasil ditambahkan.');
        $this->resetInput();
    }

    public function edit($id)
    {
        $kota = Kota::find($id);
        $this->kotaId = $id;
        $this->nama_kota = $kota->nama_kota;
        $this->isEdit = true;
    }

    public function update()
    {
        $this->validate(['nama_kota' => 'required|string']);
        Kota::find($this->kotaId)->update(['nama_kota' => $this->nama_kota]);
        $this->resetInput();
    }

    public function delete($id)
    {
        Kota::find($id)->delete();
    }

    public function resetInput()
    {
        $this->nama_kota = '';
        $this->kotaId = null;
        $this->isEdit = false;
    }

    public function submit()
    {
        $this->isEdit ? $this->update() : $this->store();
    }
}

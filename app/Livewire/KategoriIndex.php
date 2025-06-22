<?php

namespace App\Livewire;
use Livewire\Component;
use App\Models\Kategori;


class KategoriIndex extends Component
{
    public $nama_kategori, $kategoriId;
    public $isEdit = false;

    public function render()
    {
        $kategoris = Kategori::all();
        return view('livewire.kategori-index', compact('kategoris'))->layout('components.layouts.app');
    }

    public function store()
    {
        //dd('store called', $this->nama_kategori);
        $this->validate(['nama_kategori' => 'required|string']);
        Kategori::create(['nama_kategori' => $this->nama_kategori]);
        session()->flash('message', 'Kategori berhasil ditambahkan.');
        $this->resetInput();
    }

    public function edit($id)
    {
        $kategori = Kategori::find($id);
        $this->kategoriId = $id;
        $this->nama_kategori = $kategori->nama_kategori;
        $this->isEdit = true;
    }

    public function update()
    {
        $this->validate(['nama_kategori' => 'required|string']);
        Kategori::find($this->kategoriId)->update(['nama_kategori' => $this->nama_kategori]);
        $this->resetInput();
    }

    public function delete($id)
    {
        Kategori::find($id)->delete();
    }

    public function resetInput()
    {
        $this->nama_kategori = '';
        $this->kategoriId = null;
        $this->isEdit = false;
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
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    protected $fillable = ['nama', 'deskripsi', 'kota_id', 'kategori_id', 'biaya_masuk'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function kota()
    {
        return $this->belongsTo(Kota::class);
    }

    public function ulasans()
    {
        return $this->hasMany(Ulasan::class);
    }
}
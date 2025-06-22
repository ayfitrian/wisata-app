<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\KategoriIndex;
use App\Livewire\KotaIndex;
use App\Livewire\WisataIndex;
use App\Livewire\WisataDetail;
use App\Livewire\WisataTerpopuler;
use App\Livewire\WisataFilter;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return auth()->check() 
        ? redirect()->route('dashboard') 
        : view('landing');
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/kategori', KategoriIndex::class)->middleware('auth');
Route::get('/kota', KotaIndex::class)->middleware('auth');
Route::get('/wisata', WisataIndex::class)->middleware('auth');
Route::get('/wisata/{id}', WisataDetail::class)->name('wisata.detail');
Route::get('/terpopuler', WisataTerpopuler::class)->name('wisata.terpopuler');
Route::get('/filter-wisata', WisataFilter::class)->name('wisata.index');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

require __DIR__.'/auth.php';

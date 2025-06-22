@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-10">
        {{-- Header dan Logout --}}
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">📊 Dashboard Aplikasi Wisata</h1>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-black px-4 py-2 rounded shadow">
                    🔓 Logout
                </button>
            </form>
        </div>

        {{-- Deskripsi --}}
        <p class="text-lg text-gray-600 mb-6">
            Selamat datang! Kelola data destinasi wisata dengan mudah menggunakan menu di bawah ini.
        </p>

        {{-- Menu Cards --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <a href="/kategori" class="block p-6 bg-blue-100 rounded-xl border border-blue-300 hover:bg-blue-200 transition shadow">
                <h2 class="text-xl font-semibold text-blue-800">📁 Kelola Kategori</h2>
                <p class="text-sm text-blue-600 mt-2">Tambah, edit, dan hapus kategori wisata.</p>
            </a>

            <a href="/kota" class="block p-6 bg-yellow-100 rounded-xl border border-yellow-300 hover:bg-yellow-200 transition shadow">
                <h2 class="text-xl font-semibold text-yellow-800">🏙️ Kelola Kota</h2>
                <p class="text-sm text-yellow-600 mt-2">Tambah, edit, dan hapus daftar kota tujuan wisata.</p>
            </a>

            <a href="/wisata" class="block p-6 bg-green-100 rounded-xl border border-green-300 hover:bg-green-200 transition shadow">
                <h2 class="text-xl font-semibold text-green-800">🗺️ Kelola Destinasi</h2>
                <p class="text-sm text-blue-600 mt-2">Tambah, edit, dan hapus destinasi wisata.</p>
            </a>

            <a href="/terpopuler" class="block p-6 bg-purple-100 rounded-xl border border-purple-300 hover:bg-purple-200 transition shadow">
                <h2 class="text-xl font-semibold text-purple-800">🏆 Wisata Terpopuler</h2>
                <p class="text-sm text-purple-600 mt-2">Lihat destinasi dengan rating tertinggi.</p>
            </a>

            <a href="/filter-wisata" class="block p-6 bg-pink-100 rounded-xl border border-pink-300 hover:bg-pink-200 transition shadow">
                <h2 class="text-xl font-semibold text-pink-800">🔍 Lihat Semua Wisata</h2>
                <p class="text-sm text-pink-600 mt-2">Cari wisata berdasarkan kota dan biaya masuk.</p>
            </a>
        </div>
    </div>
@endsection

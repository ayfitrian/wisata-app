<div class="p-6">
    <h2 class="text-2xl font-bold mb-4 text-center">🏆 Wisata Terpopuler</h2>

    @forelse($wisatas as $wisata)
        <div class="border p-4 rounded mb-4 shadow bg-white">
            <h3 class="text-xl font-semibold text-blue-700">
                <a href="{{ route('wisata.detail', $wisata->id) }}">{{ $wisata->nama }}</a>
            </h3>
            <p class="text-sm text-gray-600">{{ $wisata->deskripsi }}</p>
            <p class="mt-2">📍 {{ $wisata->kota->nama_kota }} | 📁 {{ $wisata->kategori->nama_kategori }}</p>
            <p>💰 Rp {{ number_format($wisata->biaya_masuk, 0, ',', '.') }}</p>
            <p class="text-yellow-600">⭐ Rata-rata Rating: {{ number_format($wisata->avg_rating, 1) }}/5</p>
        </div>
    @empty
        <p class="text-gray-600">Belum ada wisata yang diulas.</p>
    @endforelse
</div>

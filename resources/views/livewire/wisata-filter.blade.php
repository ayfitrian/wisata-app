<div class="p-6 bg-gray-50 min-h-screen">
    <h2 class="text-3xl font-bold text-blue-700 mb-6 flex items-center gap-2">
        🗺️ <span>Daftar Wisata</span>
    </h2>

    {{-- Filter Form --}}
    <div class="bg-white shadow p-6 rounded-lg mb-6">
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div>
                <label for="filterKota" class="block text-sm font-medium text-gray-700">Filter Kota:</label>
                <select wire:model="filterKota" id="filterKota" class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Semua Kota</option>
                    @foreach($kotas as $kota)
                        <option value="{{ $kota->id }}">{{ $kota->nama_kota }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="filterBiaya" class="block text-sm font-medium text-gray-700">Biaya Masuk Maksimal:</label>
                <input type="number" wire:model="filterBiaya" id="filterBiaya" class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" placeholder="Contoh: 30000">
            </div>

            <div class="flex items-end">
                <button wire:click="applyFilter" class="w-full bg-blue-600 text-black px-4 py-2 rounded-md hover:bg-blue-700 transition">
                    Terapkan Filter Wisata 🔍
                </button>
            </div>
        </div>
    </div>

    {{-- Daftar Wisata --}}
    <div class="space-y-4">
        @forelse($filteredWisatas as $wisata)
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-md transition">
                <h3 class="text-xl font-bold text-blue-800 mb-1">
                    <a href="{{ route('wisata.detail', $wisata->id) }}" class="hover:underline">{{ $wisata->nama }}</a>
                </h3>
                <p class="text-sm text-gray-600 mb-2">{{ $wisata->deskripsi }}</p>

                <div class="text-sm text-gray-700 flex flex-wrap gap-4">
                    <div>📍 <strong>{{ $wisata->kota->nama_kota }}</strong></div>
                    <div>📁 <strong>{{ $wisata->kategori->nama_kategori }}</strong></div>
                    <div>💰 <strong>Rp {{ number_format($wisata->biaya_masuk, 0, ',', '.') }}</strong></div>
                </div>
            </div>
        @empty
            <p class="text-gray-500 text-center mt-8">🙁 Tidak ada wisata yang cocok dengan filter.</p>
        @endforelse
    </div>
</div>

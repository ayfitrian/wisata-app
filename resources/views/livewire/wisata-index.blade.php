<div class="p-6 bg-white shadow-md rounded-lg max-w-6xl mx-auto">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">🗺️ Kelola Destinasi Wisata</h2>

    {{-- FORM TAMBAH / EDIT --}}
    <form wire:submit.prevent="submit" class="space-y-4 mb-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Nama Destinasi</label>
                <input type="text" wire:model="nama" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-200">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Biaya Masuk</label>
                <input type="number" wire:model="biaya_masuk" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-200">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Kota</label>
                <select wire:model="kota_id" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-200">
                    <option value="">-- Pilih Kota --</option>
                    @foreach($kotas as $kota)
                        <option value="{{ $kota->id }}">{{ $kota->nama_kota }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Kategori</label>
                <select wire:model="kategori_id" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-200">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($kategoris as $kategori)
                        <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mt-2">Deskripsi</label>
            <textarea wire:model="deskripsi" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-200"></textarea>
        </div>

        <div class="mt-4">
            <button type="submit" class="px-6 py-2 bg-blue-600 text-black rounded hover:bg-blue-700 transition">
                {{ $isEdit ? '🔄 Update' : '➕ Tambahkan' }}
            </button>
        </div>
    </form>

    {{-- TABEL DESTINASI --}}
    @if($wisatas->count())
        <div class="flex justify-center overflow-x-auto">
            <table class="w-full max-w-5xl bg-white border border-gray-200 rounded">
                <thead>
                    <tr class="bg-gray-100 text-gray-700">
                        <th class="border px-4 py-2">#</th>
                        <th class="border px-4 py-2">Nama</th>
                        <th class="border px-4 py-2">Deskripsi</th>
                        <th class="border px-4 py-2">Biaya Masuk</th>
                        <th class="border px-4 py-2">Kota</th>
                        <th class="border px-4 py-2">Kategori</th>
                        <th class="border px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($wisatas as $index => $wisata)
                        <tr class="hover:bg-gray-50">
                            <td class="border px-4 py-2 text-center">{{ $index + 1 }}</td>
                            <td class="border px-4 py-2">{{ $wisata->nama }}</td>
                            <td class="border px-4 py-2">{{ $wisata->deskripsi }}</td>
                            <td class="border px-4 py-2">Rp {{ number_format($wisata->biaya_masuk, 0, ',', '.') }}</td>
                            <td class="border px-4 py-2">{{ $wisata->kota->nama_kota }}</td>
                            <td class="border px-4 py-2">{{ $wisata->kategori->nama_kategori }}</td>
                            <td class="border px-4 py-2 text-center space-x-2">
                                <a href="{{ route('wisata.detail', $wisata->id) }}" class="text-green-600 hover:underline">🔍 Detail</a>
                                <button wire:click="edit({{ $wisata->id }})" class="text-blue-600 hover:underline">✏️ Ubah</button>
                                <button wire:click="delete({{ $wisata->id }})" class="text-red-600 hover:underline">🗑️ Hapus</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="mt-6 text-gray-600 text-center">Belum ada data destinasi wisata.</p>
    @endif
</div>

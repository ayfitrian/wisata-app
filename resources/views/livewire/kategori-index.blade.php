<div class="p-6 bg-white shadow-md rounded-lg max-w-4xl mx-auto">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">📁 Kelola Kategori</h2>

    {{-- Form Input --}}
    <form wire:submit.prevent="submit" class="flex flex-col sm:flex-row items-center justify-center gap-4 mb-6">
        <input 
            type="text" 
            wire:model="nama_kategori" 
            class="border border-gray-300 p-2 rounded w-full sm:w-1/2 focus:ring focus:ring-blue-200 focus:outline-none" 
            placeholder="Masukkan nama kategori">

        <button 
            type="submit" 
            class="bg-blue-600 hover:bg-blue-700 text-black px-4 py-2 rounded transition">
            {{ $isEdit ? '🔄 Update' : '➕ Tambah' }}
        </button>
    </form>

    {{-- Tabel Kategori --}}
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300 rounded shadow-sm mx-auto">
            <thead>
                <tr class="bg-gray-100 text-gray-700">
                    <th class="px-4 py-2 border-b text-center">ID</th>
                    <th class="px-4 py-2 border-b text-center">Nama Kategori</th>
                    <th class="px-4 py-2 border-b text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($kategoris as $kategori)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border-b text-center">{{ $kategori->id }}</td>
                        <td class="px-4 py-2 border-b text-center">{{ $kategori->nama_kategori }}</td>
                        <td class="px-4 py-2 border-b text-center space-x-2">
                            <button 
                                wire:click="edit({{ $kategori->id }})" 
                                class="text-blue-600 hover:underline">
                                ✏️ Edit
                            </button>
                            <button 
                                wire:click="delete({{ $kategori->id }})" 
                                class="text-red-600 hover:underline">
                                🗑️ Hapus
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center text-gray-500 py-4">Belum ada kategori.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

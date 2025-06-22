<div class="mt-10 border-t border-gray-300 pt-8">
    <h3 class="text-2xl font-bold text-gray-800 mb-6 text-center">📝 Tulis Ulasan Anda</h3>

    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded mb-6 text-center shadow-sm">
            ✅ {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="submit" class="space-y-6 max-w-xl mx-auto">
        {{-- Rating --}}
        <div class="flex flex-col">
            <label for="rating" class="mb-1 text-sm font-medium text-gray-700">⭐ Rating (1-5)</label>
            <input
                type="number"
                id="rating"
                wire:model="rating"
                min="1"
                max="5"
                placeholder="Contoh: 5"
                class="border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 w-28"
                required
            >
            @error('rating') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
        </div>

        {{-- Komentar --}}
        <div class="flex flex-col">
            <label for="komentar" class="mb-1 text-sm font-medium text-gray-700">💬 Komentar</label>
            <textarea
                id="komentar"
                wire:model="komentar"
                rows="4"
                placeholder="Tulis pendapat Anda di sini..."
                class="border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none"
            ></textarea>
            @error('komentar') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
        </div>

        {{-- Tombol Kirim --}}
        <div class="text-center">
            <button
                type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-black font-semibold px-6 py-2 rounded shadow transition"
            >
                🚀 Kirim Ulasan
            </button>
        </div>
    </form>
</div>

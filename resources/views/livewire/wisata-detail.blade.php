<div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg" wire:poll.keep-alive>
    <h2 class="text-4xl font-extrabold text-blue-900 leading-tight text-center">
        {{ $wisata->nama }}
    </h2>
    <p class="text-lg text-gray-700 mt-2 leading-relaxed text-center">
        {{ $wisata->deskripsi }}
    </p>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
        <div class="bg-blue-50 p-4 rounded border border-blue-200">
            <p class="text-sm text-gray-500">📍 Kota</p>
            <p class="text-lg font-semibold text-blue-800">{{ $wisata->kota->nama_kota }}</p>
        </div>
        <div class="bg-yellow-50 p-4 rounded border border-yellow-200">
            <p class="text-sm text-gray-500">📁 Kategori</p>
            <p class="text-lg font-semibold text-yellow-800">{{ $wisata->kategori->nama_kategori }}</p>
        </div>
        <div class="bg-green-50 p-4 rounded border border-green-200 sm:col-span-2">
            <p class="text-sm text-gray-500">💰 Biaya Masuk</p>
            <p class="text-xl font-bold text-green-700">Rp {{ number_format($wisata->biaya_masuk, 0, ',', '.') }}</p>
        </div>
    </div>

    <hr class="my-6 border-gray-300">

    <h3 class="text-2xl font-semibold text-gray-800 mb-4">📝 Ulasan Pengunjung</h3>

    @forelse($wisata->ulasans as $ulasan)
        <div class="mb-4 p-4 bg-gray-50 border border-gray-200 rounded-lg">
            <p class="text-md font-bold text-blue-700">{{ $ulasan->user->name }} <span class="text-yellow-500">⭐ {{ $ulasan->rating }}/5</span></p>
            <p class="text-gray-700 mt-1">{{ $ulasan->komentar }}</p>
        </div>
    @empty
        <p class="text-gray-500">Belum ada ulasan.</p>
    @endforelse

    <div class="mt-8">
        @auth
            @livewire('ulasan-form', ['wisataId' => $wisata->id])
        @else
            <p class="text-sm text-gray-600 mt-4">
                <a href="{{ route('login') }}" class="text-blue-600 font-semibold hover:underline">Login</a> untuk menulis ulasan.
            </p>
        @endauth
    </div>
</div>

@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-r from-blue-100 to-green-100 flex items-center justify-center py-12 px-4">
    <div class="bg-white shadow-xl rounded-2xl p-10 w-full max-w-2xl flex flex-col md:flex-row items-center space-y-6 md:space-y-0 md:space-x-10">
        
        {{-- Left Side - Illustration and Title --}}
        <div class="text-center md:text-left w-full md:w-1/2">
            <h1 class="text-4xl font-extrabold text-blue-800 mb-3">🌴 Selamat Datang!</h1>
            <p class="text-gray-600 text-lg">Jelajahi berbagai destinasi wisata terbaik di Indonesia dan bagikan ulasanmu!</p>
        </div>

        {{-- Right Side - Login/Register --}}
        <div class="w-full md:w-1/2 bg-gray-50 p-6 rounded-lg border border-gray-200 shadow-sm">
            <h2 class="text-2xl font-bold text-gray-700 mb-4 text-center">🔐 Akses Akun Anda</h2>
            <p class="text-gray-500 text-center mb-6">Pilih salah satu opsi di bawah:</p>
            <div class="flex flex-col space-y-4">
                <a href="{{ route('login') }}"
                   class="bg-blue-600 text-black py-2 px-6 rounded-lg font-medium hover:bg-blue-700 transition text-center">
                    Login 🔑
                </a>
                <a href="{{ route('register') }}"
                   class="bg-green-600 text-black py-2 px-6 rounded-lg font-medium hover:bg-green-700 transition text-center">
                    Register 📝
                </a>
            </div>
        </div>

    </div>
</div>
@endsection

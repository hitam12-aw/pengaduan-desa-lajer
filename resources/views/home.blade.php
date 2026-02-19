@extends('layouts.app')

@section('content')

{{-- Hero --}}
<div class="bg-green-700 text-white rounded-xl p-8 mb-8 text-center">
    <h1 class="text-3xl font-bold mb-2">Selamat Datang di Website Pengaduan</h1>
    <p class="text-lg mb-1">Desa Lajer</p>
    <p class="text-sm opacity-80">Sampaikan keluhan dan aspirasi Anda untuk desa yang lebih baik</p>
    <a href="{{ route('pengaduan.create') }}" 
       class="mt-4 inline-block bg-white text-green-700 font-semibold px-6 py-2 rounded-lg hover:bg-gray-100">
        Buat Pengaduan Sekarang
    </a>
</div>

{{-- Statistik --}}
<div class="grid grid-cols-3 gap-4 mb-8">
    <div class="bg-white rounded-xl shadow p-5 text-center">
        <p class="text-3xl font-bold text-green-700">{{ $totalPengaduan }}</p>
        <p class="text-sm text-gray-500 mt-1">Total Pengaduan</p>
    </div>
    <div class="bg-white rounded-xl shadow p-5 text-center">
        <p class="text-3xl font-bold text-yellow-500">{{ $totalProses }}</p>
        <p class="text-sm text-gray-500 mt-1">Sedang Diproses</p>
    </div>
    <div class="bg-white rounded-xl shadow p-5 text-center">
        <p class="text-3xl font-bold text-blue-500">{{ $totalSelesai }}</p>
        <p class="text-sm text-gray-500 mt-1">Selesai</p>
    </div>
</div>

{{-- Profil Desa --}}
<div class="bg-white rounded-xl shadow overflow-hidden mb-8">
    <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=1200&q=80" 
         alt="Foto Desa Lajer"
         class="w-full h-56 object-cover">
    <div class="p-6">
        <h2 class="text-xl font-bold text-green-700 mb-3">Profil Desa Lajer</h2>
        <p class="text-gray-600 leading-relaxed">
            Desa Lajer adalah salah satu desa yang berkomitmen untuk memberikan pelayanan terbaik kepada masyarakatnya. 
            Website ini hadir sebagai sarana bagi warga untuk menyampaikan pengaduan, aspirasi, dan masukan 
            demi kemajuan desa bersama.
        </p>
    </div>
</div>

{{-- Cara Pengaduan --}}
<div class="bg-white rounded-xl shadow p-6 mb-8">
    <h2 class="text-xl font-bold text-green-700 mb-4">📋 Cara Melakukan Pengaduan</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="text-center p-4 bg-gray-50 rounded-lg">
            <div class="text-3xl mb-2">📝</div>
            <p class="font-semibold">1. Isi Formulir</p>
            <p class="text-sm text-gray-500 mt-1">Isi form pengaduan dengan lengkap dan jelas</p>
        </div>
        <div class="text-center p-4 bg-gray-50 rounded-lg">
            <div class="text-3xl mb-2">🎫</div>
            <p class="font-semibold">2. Simpan Nomor Tiket</p>
            <p class="text-sm text-gray-500 mt-1">Catat nomor tiket yang diberikan setelah melapor</p>
        </div>
        <div class="text-center p-4 bg-gray-50 rounded-lg">
            <div class="text-3xl mb-2">🔍</div>
            <p class="font-semibold">3. Cek Status</p>
            <p class="text-sm text-gray-500 mt-1">Pantau perkembangan laporan menggunakan nomor tiket</p>
        </div>
    </div>
</div>

{{-- Pengumuman --}}
<div class="bg-white rounded-xl shadow p-6">
    <h2 class="text-xl font-bold text-green-700 mb-4">📢 Pengumuman Desa</h2>
    @forelse ($pengumuman as $item)
        <div class="border-b pb-3 mb-3">
            <p class="font-semibold">{{ $item->judul }}</p>
            <p class="text-sm text-gray-600 mt-1">{{ $item->isi }}</p>
            <p class="text-xs text-gray-400 mt-1">{{ $item->created_at->diffForHumans() }}</p>
        </div>
    @empty
        <p class="text-gray-400 text-sm">Belum ada pengumuman.</p>
    @endforelse
</div>

@endsection
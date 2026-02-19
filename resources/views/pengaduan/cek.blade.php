@extends('layouts.app')

@section('content')

<div class="max-w-2xl mx-auto">
    <h1 class="text-2xl font-bold text-green-700 mb-6">🔍 Cek Status Pengaduan</h1>

    {{-- Notif setelah kirim pengaduan --}}
    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded-lg mb-4">
            <p class="font-semibold">{{ session('success') }}</p>
            <p class="text-sm mt-1">Nomor Tiket Anda: 
                <span class="font-bold text-lg">{{ session('nomor_tiket') }}</span>
            </p>
            <p class="text-xs mt-1 text-green-600">⚠️ Simpan nomor tiket ini untuk mengecek status pengaduan!</p>
        </div>
    @endif

    {{-- Form cek tiket --}}
    <form action="{{ route('pengaduan.hasil') }}" method="POST"
          class="bg-white rounded-xl shadow p-6 mb-6">
        @csrf
        <label class="block text-sm font-medium mb-2">Masukkan Nomor Tiket</label>
        <div class="flex gap-2">
            <input type="text" name="nomor_tiket"
                   class="flex-1 border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                   placeholder="Contoh: LPR-XXXXXXXX">
            <button type="submit"
                    class="bg-green-700 text-white px-4 py-2 rounded-lg hover:bg-green-800">
                Cek
            </button>
        </div>
    </form>

    {{-- Hasil --}}
    @if(isset($pengaduan))
        @if($pengaduan)
            <div class="bg-white rounded-xl shadow p-6">
                <div class="flex justify-between items-start mb-4">
                    <h2 class="font-bold text-lg">{{ $pengaduan->judul }}</h2>
                    <span class="text-sm px-3 py-1 rounded-full font-medium
                        {{ $pengaduan->status == 'masuk' ? 'bg-gray-100 text-gray-600' : '' }}
                        {{ $pengaduan->status == 'diproses' ? 'bg-yellow-100 text-yellow-700' : '' }}
                        {{ $pengaduan->status == 'selesai' ? 'bg-green-100 text-green-700' : '' }}">
                        {{ ucfirst($pengaduan->status) }}
                    </span>
                </div>
                <p class="text-sm text-gray-500 mb-1">Kategori: {{ $pengaduan->kategori }}</p>
                <p class="text-sm text-gray-500 mb-3">Tanggal: {{ $pengaduan->created_at->format('d M Y') }}</p>
                <p class="text-gray-700 mb-4">{{ $pengaduan->deskripsi }}</p>

                @if($pengaduan->balasan)
                    <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                        <p class="text-sm font-semibold text-green-700 mb-1">💬 Balasan dari Desa:</p>
                        <p class="text-sm text-gray-700">{{ $pengaduan->balasan }}</p>
                    </div>
                @endif
            </div>
        @else
            <div class="bg-red-50 text-red-600 p-4 rounded-lg text-sm">
                Nomor tiket tidak ditemukan. Pastikan nomor tiket yang Anda masukkan benar.
            </div>
        @endif
    @endif

</div>

@endsection
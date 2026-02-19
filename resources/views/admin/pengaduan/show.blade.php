@extends('layouts.admin')

@section('content')

<div class="max-w-2xl mx-auto">
    <div class="flex items-center gap-3 mb-6">
        <a href="{{ route('admin.pengaduan.index') }}" class="text-green-700 hover:underline text-sm">← Kembali</a>
        <h1 class="text-2xl font-bold text-green-700">Detail Pengaduan</h1>
    </div>

    <div class="bg-white rounded-xl shadow p-6 mb-6">
        <div class="flex justify-between items-start mb-4">
            <div>
                <p class="text-xs text-gray-400 font-mono">{{ $pengaduan->nomor_tiket }}</p>
                <h2 class="text-xl font-bold mt-1">{{ $pengaduan->judul }}</h2>
            </div>
            <span class="px-3 py-1 rounded-full text-sm font-medium
                {{ $pengaduan->status == 'masuk' ? 'bg-gray-100 text-gray-600' : '' }}
                {{ $pengaduan->status == 'diproses' ? 'bg-yellow-100 text-yellow-700' : '' }}
                {{ $pengaduan->status == 'selesai' ? 'bg-green-100 text-green-700' : '' }}">
                {{ ucfirst($pengaduan->status) }}
            </span>
        </div>

        <div class="grid grid-cols-2 gap-4 text-sm text-gray-600 mb-4">
            <div>
                <p class="font-medium text-gray-700">Nama Pelapor</p>
                <p>{{ $pengaduan->nama }}</p>
            </div>
            <div>
                <p class="font-medium text-gray-700">No. HP</p>
                <p>{{ $pengaduan->no_hp }}</p>
            </div>
            <div>
                <p class="font-medium text-gray-700">Kategori</p>
                <p>{{ $pengaduan->kategori }}</p>
            </div>
            <div>
                <p class="font-medium text-gray-700">Tanggal</p>
                <p>{{ $pengaduan->created_at->format('d M Y, H:i') }}</p>
            </div>
        </div>

        <div class="mb-4">
            <p class="font-medium text-gray-700 mb-1">Deskripsi</p>
            <p class="text-gray-600 leading-relaxed">{{ $pengaduan->deskripsi }}</p>
        </div>

        @if($pengaduan->foto)
        <div class="mb-4">
            <p class="font-medium text-gray-700 mb-1">Foto</p>
            <img src="{{ asset('storage/' . $pengaduan->foto) }}" 
                 class="rounded-lg max-w-sm border" alt="Foto pengaduan">
        </div>
        @endif
    </div>

    {{-- Form Balas --}}
    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="font-bold text-lg mb-4">Tindak Lanjut</h2>
        <form action="{{ route('admin.pengaduan.balas', $pengaduan->id) }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium mb-1">Update Status</label>
                <select name="status" class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                    <option value="masuk" {{ $pengaduan->status == 'masuk' ? 'selected' : '' }}>Masuk</option>
                    <option value="diproses" {{ $pengaduan->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                    <option value="selesai" {{ $pengaduan->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Balasan / Keterangan</label>
                <textarea name="balasan" rows="4"
                          class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                          placeholder="Tulis balasan atau keterangan tindak lanjut...">{{ $pengaduan->balasan }}</textarea>
            </div>
            <button type="submit" class="w-full bg-green-700 text-white font-semibold py-2 rounded-lg hover:bg-green-800">
                Simpan
            </button>
        </form>
    </div>
</div>

@endsection
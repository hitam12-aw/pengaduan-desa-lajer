@extends('layouts.admin')

@section('content')

<h1 class="text-2xl font-bold text-green-700 mb-6">Dashboard</h1>

{{-- Statistik --}}
<div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
    <div class="bg-white rounded-xl shadow p-5 text-center">
        <p class="text-3xl font-bold text-green-700">{{ $totalPengaduan }}</p>
        <p class="text-sm text-gray-500 mt-1">Total Pengaduan</p>
    </div>
    <div class="bg-white rounded-xl shadow p-5 text-center">
        <p class="text-3xl font-bold text-gray-500">{{ $totalMasuk }}</p>
        <p class="text-sm text-gray-500 mt-1">Belum Diproses</p>
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

{{-- Pengaduan Terbaru --}}
<div class="bg-white rounded-xl shadow p-6 mb-8 overflow-x-auto">
    <div class="flex justify-between items-center mb-4">
        <h2 class="font-bold text-lg">Pengaduan Terbaru</h2>
        <a href="{{ route('admin.pengaduan.index') }}" class="text-sm text-green-700 hover:underline">Lihat Semua</a>
    </div>
    <table class="w-full text-sm min-w-[600px]">
        <thead>
            <tr class="text-left text-gray-500 border-b">
                <th class="pb-2">No. Tiket</th>
                <th class="pb-2">Nama</th>
                <th class="pb-2">Judul</th>
                <th class="pb-2">Kategori</th>
                <th class="pb-2">Status</th>
                <th class="pb-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pengaduanTerbaru as $item)
            <tr class="border-b hover:bg-gray-50">
                <td class="py-2 font-mono text-xs">{{ $item->nomor_tiket }}</td>
                <td class="py-2">{{ $item->nama }}</td>
                <td class="py-2">{{ Str::limit($item->judul, 30) }}</td>
                <td class="py-2">{{ $item->kategori }}</td>
                <td class="py-2">
                    <span class="px-2 py-1 rounded-full text-xs font-medium
                        {{ $item->status == 'masuk' ? 'bg-gray-100 text-gray-600' : '' }}
                        {{ $item->status == 'diproses' ? 'bg-yellow-100 text-yellow-700' : '' }}
                        {{ $item->status == 'selesai' ? 'bg-green-100 text-green-700' : '' }}">
                        {{ ucfirst($item->status) }}
                    </span>
                </td>
                <td class="py-2">
                    <a href="{{ route('admin.pengaduan.show', $item->id) }}" 
                       class="text-green-700 hover:underline text-xs">Detail</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="py-4 text-center text-gray-400">Belum ada pengaduan</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- Tambah Pengumuman --}}
<div class="bg-white rounded-xl shadow p-6">
    <h2 class="font-bold text-lg mb-4">📢 Tambah Pengumuman</h2>
    <form action="{{ route('admin.pengumuman.store') }}" method="POST" class="space-y-3">
        @csrf
        <div>
            <label class="block text-sm font-medium mb-1">Judul Pengumuman</label>
            <input type="text" name="judul" 
                   class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                   placeholder="Masukkan judul pengumuman">
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Isi Pengumuman</label>
            <textarea name="isi" rows="3"
                      class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                      placeholder="Tulis isi pengumuman..."></textarea>
        </div>
        <button type="submit" class="bg-green-700 text-white px-4 py-2 rounded-lg hover:bg-green-800 text-sm">
            Tambah Pengumuman
        </button>
    </form>
</div>

@endsection
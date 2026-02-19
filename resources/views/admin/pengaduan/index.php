@extends('layouts.admin')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-green-700">Semua Pengaduan</h1>
</div>

{{-- Filter Status --}}
<div class="bg-white rounded-xl shadow p-4 mb-6">
    <form action="{{ route('admin.pengaduan.index') }}" method="GET" class="flex gap-2 flex-wrap">
        <a href="{{ route('admin.pengaduan.index') }}"
           class="px-4 py-2 rounded-lg text-sm font-medium {{ !request('status') || request('status') == 'semua' ? 'bg-green-700 text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
            Semua
        </a>
        <a href="{{ route('admin.pengaduan.index', ['status' => 'masuk']) }}"
           class="px-4 py-2 rounded-lg text-sm font-medium {{ request('status') == 'masuk' ? 'bg-gray-600 text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
            Masuk
        </a>
        <a href="{{ route('admin.pengaduan.index', ['status' => 'diproses']) }}"
           class="px-4 py-2 rounded-lg text-sm font-medium {{ request('status') == 'diproses' ? 'bg-yellow-500 text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
            Diproses
        </a>
        <a href="{{ route('admin.pengaduan.index', ['status' => 'selesai']) }}"
           class="px-4 py-2 rounded-lg text-sm font-medium {{ request('status') == 'selesai' ? 'bg-blue-500 text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
            Selesai
        </a>
    </form>
</div>

{{-- Tabel --}}
<div class="bg-white rounded-xl shadow p-6">
    <table class="w-full text-sm">
        <thead>
            <tr class="text-left text-gray-500 border-b">
                <th class="pb-2">No. Tiket</th>
                <th class="pb-2">Nama</th>
                <th class="pb-2">Judul</th>
                <th class="pb-2">Kategori</th>
                <th class="pb-2">Tanggal</th>
                <th class="pb-2">Status</th>
                <th class="pb-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pengaduan as $item)
            <tr class="border-b hover:bg-gray-50">
                <td class="py-2 font-mono text-xs">{{ $item->nomor_tiket }}</td>
                <td class="py-2">{{ $item->nama }}</td>
                <td class="py-2">{{ Str::limit($item->judul, 30) }}</td>
                <td class="py-2">{{ $item->kategori }}</td>
                <td class="py-2">{{ $item->created_at->format('d M Y') }}</td>
                <td class="py-2">
                    <span class="px-2 py-1 rounded-full text-xs font-medium
                        {{ $item->status == 'masuk' ? 'bg-gray-100 text-gray-600' : '' }}
                        {{ $item->status == 'diproses' ? 'bg-yellow-100 text-yellow-700' : '' }}
                        {{ $item->status == 'selesai' ? 'bg-green-100 text-green-700' : '' }}">
                        {{ ucfirst($item->status) }}
                    </span>
                </td>
                <td class="py-2 flex gap-2">
                    <a href="{{ route('admin.pengaduan.show', $item->id) }}" 
                       class="text-green-700 hover:underline text-xs">Detail</a>
                    
                    <form action="{{ route('admin.pengaduan.destroy', $item->id) }}" method="POST"
                          onsubmit="return confirm('Yakin ingin menghapus pengaduan ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline text-xs">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="py-4 text-center text-gray-400">Belum ada pengaduan</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $pengaduan->links() }}
    </div>
</div>

@endsection
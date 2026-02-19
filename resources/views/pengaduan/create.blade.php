@extends('layouts.app')

@section('content')

<div class="max-w-2xl mx-auto">
    <h1 class="text-2xl font-bold text-green-700 mb-6">📝 Form Pengaduan</h1>

    @if($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-4">
            <ul class="list-disc list-inside text-sm">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pengaduan.store') }}" method="POST" enctype="multipart/form-data"
          class="bg-white rounded-xl shadow p-6 space-y-4">
        @csrf

        <div>
            <label class="block text-sm font-medium mb-1">Nama Lengkap</label>
            <input type="text" name="nama" value="{{ old('nama') }}"
                   class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                   placeholder="Masukkan nama lengkap">
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">No. HP</label>
            <input type="text" name="no_hp" value="{{ old('no_hp') }}"
                   class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                   placeholder="Contoh: 08123456789">
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Kategori</label>
            <select name="kategori" class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                <option value="">-- Pilih Kategori --</option>
                <option value="Infrastruktur" {{ old('kategori') == 'Infrastruktur' ? 'selected' : '' }}>Infrastruktur</option>
                <option value="Kebersihan" {{ old('kategori') == 'Kebersihan' ? 'selected' : '' }}>Kebersihan</option>
                <option value="Keamanan" {{ old('kategori') == 'Keamanan' ? 'selected' : '' }}>Keamanan</option>
                <option value="Sosial" {{ old('kategori') == 'Sosial' ? 'selected' : '' }}>Sosial</option>
                <option value="Lainnya" {{ old('kategori') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Judul Pengaduan</label>
            <input type="text" name="judul" value="{{ old('judul') }}"
                   class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                   placeholder="Contoh: Jalan rusak di RT 03">
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Deskripsi</label>
            <textarea name="deskripsi" rows="4"
                      class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                      placeholder="Jelaskan pengaduan Anda secara detail...">{{ old('deskripsi') }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Foto (Opsional)</label>
            <input type="file" name="foto" accept="image/*"
                   class="w-full border rounded-lg px-3 py-2">
            <p class="text-xs text-gray-400 mt-1">Maks. 2MB. Format: JPG, PNG</p>
        </div>

        <button type="submit"
                class="w-full bg-green-700 text-white font-semibold py-2 rounded-lg hover:bg-green-800">
            Kirim Pengaduan
        </button>
    </form>
</div>

@endsection
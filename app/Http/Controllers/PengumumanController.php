<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function index()
    {
        $pengumuman = Pengumuman::latest()->take(5)->get();
        $totalPengaduan = Pengaduan::count();
        $totalSelesai = Pengaduan::where('status', 'selesai')->count();
        $totalProses = Pengaduan::where('status', 'diproses')->count();

        return view('home', compact('pengumuman', 'totalPengaduan', 'totalSelesai', 'totalProses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi'   => 'required|string',
        ]);

        Pengumuman::create($request->only('judul', 'isi'));

        return redirect()->back()->with('success', 'Pengumuman berhasil ditambahkan!');
    }
}
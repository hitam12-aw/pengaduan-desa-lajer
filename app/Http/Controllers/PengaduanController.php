<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PengaduanController extends Controller
{
    public function create()
    {
        return view('pengaduan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'      => 'required|string|max:255',
            'no_hp'     => 'required|string|max:15',
            'kategori'  => 'required|string',
            'judul'     => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'foto'      => 'nullable|image|max:2048',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('pengaduan', 'public');
        }

        $nomorTiket = 'LPR-' . strtoupper(Str::random(8));

        $pengaduan = Pengaduan::create([
            'nomor_tiket' => $nomorTiket,
            'nama'        => $request->nama,
            'no_hp'       => $request->no_hp,
            'kategori'    => $request->kategori,
            'judul'       => $request->judul,
            'deskripsi'   => $request->deskripsi,
            'foto'        => $fotoPath,
        ]);

        return redirect()->route('pengaduan.cek')->with([
            'success'      => 'Pengaduan berhasil dikirim!',
            'nomor_tiket'  => $nomorTiket,
        ]);
    }

    public function cek()
    {
        return view('pengaduan.cek');
    }

    public function hasil(Request $request)
    {
        $request->validate([
            'nomor_tiket' => 'required|string',
        ]);

        $pengaduan = Pengaduan::where('nomor_tiket', $request->nomor_tiket)->first();

        return view('pengaduan.cek', compact('pengaduan'));
    }
}
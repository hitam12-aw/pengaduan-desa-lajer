<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPengaduan = Pengaduan::count();
        $totalMasuk     = Pengaduan::where('status', 'masuk')->count();
        $totalProses    = Pengaduan::where('status', 'diproses')->count();
        $totalSelesai   = Pengaduan::where('status', 'selesai')->count();
        $pengaduanTerbaru = Pengaduan::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalPengaduan',
            'totalMasuk',
            'totalProses',
            'totalSelesai',
            'pengaduanTerbaru'
        ));
    }
}
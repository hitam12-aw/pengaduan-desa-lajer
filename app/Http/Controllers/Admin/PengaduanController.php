<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function index(Request $request)
    {
        $query = Pengaduan::latest();

        if ($request->status && $request->status != 'semua') {
            $query->where('status', $request->status);
        }

        $pengaduan = $query->paginate(10)->withQueryString();

        return view('admin.pengaduan.index', compact('pengaduan'));
    }

    public function show($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        return view('admin.pengaduan.show', compact('pengaduan'));
    }

    public function balas(Request $request, $id)
{
    $request->validate([
        'status'  => 'required|in:masuk,diproses,selesai',
        'balasan' => 'nullable|string',
    ]);

    $pengaduan = Pengaduan::findOrFail($id);
    $pengaduan->update([
        'status'  => $request->status,
        'balasan' => $request->balasan,
    ]);

    return redirect()->back()->with('success', 'Laporan berhasil diperbarui!');
}
    public function destroy($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);

        if ($pengaduan->foto) {
            \Storage::disk('public')->delete($pengaduan->foto);
        }

        $pengaduan->delete();

        return redirect()->route('admin.pengaduan.index')->with('success', 'Pengaduan berhasil dihapus!');
    }
}
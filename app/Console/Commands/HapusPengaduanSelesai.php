<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\Storage;

class HapusPengaduanSelesai extends Command
{
    protected $signature = 'pengaduan:hapus-selesai';
    protected $description = 'Hapus otomatis pengaduan yang sudah selesai lebih dari 1 hari';

    public function handle()
    {
        $pengaduan = Pengaduan::where('status', 'selesai')
            ->where('updated_at', '<=', now()->subDay())
            ->get();

        foreach ($pengaduan as $item) {
            if ($item->foto) {
                Storage::disk('public')->delete($item->foto);
            }
            $item->delete();
        }

        $this->info("Berhasil menghapus {$pengaduan->count()} pengaduan selesai.");
    }
}
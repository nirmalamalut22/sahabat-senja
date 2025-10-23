<?php

namespace App\Http\Controllers\Middleware;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // <--- ini penting!


class LaporanController extends Controller
{
    public function pemasukan()
    {
        $pemasukan = DB::table('pemasukan')
            ->select('tanggal', 'sumber', 'jumlah')
            ->orderBy('tanggal', 'desc')
            ->get();

        // Jika tabel kosong, tampilkan data dummy
        if ($pemasukan->isEmpty()) {
            $pemasukan = collect([
                (object)['tanggal' => '2025-10-01', 'sumber' => 'Donasi A', 'jumlah' => 1500000],
                (object)['tanggal' => '2025-10-05', 'sumber' => 'Donasi B', 'jumlah' => 2000000],
            ]);
        }

        return view('admin.laporan.laporan_pemasukan', compact('pemasukan'));
    }

    public function pengeluaran()
    {
        $pengeluaran = DB::table('pengeluaran')
            ->select('tanggal', 'keterangan', 'jumlah')
            ->orderBy('tanggal', 'desc')
            ->get();

        // Jika tabel kosong, tampilkan data dummy
        if ($pengeluaran->isEmpty()) {
            $pengeluaran = collect([
                (object)['tanggal' => '2025-10-03', 'keterangan' => 'Pembelian Obat', 'jumlah' => 500000],
                (object)['tanggal' => '2025-10-07', 'keterangan' => 'Makanan Lansia', 'jumlah' => 700000],
            ]);
        }

        return view('admin.laporan.laporan_pengeluaran', compact('pengeluaran'));
    }
}
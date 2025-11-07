<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Datalansia;
use App\Models\Dataperawat;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // Ambil jumlah dari tabel masing-masing
        $stats = [
            'total_lansia' => Datalansia::count(),
            'total_perawat' => Dataperawat::count(),
            'jadwal_hari_ini' => 0, // sementara, kalau nanti kamu punya tabel donasi/jadwal bisa ditambah di sini
        ];

        // Kirim data ke view dashboard
        return view('admin.dashboard', compact('stats'));
    }
}

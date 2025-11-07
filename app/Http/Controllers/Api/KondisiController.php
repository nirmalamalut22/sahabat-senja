<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kondisi;

class KondisiController extends Controller
{
    /**
     * Simpan data kondisi harian lansia
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_lansia' => 'required|exists:datalansia,id',
            'tanggal' => 'nullable|date', // boleh kosong, nanti otomatis diisi
            'tekanan_darah' => 'required|string|max:20',
            'nadi' => 'required|integer|min:30|max:200',
            'nafsu_makan' => 'required|string',
            'status_obat' => 'required|string',
            'catatan' => 'nullable|string',
            'status' => 'required|string',
        ]);

        // Jika tanggal tidak dikirim, isi otomatis dengan hari ini
        if (empty($validated['tanggal'])) {
            $validated['tanggal'] = now()->format('Y-m-d');
        }

        $kondisi = Kondisi::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Kondisi harian berhasil disimpan.',
            'data' => $kondisi,
        ], 201);
    }

    /**
     * Tampilkan semua kondisi milik satu lansia
     */
    public function show($id)
    {
        $data = Kondisi::where('id_lansia', $id)
            ->orderBy('tanggal', 'desc')
            ->get();

        if ($data->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Belum ada data kondisi untuk lansia ini.',
                'data' => [],
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $data,
        ]);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Datalansia;

class DatalansiaController extends Controller
{
    // 📋 Ambil semua data lansia
    public function index()
    {
        $data = Datalansia::all();
        return response()->json($data, 200);
    }

    // ➕ Tambah data lansia baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lansia' => 'required|string|max:255',
            'umur_lansia' => 'nullable|integer',
            'tempat_lahir_lansia' => 'nullable|string|max:255',
            'tanggal_lahir_lansia' => 'required|date',
            'jenis_kelamin_lansia' => 'nullable|string|max:50',
            'gol_darah_lansia' => 'nullable|string|max:5',
            'riwayat_penyakit_lansia' => 'nullable|string',
            'alergi_lansia' => 'nullable|string',
            'obat_rutin_lansia' => 'nullable|string',
            'nama_anak' => 'nullable|string|max:255',
            'alamat_lengkap' => 'nullable|string',
            'no_hp_anak' => 'nullable|string|max:20',
            'email_anak' => 'nullable|email|max:255',
        ]);

        $data = Datalansia::create($validated);
        return response()->json([
            'message' => 'Data lansia berhasil ditambahkan',
            'data' => $data
        ], 201);
    }

    // 🔍 Lihat detail data lansia berdasarkan ID
    public function show($id)
    {
        $data = Datalansia::find($id);
        if (!$data) {
            return response()->json(['message' => 'Data lansia tidak ditemukan'], 404);
        }
        return response()->json($data, 200);
    }

    // ✏️ Update data lansia
    public function update(Request $request, $id)
    {
        $data = Datalansia::find($id);
        if (!$data) {
            return response()->json(['message' => 'Data lansia tidak ditemukan'], 404);
        }

        $validated = $request->validate([
            'nama_lansia' => 'required|string|max:255',
            'umur_lansia' => 'nullable|integer',
            'tempat_lahir_lansia' => 'nullable|string|max:255',
            'tanggal_lahir_lansia' => 'required|date',
            'jenis_kelamin_lansia' => 'nullable|string|max:50',
            'gol_darah_lansia' => 'nullable|string|max:5',
            'riwayat_penyakit_lansia' => 'nullable|string',
            'alergi_lansia' => 'nullable|string',
            'obat_rutin_lansia' => 'nullable|string',
            'nama_anak' => 'nullable|string|max:255',
            'alamat_lengkap' => 'nullable|string',
            'no_hp_anak' => 'nullable|string|max:20',
            'email_anak' => 'nullable|email|max:255',
        ]);

        $data->update($validated);
        return response()->json([
            'message' => 'Data lansia berhasil diperbarui',
            'data' => $data
        ], 200);
    }

    // 🗑️ Hapus data lansia
    public function destroy($id)
    {
        $data = Datalansia::find($id);
        if (!$data) {
            return response()->json(['message' => 'Data lansia tidak ditemukan'], 404);
        }

        $data->delete();
        return response()->json(['message' => 'Data lansia berhasil dihapus'], 200);
    }
}

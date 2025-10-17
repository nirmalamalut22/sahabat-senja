<?php

namespace App\Http\Controllers;

use App\Models\Dataperawat;
use Illuminate\Http\Request;

class DataperawatController extends Controller
{
    public function index(Request $request)
    {
        // Ambil nilai keyword dari input pencarian (GET)
        $keyword = $request->get('search');

        // Query pencarian
        $dataperawat = Dataperawat::when($keyword, function ($query, $keyword) {
            return $query->where('nama', 'like', "%{$keyword}%");
        })->paginate(10);

        // Kirim data ke view
        return view('admin.dataperawat.index', compact('dataperawat', 'keyword'));
    }

    public function create()
    {
        return view('admin.dataperawat.tambah');
    }

    public function store(Request $request)
    {
        Dataperawat::create($request->all());
        return redirect()->route('admin.dataperawat.index')->with('success', 'Data perawat berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $dataperawat = Dataperawat::findOrFail($id);
        return view('admin.dataperawat.edit', compact('dataperawat'));
    }

    public function update(Request $request, $id)
    {
        $dataperawat = Dataperawat::findOrFail($id);
        $dataperawat->update($request->all());
        return redirect()->route('admin.dataperawat.index')->with('success', 'Data perawat berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $dataperawat = Dataperawat::findOrFail($id);
        $dataperawat->delete();
        return redirect()->route('admin.dataperawat.index')->with('success', 'Data perawat berhasil dihapus!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Datalansia;
use Illuminate\Http\Request;

class DatalansiaController extends Controller
{
    public function index(Request $request)
    {
        // Ambil nilai keyword dari input pencarian (GET)
        $keyword = $request->get('search');

        // Query pencarian
        $datalansia = Datalansia::when($keyword, function ($query, $keyword) {
            return $query->where('nama_lansia', 'like', "%{$keyword}%");
        })->paginate(10);

        // Kirim data ke view
        return view('admin.datalansia.index', compact('datalansia', 'keyword'));
    }

    public function create()
    {
        return view('admin.datalansia.tambah');
    }

    public function store(Request $request)
    {
        Datalansia::create($request->all());
        return redirect()->route('admin.datalansia.index')->with('success', 'Data lansia berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $datalansia = Datalansia::findOrFail($id);
        return view('admin.datalansia.edit', compact('datalansia'));
    }

    public function update(Request $request, $id)
    {
        $datalansia = Datalansia::findOrFail($id);
        $datalansia->update($request->all());
        return redirect()->route('admin.datalansia.index')->with('success', 'Data lansia berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $datalansia = Datalansia::findOrFail($id);
        $datalansia->delete();
        return redirect()->route('admin.datalansia.index')->with('success', 'Data lansia berhasil dihapus!');
    }
}

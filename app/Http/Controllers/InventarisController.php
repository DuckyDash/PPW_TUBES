<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use Illuminate\Http\Request;

class InventarisController extends Controller
{
    public function index()
    {
        $inventaris = Inventaris::orderBy('created_at', 'desc')->get();
        return view('inventaris', compact('inventaris'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_barang' => 'required|unique:inventaris,nomor_barang',
            'nama_barang'  => 'required|string|max:255',
            'kondisi'      => 'required|string',
            'pemilik'      => 'required|string',
            'jumlah'       => 'required|numeric|min:1',
            'keterangan'   => 'nullable|string',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')
                ->store('inventaris', 'public');
        }

        Inventaris::create($validated);

        return redirect()->back()
            ->with('success', 'Data inventaris berhasil ditambahkan');
    }

    public function show($id)
    {
        $inventaris = Inventaris::findOrFail($id);
        return view('inventaris.detail', compact('inventaris'));
    }
}

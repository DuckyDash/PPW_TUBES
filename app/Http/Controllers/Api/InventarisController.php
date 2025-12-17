<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Pastikan Model Inventaris sudah ada. Jika belum, buat dulu.
use App\Models\Inventaris; 
use Illuminate\Support\Facades\Validator;

class InventarisController extends Controller
{
    // GET: List Semua Inventaris
    public function index()
    {
        // Pastikan model Inventaris ada, atau ganti sesuai nama model kamu
        $data = Inventaris::latest()->get(); 

        return response()->json([
            'success' => true,
            'message' => 'List Data Inventaris',
            'data'    => $data
        ], 200);
    }

    // POST: Tambah Inventaris
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_barang' => 'required',
            'jumlah'      => 'required|numeric',
            // sesuaikan dengan kolom tabel kamu
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $inventaris = Inventaris::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Inventaris Berhasil Disimpan',
            'data'    => $inventaris
        ], 201);
    }

    // GET: Detail
    public function show($id)
    {
        $inventaris = Inventaris::find($id);

        if ($inventaris) {
            return response()->json([
                'success' => true,
                'message' => 'Detail Inventaris',
                'data'    => $inventaris
            ], 200);
        }

        return response()->json(['message' => 'Data tidak ditemukan'], 404);
    }

    // PUT: Update
    public function update(Request $request, $id)
    {
        $inventaris = Inventaris::find($id);

        if ($inventaris) {
            $inventaris->update($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Inventaris Berhasil Diupdate',
                'data'    => $inventaris
            ], 200);
        }

        return response()->json(['message' => 'Data tidak ditemukan'], 404);
    }

    // DELETE: Hapus
    public function destroy($id)
    {
        $inventaris = Inventaris::find($id);

        if ($inventaris) {
            $inventaris->delete();
            return response()->json([
                'success' => true,
                'message' => 'Inventaris Berhasil Dihapus',
            ], 200);
        }

        return response()->json(['message' => 'Data tidak ditemukan'], 404);
    }
}
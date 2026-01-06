<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kolam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KolamController extends Controller
{
    // 1. GET: Ambil Semua Data Kolam
    public function index(Request $request)
    {
        $user = $request->user();

        if ($user->role === 'admin') {
            $kolams = Kolam::latest()->get();
        } else {
            $kolams = Kolam::where('pemilik', $user->name)
                        ->latest()
                        ->get();
        }

        return response()->json([
            'success' => true,
            'data' => $kolams
        ]);
    }


    // 2. POST: Tambah Data Kolam Baru
    public function store(Request $request)
    {
        // Validasi Input dari Android
        $validator = Validator::make($request->all(), [
            'nama_kolam' => 'required',
            'jenis_ikan' => 'required',
            'suhu_air'   => 'required|numeric',
            'ph_air'     => 'required|numeric',
            'pemilik'    => 'required', // Di Android harus dikirim manual jika belum ada token login
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi Gagal',
                'errors'  => $validator->errors()
            ], 422);
        }

        // Simpan Data
        $kolam = Kolam::create([
            'nama_kolam'   => $request->nama_kolam,
            'jenis_ikan'   => $request->jenis_ikan,
            'suhu_air'     => $request->suhu_air,
            'ph_air'       => $request->ph_air,
            'status_pakan' => $request->status_pakan ?? 'Belum Diberikan',
            'pemilik'      => $request->pemilik,
            'status'       => $request->status ?? 'Aktif',
        ]);

        if($kolam) {
            return response()->json([
                'success' => true,
                'message' => 'Kolam Berhasil Disimpan',
                'data'    => $kolam
            ], 201);
        }

        return response()->json([
            'success' => false,
            'message' => 'Kolam Gagal Disimpan',
        ], 409);
    }

    // 3. GET: Ambil Detail 1 Kolam
    public function show($id)
    {
        $kolam = Kolam::find($id);

        if ($kolam) {
            return response()->json([
                'success' => true,
                'message' => 'Detail Data Kolam',
                'data'    => $kolam
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Data Kolam Tidak Ditemukan',
        ], 404);
    }

    // 4. PUT: Update Data Kolam
    public function update(Request $request, $id)
    {
        $kolam = Kolam::find($id);

        if($kolam) {
            // Validasi (Boleh kosong/nullable jika hanya update sebagian)
            $validator = Validator::make($request->all(), [
                'nama_kolam' => 'required',
                'jenis_ikan' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }

            $kolam->update([
                'nama_kolam'   => $request->nama_kolam,
                'jenis_ikan'   => $request->jenis_ikan,
                'suhu_air'     => $request->suhu_air,
                'ph_air'       => $request->ph_air,
                'status_pakan' => $request->status_pakan,
                'status'       => $request->status,
                // Pemilik biasanya tidak diubah
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Data Kolam Berhasil Diupdate',
                'data'    => $kolam
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Data Tidak Ditemukan',
        ], 404);
    }

    // 5. DELETE: Hapus Data Kolam
    public function destroy($id)
    {
        $kolam = Kolam::find($id);

        if($kolam) {
            $kolam->delete();
            return response()->json([
                'success' => true,
                'message' => 'Data Kolam Berhasil Dihapus',
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Data Tidak Ditemukan',
        ], 404);
    }
}
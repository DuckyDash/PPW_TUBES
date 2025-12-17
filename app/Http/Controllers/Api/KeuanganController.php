<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Keuangan;
use Illuminate\Http\Request;

class KeuanganController extends Controller
{
    public function index()
    {
        $data = Keuangan::latest()->get();

        $saldo = Keuangan::where('tipe', 'Pemasukan')->sum('nominal')
               - Keuangan::where('tipe', 'Pengeluaran')->sum('nominal');

        return response()->json([
            'saldo' => $saldo,
            'data'  => $data
        ]);
    }

    public function store(Request $request)
    {
        $data = Keuangan::create($request->all());

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }
}

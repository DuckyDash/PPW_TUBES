<?php

namespace App\Http\Controllers;

use App\Models\Keuangan;
use Illuminate\Http\Request;

class KeuanganController extends Controller
{
    public function index()
    {
        $transaksis = Keuangan::orderBy('tanggal', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();

        $totalMasuk = $transaksis
            ->where('tipe', 'Pemasukan')
            ->sum('nominal');

        $totalKeluar = $transaksis
            ->where('tipe', 'Pengeluaran')
            ->sum('nominal');

        $saldo = $totalMasuk - $totalKeluar;

        $lastTransaksi = $transaksis->first();

        if (!$lastTransaksi) {
            $lastTransaksi = (object) [
                'tipe'           => null,
                'nominal'        => 0,
                'tanggal'        => null,
                'nama_transaksi' => 'Tidak ada transaksi'
            ];
        }

        return view('keuangan', compact(
            'transaksis',
            'saldo',
            'lastTransaksi'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_transaksi' => 'required|unique:keuangans,nomor_transaksi',
            'nama_transaksi'  => 'required|string|max:255',
            'tanggal'         => 'required|date',
            'tipe'            => 'required|in:Pemasukan,Pengeluaran',
            'nominal'         => 'required|numeric|min:0',
            'keterangan'      => 'nullable|string',
        ]);

        Keuangan::create($validated + [
            'status' => 'Selesai'
        ]);

        return redirect()
            ->route('keuangan.index')
            ->with('success', 'Transaksi berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = Keuangan::findOrFail($id);
        return view('keuangan_detail', compact('data'));
    }
}

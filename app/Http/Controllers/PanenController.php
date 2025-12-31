<?php
namespace App\Http\Controllers;

use App\Models\Panen;
use App\Models\Kolam;
use App\Models\Keuangan; // Asumsi ada model Keuangan
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PanenController extends Controller
{
    // --- FITUR USER ---

    // Halaman List Panen User
    public function userIndex()
    {
        $panens = Panen::where('user_id', Auth::id())->latest()->get();
        return view('panen.user_index', compact('panens'));
    }

    // Proses Ajukan Panen (Dari Modal di Data Kolam)
    public function store(Request $request)
    {
        $request->validate([
            'kolam_id' => 'required',
            'berat_panen' => 'required|numeric',
        ]);

        $kolam = Kolam::findOrFail($request->kolam_id);

        Panen::create([
            'kolam_id' => $kolam->id,
            'user_id' => Auth::id(),
            'pemilik' => $kolam->pemilik,
            'jenis_ikan' => $kolam->jenis_ikan,
            'berat_bibit' => $kolam->berat_bibit,
            'berat_panen' => $request->berat_panen,
            'status' => 'Menunggu Verifikasi'
        ]);

        $kolam->update([
            'status' => 'Tidak Aktif'
        ]);

        return redirect()->back()->with('success', 'Pengajuan panen berhasil dikirim!');
    }

    // --- FITUR ADMIN ---

    // Halaman List Panen Admin
    public function adminIndex()
    {
        $panens = Panen::latest()->get();
        return view('panen.admin_index', compact('panens'));
    }

    // Proses Verifikasi Admin (Input Harga)
    public function verify(Request $request, $id)
    {
        $panen = Panen::findOrFail($id);
        
        $request->validate(['harga_per_kilo' => 'required|numeric']);
        
        $total = $panen->berat_panen * $request->harga_per_kilo;

        $panen->update([
            'harga_per_kilo' => $request->harga_per_kilo,
            'total_harga' => $total,
            'status' => 'Disetujui'
        ]);

        return redirect()->back()->with('success', 'Panen disetujui, harga ditetapkan.');
    }

    public function markAsSold($id)
    {
        $panen = Panen::findOrFail($id);

        if ($panen->status === 'Terjual') {
            return redirect()->back()->with('info', 'Panen sudah ditandai terjual.');
        }

        $panen->update([
            'status' => 'Terjual'
        ]);

        Keuangan::create([
            'nomor_transaksi' => 'TRX-' . date('Ymd') . '-' . strtoupper(Str::random(6)),
            'nama_transaksi' => 'Penjualan Panen',
            'tanggal' => now()->toDateString(),
            'tipe' => 'Pemasukan',
            'nominal' => (int) $panen->total_harga,
            'status' => 'Selesai',
            'keterangan' => 
                'Penjualan panen ' . $panen->jenis_ikan .
                ' milik ' . $panen->pemilik .
                ' (' . $panen->berat_panen . ' Kg)'
        ]);

        return redirect()->back()->with('success', 'Panen berhasil ditandai terjual dan masuk ke keuangan.');
    }
}
<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kolam;
use App\Models\SensorReading; // Pastikan model SensorReading ada
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Ambil Data Sensor Terakhir (Sama seperti Web)
        // Gunakan 0 jika data tidak ditemukan (biar gak error null)
        $suhu = SensorReading::where('sensor_type', 'suhu')->latest()->value('value') ?? 0;
        $ph = SensorReading::where('sensor_type', 'ph')->latest()->value('value') ?? 0;
        $oksigen = SensorReading::where('sensor_type', 'oksigen')->latest()->value('value') ?? 0;

        // 2. Ambil Data Ikan untuk Pie Chart
        $user = Auth::user();
        $query = Kolam::where('status', 'Aktif');

        // Jika bukan admin, hanya ambil kolam miliknya sendiri
        if ($user->role !== 'admin') {
            $query->where('pemilik', $user->name);
        }

        // Hitung jumlah kolam per jenis ikan
        $ikanAktif = $query
            ->selectRaw('jenis_ikan, count(*) as total')
            ->groupBy('jenis_ikan')
            ->get();

        return response()->json([
            'success' => true,
            'data' => [
                'sensor' => [
                    'suhu' => $suhu,
                    'ph' => $ph,
                    'oksigen' => $oksigen,
                ],
                'pie_chart' => $ikanAktif // Ini yang akan dipakai Pie Chart Flutter
            ]
        ]);
    }
}
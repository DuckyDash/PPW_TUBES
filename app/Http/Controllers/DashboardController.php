<?php

namespace App\Http\Controllers;

use App\Models\Kolam;
use App\Models\SensorReading;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $suhu = SensorReading::where('sensor_type', 'suhu')->latest()->value('value') ?? 0;
        $ph = SensorReading::where('sensor_type', 'ph')->latest()->value('value') ?? 0;
        $oksigen = SensorReading::where('sensor_type', 'oksigen')->latest()->value('value') ?? 0;

        $query = Kolam::where('status', 'Aktif');

        if (Auth::user()->role !== 'admin') {
            $query->where('pemilik', Auth::user()->name);
        }

        $ikanAktif = $query
            ->selectRaw('jenis_ikan, count(*) as total')
            ->groupBy('jenis_ikan')
            ->get();

        $fishLabels = $ikanAktif->pluck('jenis_ikan');
        $fishData   = $ikanAktif->pluck('total');

        return view('dashboard', compact(
            'suhu',
            'ph',
            'oksigen',
            'fishLabels',
            'fishData'
        ));
    }
}

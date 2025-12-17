<?php

namespace App\Http\Controllers;

use App\Models\SensorReading;

class DashboardController extends Controller
{
    public function index()
    {
        $suhu = SensorReading::where('sensor_type', 'suhu')->latest()->value('value') ?? 0;
        $ph = SensorReading::where('sensor_type', 'ph')->latest()->value('value') ?? 0;
        $oksigen = SensorReading::where('sensor_type', 'oksigen')->latest()->value('value') ?? 0;

        return view('dashboard', compact('suhu', 'ph', 'oksigen'));
    }
}

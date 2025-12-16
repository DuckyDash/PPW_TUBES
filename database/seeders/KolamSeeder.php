<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kolam;

class KolamSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_kolam' => 'Kolam Lele A1',
                'jenis_ikan' => 'Lele',
                'suhu_air' => 28.5,
                'ph_air' => 7.2,
                'status_pakan' => 'Diberikan',
                'pemilik' => 'Pak Darto',
                'status' => 'Aktif'
            ],
            [
                'nama_kolam' => 'Kolam Nila B2',
                'jenis_ikan' => 'Nila',
                'suhu_air' => 26.0,
                'ph_air' => 6.8,
                'status_pakan' => 'Belum Diberikan',
                'pemilik' => 'Bu Susi',
                'status' => 'Dalam Perawatan'
            ],
            [
                'nama_kolam' => 'Kolam Patin C3',
                'jenis_ikan' => 'Patin',
                'suhu_air' => 29.0,
                'ph_air' => 7.5,
                'status_pakan' => 'Diberikan',
                'pemilik' => 'Pak Budi',
                'status' => 'Tidak Aktif'
            ],
        ];

        foreach ($data as $d) {
            Kolam::create($d);
        }
    }
}

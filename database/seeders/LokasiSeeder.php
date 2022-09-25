<?php

namespace Database\Seeders;

use App\Models\Lokasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LokasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lokasi::create([
            "lat" => '-1.1412593412566838',
            'lng' => '116.86864968546406',
            'kota' => "Balikpapan"
        ]);
        Lokasi::create([
            "lat" => '-1.143699972630494',
            'lng' => '116.86718912956557',
            'kota' => "Balikpapan"
        ]);
    }
}

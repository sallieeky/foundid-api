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
            'kota' => "Kota Balikpapan"
        ]);
        Lokasi::create([
            "lat" => '-1.143699972630494',
            'lng' => '116.86718912956557',
            'kota' => "Kota Balikpapan"
        ]);
        Lokasi::create([
            "lat" => '-1.2438528697696989',
            'lng' => '116.87202828830455',
            'kota' => "Kota Balikpapan"
        ]);
        Lokasi::create([
            "lat" => '-1.2623773698559866',
            'lng' => '116.88828738495458',
            'kota' => "Kota Balikpapan"
        ]);
        Lokasi::create([
            "lat" => '-7.961111271196175',
            'lng' => '112.61666239121493',
            'kota' => "Kota Malang"
        ]);
        Lokasi::create([
            "lat" => '-7.951586267656653',
            'lng' => '112.60670089183674',
            'kota' => "Kota Malang"
        ]);
    }
}

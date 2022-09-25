<?php

namespace Database\Seeders;

use App\Models\Kategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kategory::create([
            "nama" => "Smartphone",
            "icon" => "cellphone"
        ]);
        Kategory::create([
            "nama" => "Laptop",
            "icon" => "laptop"
        ]);
        Kategory::create([
            "nama" => "Kendaraan",
            "icon" => "car"
        ]);
        Kategory::create([
            "nama" => "Kamera",
            "icon" => "camera"
        ]);
        Kategory::create([
            "nama" => "Peliharaan",
            "icon" => "cat"
        ]);
        Kategory::create([
            "nama" => "Aksesoris",
            "icon" => "ring"
        ]);
        Kategory::create([
            "nama" => "Kunci",
            "icon" => "key-chain-variant"
        ]);
    }
}

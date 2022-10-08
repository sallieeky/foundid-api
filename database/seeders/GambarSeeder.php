<?php

namespace Database\Seeders;

use App\Models\Gambar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GambarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gambar::create([
            "item_id" => 1,
            "nama" => "redmi9.jpg",
            "tipe" => 'jpg',
            "size" => '100',
        ]);
        Gambar::create([
            "item_id" => 2,
            "nama" => "kucing.jpg",
            "tipe" => 'jpg',
            "size" => '100',
        ]);
        Gambar::create([
            "item_id" => 3,
            "nama" => "laptop_asus.jpg",
            "tipe" => 'jpg',
            "size" => '100',
        ]);
        Gambar::create([
            "item_id" => 4,
            "nama" => "kunci_mobil.jpg",
            "tipe" => 'jpg',
            "size" => '100',
        ]);
        Gambar::create([
            "item_id" => 5,
            "nama" => "asus_e203m.jpg",
            "tipe" => 'jpg',
            "size" => '100',
        ]);
        Gambar::create([
            "item_id" => 6,
            "nama" => "anjing_husky.jpg",
            "tipe" => 'jpg',
            "size" => '100',
        ]);
    }
}

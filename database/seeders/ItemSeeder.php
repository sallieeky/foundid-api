<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Item::create([
            'user_id' => 1,
            'kategory_id' => 1,
            'lokasi_id' => 1,
            'nama' => "Xiaomi Redmi 9",
            'gambar' => "redmi9.jpg",
            'deskripsi' => "Lawdjiadj ioawdjaojd awdjaowdj aowdjaojda wdjoajwd fsfsfs"
        ]);

        Item::create([
            'user_id' => 1,
            'kategory_id' => 5,
            'lokasi_id' => 2,
            'nama' => "Kucing Persia",
            'gambar' => "kucing.jpg",
            'deskripsi' => "Lawdjiadj ioawdjaojd awdjaowdj aowdjaojda wdjoajwd fsfsfs"
        ]);

        Item::create([
            'user_id' => 2,
            'kategory_id' => 2,
            'lokasi_id' => 3,
            'nama' => "Laptop Asus Lama",
            'gambar' => "laptop_asus.jpg",
            'deskripsi' => "Lawdjiadj ioawdjaojd awdjaowdj aowdjaojda wdjoajwd fsfsfs"
        ]);

        Item::create([
            'user_id' => 2,
            'kategory_id' => 7,
            'lokasi_id' => 4,
            'nama' => "Kunci Mobil Toyota",
            'gambar' => "kunci_mobil.jpg",
            'deskripsi' => "Lawdjiadj ioawdjaojd awdjaowdj aowdjaojda wdjoajwd fsfsfs"
        ]);

        Item::create([
            'user_id' => 2,
            'kategory_id' => 2,
            'lokasi_id' => 5,
            'nama' => "Laptop Asus E203M",
            'gambar' => "asus_e203m.jpg",
            'deskripsi' => "Lawdjiadj ioawdjaojd awdjaowdj aowdjaojda wdjoajwd fsfsfs"
        ]);

        Item::create([
            'user_id' => 1,
            'kategory_id' => 5,
            'lokasi_id' => 6,
            'nama' => "Anjing Husky",
            'gambar' => "anjing_husky.jpg",
            'deskripsi' => "Lawdjiadj ioawdjaojd awdjaowdj aowdjaojda wdjoajwd fsfsfs"
        ]);
    }
}

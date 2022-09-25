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
    }
}

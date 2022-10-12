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
            'deskripsi' => "Lawdjiadj ioawdjaojd awdjaowdj aowdjaojda wdjoajwd fsfsfs"
        ]);

        Item::create([
            'user_id' => 1,
            'kategory_id' => 5,
            'lokasi_id' => 2,
            'nama' => "Kucing Persia",
            'deskripsi' => "Lawdjiadj ioawdjaojd awdjaowdj aowdjaojda wdjoajwd fsfsfs"
        ]);

        Item::create([
            'user_id' => 2,
            'kategory_id' => 2,
            'lokasi_id' => 3,
            'nama' => "Laptop Asus Lama",
            'deskripsi' => "Lawdjiadj ioawdjaojd awdjaowdj aowdjaojda wdjoajwd fsfsfs"
        ]);

        Item::create([
            'user_id' => 2,
            'kategory_id' => 7,
            'lokasi_id' => 4,
            'nama' => "Kunci Mobil Toyota",
            'deskripsi' => "Lawdjiadj ioawdjaojd awdjaowdj aowdjaojda wdjoajwd fsfsfs"
        ]);

        Item::create([
            'user_id' => 2,
            'kategory_id' => 2,
            'lokasi_id' => 5,
            'nama' => "Laptop Asus E203M",
            'deskripsi' => "Lawdjiadj ioawdjaojd awdjaowdj aowdjaojda wdjoajwd fsfsfs"
        ]);

        Item::create([
            'user_id' => 1,
            'kategory_id' => 5,
            'lokasi_id' => 6,
            'nama' => "Anjing Husky",
            'deskripsi' => "Lawdjiadj ioawdjaojd awdjaowdj aowdjaojda wdjoajwd fsfsfs"
        ]);
    }
}

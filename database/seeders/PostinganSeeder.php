<?php

namespace Database\Seeders;

use App\Models\Postingan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostinganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Postingan::create([
            'user_id' => 1,
            'item_id' => 1,
            'hilang_ditemukan' => "Kehilangan"
        ]);
        Postingan::create([
            'user_id' => 1,
            'item_id' => 2,
            'hilang_ditemukan' => "Ditemukan"
        ]);
    }
}

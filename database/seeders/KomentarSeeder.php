<?php

namespace Database\Seeders;

use App\Models\Komentar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KomentarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Komentar::create([
            "user_id" => 1,
            "postingan_id" => 1,
            "pesan" => "tes"
        ]);
    }
}

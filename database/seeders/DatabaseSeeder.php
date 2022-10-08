<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(KomentarSeeder::class);
        $this->call(KategorySeeder::class);
        $this->call(ItemSeeder::class);
        $this->call(PostinganSeeder::class);
        $this->call(LokasiSeeder::class);
        $this->call(GambarSeeder::class);
    }
}

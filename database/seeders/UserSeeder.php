<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "email" => "user1@mail.com",
            "nama" => "user1",
            "password" => bcrypt("user1"),
            "nik" => 64740202070001,
            "foto_ktp" => "user1.jpg",
            "no_telp" => "081234567890",
            "instagram" => "@user1",
            "whatsapp" => "081234567890",
        ]);
    }
}

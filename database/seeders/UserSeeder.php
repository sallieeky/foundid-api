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
            "nama" => "user1",
            "email" => "user1@mail.com",
            "username" => "user1",
            "gender" => "Laki-laki",
            "password" => bcrypt("user12345"),
            "nik" => "6474020207010001",

            "provinsi" => "Kalimantan Timur",
            "kota" => "Kota Bontang",
            "alamat" => "Jl. Ahmad Yani",

            "foto_ktp" => "user1.jpg",
            "no_telp" => "081234567890",
            "instagram" => "@user1",
            "whatsapp" => "081234567890",
        ]);

        User::create([
            "nama" => "user2",
            "email" => "user2@mail.com",
            "username" => "user2",
            "gender" => "Laki-laki",
            "password" => bcrypt("user12345"),
            "nik" => "6474020207010002",

            "provinsi" => "Kalimantan Timur",
            "kota" => "Kota Bontang",
            "alamat" => "Jl. Ahmad Yani",

            "foto_ktp" => "user2.jpg",
            "no_telp" => "081234567890",
            "instagram" => "@user2",
            "whatsapp" => "081234567890",
        ]);
    }
}

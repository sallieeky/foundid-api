<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function registerFirst(Request $request)
    {
        if ($request->header("API_KEY") != env("API_KEY")) {
            return response()->json([
                "status" => 403,
                "message" => "Access denied"
            ], 403);
        }
        $validator = Validator::make($request->all(), [
            'namaLengkap' => 'required',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|min:8',
            'konfirmasiPassword' => 'required|same:password|min:8',
        ], [
            "namaLengkap.required" => "Tidak boleh kosong",
            "email.required" => "Tidak boleh kosong",
            "password.required" => "Tidak boleh kosong",
            "konfirmasiPassword.required" => "Tidak boleh kosong",
            "email.unique" => "Email telah digunakan",
            "email.email" => "Masukkan format email dengan benar",
            "password.min" => "Minimal 8 digit",
            "konfirmasiPassword.min" => "Minimal 8 digit",
            "konfirmasiPassword.same" => "Konfirmasi password harus sama dengan password",
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages());
        }

        return response()->json(true);
    }
    public function registerSecond(Request $request)
    {
        if ($request->header("API_KEY") != env("API_KEY")) {
            return response()->json([
                "status" => 403,
                "message" => "Access denied"
            ], 403);
        }
        $validator = Validator::make($request->all(), [
            'jenisKelamin' => 'required',
            'nik' => 'required|size:16',
            'provinsi' => 'required',
            'kota' => 'required',
            'alamat' => 'required',
            'ktp' => 'required',
        ], [
            "jenisKelamin.required" => "Tidak boleh kosong",
            "nik.required" => "Tidak boleh kosong",
            "provinsi.required" => "Tidak boleh kosong",
            "kota.required" => "Tidak boleh kosong",
            "alamat.required" => "Tidak boleh kosong",
            "ktp.required" => "Tidak boleh kosong",
            "nik.size" => "Panjang NIK 16 digit",
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages());
        }

        return response()->json(true);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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
            'username' => 'required|unique:users,username',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|min:8',
            'konfirmasiPassword' => 'required|same:password|min:8',
        ], [
            "username.required" => "Tidak boleh kosong",
            "email.required" => "Tidak boleh kosong",
            "password.required" => "Tidak boleh kosong",
            "konfirmasiPassword.required" => "Tidak boleh kosong",
            "username.unique" => "Username telah digunakan",
            "email.unique" => "Email telah digunakan",
            "email.email" => "Masukkan format email dengan benar",
            "password.min" => "Minimal 8 digit",
            "konfirmasiPassword.min" => "Minimal 8 digit",
            "konfirmasiPassword.same" => "Konfirmasi password harus sama dengan password",
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages());
        }

        $response["data"] = $request->all();
        $response["status"] = true;
        return response()->json($response);
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
        ], [
            "jenisKelamin.required" => "Tidak boleh kosong",
            "nik.required" => "Tidak boleh kosong",
            "provinsi.required" => "Tidak boleh kosong",
            "kota.required" => "Tidak boleh kosong",
            "alamat.required" => "Tidak boleh kosong",
            "nik.size" => "Panjang NIK 16 digit",
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages());
        }

        $response["data"] = $request->all();
        $response["status"] = true;
        return response()->json($response);
    }

    public function registerThird(Request $request)
    {
        if ($request->header("API_KEY") != env("API_KEY")) {
            return response()->json([
                "status" => 403,
                "message" => "Access denied"
            ], 403);
        }
        $validator = Validator::make($request->all(), [
            'namaLengkap' => 'required',
            'noTelp' => 'required',
        ], [
            "namaLengkap.required" => "Tidak boleh kosong",
            "noTelp.required" => "Tidak boleh kosong",
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages());
        }

        if ($request->foto) {
            $fotoBase64 = base64_decode($request->foto["data"]);
            $fotoPath = explode("/", $request->foto["path"]);
            File::put(storage_path() . '/app/public/foto/' . $fotoPath[count($fotoPath) - 1], $fotoBase64);
        }
        if ($request->ktp) {
            $ktpBase64 = base64_decode($request->ktp["base64"]);
            File::put(storage_path() . '/app/public/ktp/' . $request->ktp["fileName"], $ktpBase64);
        }

        $user = User::create([
            "nama" => $request->namaLengkap,
            "email" => $request->email,
            "username" => $request->username,
            "gender" => $request->jenisKelamin,
            "password" => bcrypt($request->password),
            "nik" => $request->nik,
            "provinsi" => $request->provinsi,
            "kota" => $request->kota,
            "alamat" => $request->alamat,
            "no_telp" => $request->noTelp,
            "whatsapp" => $request->noWa,
            "instagram" => $request->instagram,

            "foto" => $request->foto ? $fotoPath[count($fotoPath) - 1] : null,
            "foto_ktp" => $request->ktp ? $request->ktp["fileName"] : null,
        ]);

        $response["data"] = $user;
        $response["status"] = true;
        return response()->json($response);
    }
}

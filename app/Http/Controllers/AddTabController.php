<?php

namespace App\Http\Controllers;

use App\Models\Gambar;
use App\Models\Item;
use App\Models\Kategory;
use App\Models\Lokasi;
use App\Models\Postingan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class AddTabController extends Controller
{
    public function getKategori(Request $request)
    {
        if ($request->header("API_KEY") != env("API_KEY")) {
            return response()->json([
                "status" => 403,
                "message" => "Access denied"
            ], 403);
        }
        $data = Kategory::all();
        return response()->json($data);
    }

    public function upload(Request $request)
    {
        if ($request->header("API_KEY") != env("API_KEY")) {
            return response()->json([
                "status" => 403,
                "message" => "Access denied"
            ], 403);
        }
        $validator = Validator::make($request->all(), [
            'userId' => 'required',
            'status' => 'required',
            'gambar' => 'required',
            'namaBarang' => 'required',
            'kategoriId' => 'required',
            'tanggal' => 'required',
            'lokasi' => 'required',
            'deskripsi' => 'required',
        ], [
            "userId.required" => "Data tidak boleh dikosongkan!",
            "status.required" => "Data tidak boleh dikosongkan!",
            "gambar.required" => "Data tidak boleh dikosongkan!",
            "namaBarang.required" => "Data tidak boleh dikosongkan!",
            "kategoriId.required" => "Data tidak boleh dikosongkan!",
            "tanggal.required" => "Data tidak boleh dikosongkan!",
            "lokasi.required" => "Data tidak boleh dikosongkan!",
            "deskripsi.required" => "Data tidak boleh dikosongkan!",
        ]);


        if ($validator->fails()) {
            return response()->json($validator->messages());
        }

        $lokasi = Lokasi::create([
            'lat' => $request->lokasi["lat"],
            'lng' => $request->lokasi["lng"],
            'kota' => $request->lokasi["kota"],
            'detail' => $request->lokasi["detail"],
        ]);

        $item = Item::create([
            'user_id' => $request->userId,
            'kategory_id' => $request->kategoriId,
            'lokasi_id' => $lokasi->id,
            'nama' => $request->namaBarang,
            'deskripsi' => $request->deskripsi
        ]);

        $postingan = Postingan::create([
            'user_id' => $request->userId,
            'item_id' => $item->id,
            'hilang_ditemukan' => $request->status,
            'tanggal' => date('Y-m-d', strtotime($request->tanggal))
        ]);

        foreach ($request->gambar as $gb) {
            $gambarBase64 = base64_decode($gb["base64"]);
            $gambarNama = $gb["name"];
            File::put(storage_path() . '/app/public/item/' . $gambarNama, $gambarBase64);

            Gambar::create([
                'item_id' => $item->id,
                'nama' => $gambarNama,
                'tipe' => $gb['type'],
                'size' => $gb['size'],
            ]);
        }

        $response["data"] = [];
        $response["status"] = true;
        return response()->json($response);
    }
}

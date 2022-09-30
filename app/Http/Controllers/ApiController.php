<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use App\Models\Postingan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApiController extends Controller
{
    public function tes(Request $request)
    {
        if ($request->header("API_KEY") != env("API_KEY")) {
            return response()->json([
                "status" => 403,
                "message" => "Access denied"
            ], 403);
        }

        $kategori = json_decode($request->kategori);
        $data = Postingan::whereIn('item_id', $kategori)
            ->orderBy("item_id", $request->order ? $request->order : "ASC")
            ->get();
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

        $gambar = base64_decode($request->data["base64"]);
        Storage::disk("public/images")->put($request->data["name"], $gambar);
        return response()->json("BERHASIL");
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use App\Models\Postingan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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

    public function standardResponse(Request $request)
    {
        if ($request->header("API_KEY") != env("API_KEY")) {
            return response()->json([
                "status" => 403,
                "message" => "Access denied"
            ], 403);
        }
        $response["data"] = Postingan::with("item", 'item.gambar')->get();
        $response["total"] = count($response["data"]);
        return response()->json($response, 200);
    }

    // public function upload(Request $request)
    // {
    //     if ($request->header("API_KEY") != env("API_KEY")) {
    //         return response()->json([
    //             "status" => 403,
    //             "message" => "Access denied"
    //         ], 403);
    //     }

    //     $gambar = base64_decode($request->data["base64"]);
    //     // Storage::disk("public/images")->put($request->data["name"], $gambar);
    //     File::put(storage_path() . '/app/public/images/' . $request->data["name"], $gambar);
    //     return response()->json("BERHASIL");
    // }
    public function upload(Request $request)
    {
        if ($request->header("API_KEY") != env("API_KEY")) {
            return response()->json([
                "status" => 403,
                "message" => "Access denied"
            ], 403);
        }
        return $request->file($request->data["_parts"][0][1][0])->getClientOriginalName();
        return $request->data["_parts"][0][1];
    }
}

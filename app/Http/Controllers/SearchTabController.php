<?php

namespace App\Http\Controllers;

use App\Models\Kategory;
use App\Models\Postingan;
use App\Models\User;
use Illuminate\Http\Request;

class SearchTabController extends Controller
{
    public function getDataHistory(Request $request)
    {
        if ($request->header("API_KEY") != env("API_KEY")) {
            return response()->json([
                "status" => 403,
                "message" => "Access denied"
            ], 403);
        }
        $item_id = explode(",", $request->id);
        $response["data"] = Postingan::whereIn('item_id', $item_id)
            ->with("item", "item.lokasi", "user", "item.gambar")
            ->get();
        $response["total"] = count($response["data"]);
        return response()->json($response);
    }

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

    public function getData(Request $request)
    {
        if ($request->header("API_KEY") != env("API_KEY")) {
            return response()->json([
                "status" => 403,
                "message" => "Access denied"
            ], 403);
        }
        $kategori = explode(",", $request->kategori);
        $status = json_decode($request->status);
        $data["data"] = Postingan::with("item", "user", "item.lokasi", "item.gambar")
            ->where("isDone", $status)
            ->where("hilang_ditemukan", "LIKE", "%" . $request->jenis . "%")
            ->whereRelation("item.lokasi", "kota", "=", $request->kota)
            ->whereRelation("item", "nama", "LIKE", "%" . $request->nama . "%")
            ->whereHas("item.kategory", function ($q) use ($kategori) {
                $q->whereIn("nama", $kategori);
            })
            ->orderBy("id", $request->order)
            ->get();
        $data["total"] = count($data["data"]);
        return response()->json($data);
    }
}

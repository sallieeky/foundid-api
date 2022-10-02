<?php

namespace App\Http\Controllers;

use App\Models\Kategory;
use App\Models\Postingan;
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
        $item_id = json_decode($request->id);
        $data = Postingan::whereIn('item_id', $item_id)
            ->with("item", "item.lokasi", "user")
            ->get();
        return response()->json($data);
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
        $kategori = json_decode($request->kategori);
        $data["data"] = Postingan::with("item", "user", "item.lokasi")
            ->whereRelation("item", "nama", "LIKE", "%" . $request->nama . "%")
            ->where("isDone", $request->status)
            ->whereHas("item.kategory", function ($q) use ($kategori) {
                $q->whereIn("nama", $kategori);
            })
            ->get();
        $data["total"] = count($data["data"]);
        return response()->json($data);
    }
}

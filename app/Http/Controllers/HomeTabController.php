<?php

namespace App\Http\Controllers;

use App\Models\Kategory;
use App\Models\Postingan;
use Illuminate\Http\Request;

class HomeTabController extends Controller
{
    public function getTerbaru(Request $request)
    {
        if ($request->header("API_KEY") != env("API_KEY")) {
            return response()->json([
                "status" => 403,
                "message" => "Access denied"
            ], 403);
        }
        $data["data"] = Postingan::where("isDone", 0)
            ->with("user", "item", "item.lokasi")
            ->whereRelation("item.lokasi", "kota", "LIKE", "%" . $request->kota . "%")
            ->get()
            ->take(5);
        $data["total"] = count($data["data"]);
        return response()->json($data);
    }

    public function getCountHilangDitemukan(Request $request)
    {
        if ($request->header("API_KEY") != env("API_KEY")) {
            return response()->json([
                "status" => 403,
                "message" => "Access denied"
            ], 403);
        }
        $data["kehilangan"] = Postingan::where("isDone", 0)
            ->where("hilang_ditemukan", "Kehilangan")
            ->whereRelation("item.lokasi", "kota", "LIKE", "%" . $request->kota . "%")
            ->count();
        $data["ditemukan"] = Postingan::where("isDone", 0)
            ->where("hilang_ditemukan", "Ditemukan")
            ->whereRelation("item.lokasi", "kota", "LIKE", "%" . $request->kota . "%")
            ->count();
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

    public function getHilang(Request $request)
    {
        if ($request->header("API_KEY") != env("API_KEY")) {
            return response()->json([
                "status" => 403,
                "message" => "Access denied"
            ], 403);
        }
        $data["data"] = Postingan::where("isDone", 0)
            ->where("hilang_ditemukan", "Kehilangan")
            ->with("user", "item", "item.lokasi")
            ->whereRelation("item.lokasi", "kota", "LIKE", "%" . $request->kota . "%")
            ->get()
            ->take(5);
        $data["total"] = count($data["data"]);
        return response()->json($data);
    }

    public function getDitemukan(Request $request)
    {
        if ($request->header("API_KEY") != env("API_KEY")) {
            return response()->json([
                "status" => 403,
                "message" => "Access denied"
            ], 403);
        }
        $data["data"] = Postingan::where("isDone", 0)
            ->where("hilang_ditemukan", "Ditemukan")
            ->with("user", "item", "item.lokasi")
            ->whereRelation("item.lokasi", "kota", "LIKE", "%" . $request->kota . "%")
            ->get()
            ->take(5);
        $data["total"] = count($data["data"]);
        return response()->json($data);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Kategory;
use App\Models\Postingan;
use App\Models\User;
use Illuminate\Http\Request;

class GlobalController extends Controller
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

    public function getListItemPostingan(Request $request)
    {
        if ($request->header("API_KEY") != env("API_KEY")) {
            return response()->json([
                "status" => 403,
                "message" => "Access denied"
            ], 403);
        }
        $data["data"] = Postingan::where("isDone", false)
            ->where("id", "!=", $request->exclude ? $request->exclude : 'bontang')
            ->where("isHidden", false)
            ->with("user", "item", "item.lokasi", "item.gambar", "item.kategory")
            ->with(['komentar' => function ($query) {
                $query->orderBy('id', "DESC");
            }])
            ->whereRelation("item.lokasi", "kota", "=", $request->kota)
            ->orderBy('id', 'DESC')
            ->get()
            ->take(5);
        $data["total"] = count($data["data"]);
        return response()->json($data);
    }


    public function getUserLogin(Request $request)
    {
        if ($request->header("API_KEY") != env("API_KEY")) {
            return response()->json([
                "status" => 403,
                "message" => "Access denied"
            ], 403);
        }
        $data = User::find($request->id);
        return response()->json($data);
    }
}

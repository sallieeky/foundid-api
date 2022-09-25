<?php

namespace App\Http\Controllers;

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
        $data = Postingan::where("isDone", 0)->with("item", "item.lokasi")->get();
        return response()->json($data);
    }
}

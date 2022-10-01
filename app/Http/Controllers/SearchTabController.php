<?php

namespace App\Http\Controllers;

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
}

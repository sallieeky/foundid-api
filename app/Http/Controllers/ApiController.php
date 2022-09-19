<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use App\Models\User;
use Illuminate\Http\Request;

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
        $data = User::find(1);
        return response()->json($data->komentar);
    }
}

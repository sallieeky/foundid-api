<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\HomeTabController;
use App\Http\Controllers\SearchTabController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix("/tes")->group(function () {
    Route::get("/", [ApiController::class, 'tes']);
    Route::post("/upload", [ApiController::class, 'upload']);
});

Route::prefix('/home-tab')->group(function () {
    Route::get("/get-terbaru", [HomeTabController::class, 'getTerbaru']);
    Route::get("/get-count-hilang-ditemukan", [HomeTabController::class, 'getCountHilangDitemukan']);
    Route::get("/get-kategori", [HomeTabController::class, 'getKategori']);
    Route::get("/get-hilang", [HomeTabController::class, 'getHilang']);
    Route::get("/get-ditemukan", [HomeTabController::class, 'getDitemukan']);
});

Route::prefix('/search-tab')->group(function () {
    Route::get("/get-data-history", [SearchTabController::class, 'getDataHistory']);
});

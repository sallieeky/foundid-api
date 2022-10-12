<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthController;
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
    Route::post("/response", [ApiController::class, 'standardResponse']);
    Route::post("/upload", [ApiController::class, 'upload']);
});
Route::prefix("/auth")->controller(AuthController::class)->group(function () {
    Route::post("/register/first", "registerFirst");
    Route::post("/register/second", "registerSecond");
});


Route::prefix('/home-tab')->group(function () {
    Route::get("/get-terbaru", [HomeTabController::class, 'getTerbaru']);
    Route::get("/get-count-hilang-ditemukan", [HomeTabController::class, 'getCountHilangDitemukan']);
    Route::get("/get-kategori", [HomeTabController::class, 'getKategori']);
    Route::get("/get-hilang", [HomeTabController::class, 'getHilang']);
    Route::get("/get-ditemukan", [HomeTabController::class, 'getDitemukan']);
    Route::get("/get-user-login", [HomeTabController::class, 'getUserLogin']);
});

Route::prefix('/search-tab')->group(function () {
    Route::get("/get-data-history", [SearchTabController::class, 'getDataHistory']);
    Route::get("/get-kategori", [SearchTabController::class, 'getKategori']);
    Route::get("/get-data", [SearchTabController::class, 'getData']);
});

<?php

use App\Http\Controllers\AddTabController;
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

Route::prefix("/tes")->controller(ApiController::class)->group(function () {
    Route::get("/", 'tes');
    Route::post("/response", 'standardResponse');
    Route::post("/upload", 'upload');
});
Route::prefix("/auth")->controller(AuthController::class)->group(function () {
    Route::post("/login", "login");
    Route::post("/register/first", "registerFirst");
    Route::post("/register/second", "registerSecond");
    Route::post("/register/third", "registerThird");
});


Route::prefix('/home-tab')->controller(HomeTabController::class)->group(function () {
    Route::get("/get-terbaru", 'getTerbaru');
    Route::get("/get-count-hilang-ditemukan", 'getCountHilangDitemukan');
    Route::get("/get-kategori", 'getKategori');
    Route::get("/get-hilang", 'getHilang');
    Route::get("/get-ditemukan", 'getDitemukan');
    Route::get("/get-user-login", 'getUserLogin');
});

Route::prefix('/search-tab')->controller(SearchTabController::class)->group(function () {
    Route::get("/get-data-history", 'getDataHistory');
    Route::get("/get-kategori", 'getKategori');
    Route::get("/get-data", 'getData');
});

Route::prefix('/add-tab')->controller(AddTabController::class)->group(function () {
    Route::get("/get-kategori", 'getKategori');
    Route::post("/upload", 'upload');
});

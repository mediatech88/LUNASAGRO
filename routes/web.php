<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KorlapController;
use App\Http\Controllers\TimahliController;
use App\Http\Controllers\MitrataniController;
use App\Http\Controllers\PelayananController;
use App\Http\Controllers\ApiMitrataniController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/user/auth',[AuthController::class,'login'])->name('login')->middleware('guest');
Route::post('/user/postlogin',[AuthController::class,'postlogin']);
Route::get('/user/logout',[AuthController::class,'logout']);

Route::middleware('auth')->group(function () {


Route::get('/', function () {
    return view('dashboard');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/register', function () {
    return view('register');
});


// Route::get('/user/auth', function () {
//     return view('auth');
// });

//Tempat PElayanan

Route::get('/tempat-pelayanan', function () {
    return view('page.admin.tempatpelayanan');
});
Route::get('/superuser', [AdminController::class,'index']);

Route::get('/tempat-pelayanan',[PelayananController::class,'index']);
Route::get('/tempat-pelayanan/create',[PelayananController::class,'create']);
Route::post('/tempat-pelayanan',[PelayananController::class,'store']);
Route::delete('/tempat-pelayanan/{id}',[PelayananController::class,'destroy']);
Route::get('/tempat-pelayanan/{id}/edit',[PelayananController::class,'edit']);


//Korlap
Route::get('/koordinator-lapangan',[KorlapController::class,'index']);
Route::get('/koordinator-lapangan/create',[KorlapController::class,'create']);
Route::post('/koordinator-lapangan',[KorlapController::class,'store']);
Route::delete('/koordinator-lapangan/{id}',[KorlapController::class,'destroy']);


//Tim Ahli
Route::get('/tim-ahli',[TimahliController::class,'index']);
Route::get('/tim-ahli/create',[TimahliController::class,'create']);
Route::post('/tim-ahli',[TimahliController::class,'store']);
Route::delete('/tim-ahli/{id}',[TimahliController::class,'destroy']);



//Mitra Tani
Route::get('/mitra-tani',[MitrataniController::class,'index']);
Route::get('/mitra-tani/create',[MitrataniController::class,'create']);
Route::post('/mitra-tani',[MitrataniController::class,'store']);
Route::delete('/mitra-tani/{id}',[MitrataniController::class,'destroy']);

//API MITRATANI
Route::get('/mitra-tani/getkorlap/{code}',[ApiMitrataniController::class,'getkorlap']);



Route::get('/pemupukan', function () {
    return view('page.admin.pemupukan');
});
Route::get('/tanaman', function () {
    return view('page.admin.tanaman');
});
Route::get('/penyakit-tanaman', function () {
    return view('page.admin.penyakittanaman');
});
Route::get('/riwayat-lahan', function () {
    return view('page.admin.riwayatlahan');
});
Route::get('/peta-lahan', function () {
    return view('page.admin.petalahan');
});



});

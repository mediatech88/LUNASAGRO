<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KorlapController;
use App\Http\Controllers\PelayananController;

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
Route::get('/user/auth',[AuthController::class,'login'])->name('login');
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

Route::get('/tempat-pelayanan',[PelayananController::class,'index']);
Route::get('/tempat-pelayanan/create',[PelayananController::class,'create']);
Route::post('/tempat-pelayanan',[PelayananController::class,'store']);
Route::delete('/tempat-pelayanan/{id}',[PelayananController::class,'destroy']);
Route::get('/tempat-pelayanan/{id}/edit',[PelayananController::class,'edit']);


//Korlap

Route::get('/koordinator-lapangan', function () {
    return view('page.admin.koordinatorlapangan');
});
Route::get('/koordinator-lapangan/create',[KorlapController::class,'create']);


//Tim Ahli

Route::get('/tim-ahli', function () {
    return view('page.admin.timahli');
});
Route::get('/mitra-tani', function () {
    return view('page.admin.mitratani');
});
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



});

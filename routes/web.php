<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KorlapController;
use App\Http\Controllers\PelayananController;
use App\Http\Controllers\AuthController;

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
Route::get('/register', function () {
    return view('register');
});


Route::middleware(['auth', 'cek.roles:1'])->group(function () {
    Route::get('/tempat-pelayanan', function () {
        return view('page.admin.tempatpelayanan');
    });
    Route::get('/tempat-pelayanan/create',[PelayananController::class,'create']);



    //Tim Ahli
    Route::get('/tim-ahli', function () {
        return view('page.admin.timahli');
    });

    //Mitra Tani
    Route::get('/mitra-tani', function () {
        return view('page.admin.mitratani');
    });

    //Laporan Pemupukan
    Route::get('/pemupukan', function () {
        return view('page.admin.pemupukan');
    });

    //Tanaman
    Route::get('/tanaman', function () {
        return view('page.admin.tanaman');
    });

    //Laporan Penyakit Tanaman
    Route::get('/penyakit-tanaman', function () {
        return view('page.admin.penyakittanaman');
    });

    //Laporan Riwayat Lahan
    Route::get('/riwayat-lahan', function () {
        return view('page.admin.riwayatlahan');
    });


});
Route::middleware(['auth', 'cek.roles:1,2'])->group(function () {
 //Korlap
    Route::get('/koordinator-lapangan/create',[KorlapController::class,'create']);
});
Route::middleware(['auth', 'cek.roles:1,3'])->group(function () {
    Route::get('/koordinator-lapangan', function () {
        return view('page.admin.koordinatorlapangan');
    });
});
Route::middleware(['auth', 'cek.roles:1,2,3,4'])->group(function () {

});
Route::middleware(['auth', 'cek.roles:1,2,3,4,5'])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    });
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
    Route::get('/user/logout',[AuthController::class,'logout']);

});




//Keterangan Roles

//1 Role Admin, 2 Role Tempat Pelayanan, 3 Role Korlap, 4 Role Tim Ahli, 5 Role Mitra Tani

// Route::get('/user/auth', function () {
//     return view('auth');
// });

//Tempat PElayanan


<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PictureController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OfficialreportController;

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

// Route::get('/', function () {
//     return view('admin.login');
// });
Route::middleware('guest')->group(function () { //guest blm bisa login
    Route::get('/login',[AuthController::class,'login'])->name('login');
    Route::post('/login',[AuthController::class,'authenticate'])->name('auth');
    Route::get('register',[AuthController::class, 'register'])->name('register');
    Route::post('register',[AuthController::class, 'registerProcess']);
});

Route::middleware('auth')->group(function () { //auth jika sudah login
    Route::get('logout',[AuthController::class,'logout']);

    Route::get('/',[DashboardController::class,'index'])->name('dashboard');
    Route::get('user',[UserController::class,'index'])->name('users.index');
    Route::get('add-user',[UserController::class,'add']);
    Route::post('add-user',[UserController::class,'store']);
    Route::get('user-edit/{id}',[UserController::class,'edit']);
    Route::put('user-update/{id}',[UserController::class,'update']);
    Route::get('user-delete/{id}',[UserController::class,'destroy']);
    Route::get('user-approve/{id}',[UserController::class, 'approve']);

    Route::get('official',[OfficialreportController::class,'index']);
    Route::get('add-official',[OfficialreportController::class,'add']);
    Route::post('add-official',[OfficialreportController::class,'store']);
    Route::get('official-edit/{id}',[OfficialreportController::class,'edit']);
    Route::put('official-update/{id}',[OfficialreportController::class,'update']);
    Route::get('official-delete/{id}',[OfficialreportController::class,'destroy']);
    Route::get('official-detail/{id}',[officialreportController::class,'detail']);
    Route::get('/picture-destroy/{id}',[PictureController::class,'destroy']);
    Route::get('export-pdf/{id}',[officialreportController::class,'export_pdf'])->name('export_pdf');
    Route::get('cari',[officialreportController::class,'cari']);
    Route::get('/cetak-form', [officialreportController::class, 'cetakForm'])->name('cetak-form');
    Route::get('cetak-data-pertanggal/{tglawal}/{tglakhir}', [officialreportController::class, 'cetakClientPertanggal'])->name('cetak-data-pertanggal');
});
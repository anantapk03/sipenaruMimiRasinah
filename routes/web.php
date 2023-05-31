<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AuthConroller;
use App\Http\Controllers\PetugasController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('login',[AuthConroller::class, 'index'])->name('login');
Route::post('proses_login',[AuthConroller::class, 'auth_login'])->name('proses_login');
Route::get('/logout',[AuthConroller::class, 'logout'])->name('logout');
Route::get('/register',[AuthConroller::class, 'tampilan_register'])->name('tampil_register');

//auth 
//auth admin || petugas || anggota

Route::group(['middleware' => ['auth']],function(){
    Route::group(['middleware' =>'cek_level:admin'],function(){
        Route::get('admin',[AdminController::class, 'index'])->name('dashboard_admin');
        Route::get('admin/mengelola_petugassanggar', [AdminController::class, 'mengelola_petugassanggar'])->name('mengelola_petugassanggar');
        Route::get('admin/mengelola_petugassanggar/add_data', [AdminController::class, 'form_addpetugas'])->name('form_addpetugas');
        Route::post('admin/add_petugas',[AdminController::class, 'add_petugas'])->name('add_petugas');
        Route::get('admin/edit_petugas/{id}',[AdminController::class, 'tampil_datapetugas'])->name('tampil_datapetugas');
        Route::post('admin/edit_passpetugas/{id}',[AdminController::class, 'edit_passpetugas'])->name('edit_passpetugas');
        Route::get('admin/hapus_datapetugas/{id}', [AdminController::class, 'hapus_datapetugas'])->name('hapus_datapetugas');

        Route::get('admin/mengelola_admin', [AdminController::class, 'mengelola_admin'])->name('mengelola_admin');
        Route::get('admin/mengelola_admin/add_data', [AdminController::class, 'form_addadmin'])->name('form_admin');
        Route::post('admin/add_admin',[AdminController::class, 'add_admin'])->name('add_admin');
        Route::get('admin/hapus_dataadmin/{id}', [AdminController::class, 'hapus_dataadmin'])->name('hapus_dataadmin');
        Route::get('admin/edit_admin/{id}',[AdminController::class, 'tampil_dataadmin'])->name('tampil_dataadmin');
        Route::post('admin/edit_passadmin/{id}',[AdminController::class, 'edit_passadmin'])->name('edit_passadmin');
    });

    Route::group(['middleware' =>'cek_level:petugas'],function(){
        Route::get('/petugas',[PetugasController::class, 'index'])->name('petugas');
        

    });
    Route::group(['middleware' =>'cek_level:anggota'],function(){
        Route::get('/anggota',[AnggotaController::class, 'index'])->name('anggota');
        

    });
});
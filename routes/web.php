<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\AuthConroller;
use App\Http\Controllers\LatihanController;
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
Route::post('/register/kirim_Data',[AuthConroller::class, 'register_anggota'])->name('register');

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

        Route::get('admin/mengelola_anggota', [AdminController::class, 'mengelola_anggota'])->name('mengelola_anggota');
        Route::get('admin/mengelola_anggota/add_data', [AdminController::class, 'form_addanggota'])->name('form_anggota');
        Route::post('admin/add_anggota',[AdminController::class, 'add_anggota'])->name('add_anggota');
        Route::get('admin/edit_anggota/{id}',[AdminController::class, 'tampil_dataanggota'])->name('tampil_dataanggota');
        Route::post('admin/edit_passanggota/{id}',[AdminController::class, 'edit_passanggota'])->name('edit_passanggota');
        Route::get('admin/hapus_dataanggota/{id}', [AdminController::class, 'hapus_dataanggota'])->name('hapus_dataanggota');

        //Mengelola Data Latihan
        Route::get('admin/mengelola_latihan', [LatihanController::class, 'index'])->name('mengelola_latihan');
        Route::get('admin/add_latihan', [LatihanController::class, 'tambah_latihan'])->name('tambah_latihan');
        Route::post('admin/add_latihan/post',[LatihanController::class, 'post_latihan'])->name('post_latihanadd');
        Route::get('admin/hapus_datalatihan/{id_latihan}', [LatihanController::class, 'delete_latihan'])->name('hapus_datalatihan');
        Route::get('admin/edit_datalatihan/{id_latihan}', [LatihanController::class, 'edit_latihan'])->name('edit_datalatihan');
        Route::post('admin/perbarui_datalatihan/{id}',[LatihanController::class, 'update_latihan'])->name('update_latihan');
        Route::get('admin/detail_datalatihan/{id}',[LatihanController::class, 'detail_latihan'])->name('detail_latihan');
        Route::get('admin/exportexcel/{id_latihan}',[LatihanController::class, 'exportexcel'])->name('exportexcel');
        Route::get('admin/getdata_peserta/{id_latihan}',[LatihanController::class, 'get_datapesertalatihan'])->name('datapesertalatihan');
        

        Route::get('admin/detail_datadaftar/{id_daftar}',[LatihanController::class, 'konfirmasi_pembayaran'])->name('konfirmasi_pembayaran');
        Route::post('admin/updatekonfirmasipembayaran/{id_daftar}', [LatihanController::class, 'update_pembayaran'])->name('Update_status');

        Route::get('admin/mengelola_artikel', [ArtikelController::class, 'mengelola_artikel'])->name('mengelola_artikel');
        Route::get('admin/mengelola_artikel/add_artikel', [ArtikelController::class, 'form_addartikel'])->name('form_addartikel');
        Route::post('admin/add_artikel/post',[ArtikelController::class, 'add_artikel'])->name('add_artikel');
        
    });

    Route::group(['middleware' =>'cek_level:petugas'],function(){
        Route::get('/petugas',[PetugasController::class, 'index'])->name('petugas');
        Route::get('petugas/data_anggota',[PetugasController::class, 'mengelola_anggota'])->name('data_anggota');
        Route::get('petugas/mengelola_anggota/add_data', [PetugasController::class, 'form_addanggota'])->name('form_anggota');
        Route::post('petugas/add_anggota',[PetugasController::class, 'add_anggota'])->name('add_anggota');
        Route::get('petugas/edit_anggota/{id}',[PetugasController::class, 'tampil_dataanggota'])->name('tampil_dataanggota');
        Route::post('petugas/edit_passanggota/{id}',[PetugasController::class, 'edit_passanggota'])->name('edit_passanggota');
        Route::get('petugas/hapus_dataanggota/{id}', [PetugasController::class, 'hapus_dataanggota'])->name('hapus_dataanggota');



        Route::get('petugas/mengelola_latihan', [PetugasController::class, 'mengelola_latihan'])->name('mengelola_latihan');
        Route::get('petugas/add_latihan', [PetugasController::class, 'tambah_latihan'])->name('tambah_latihan');
        Route::post('petugas/add_latihan/post',[PetugasController::class, 'post_latihan'])->name('post_latihanadd');
        Route::get('petugas/hapus_datalatihan/{id_latihan}', [PetugasController::class, 'delete_latihan'])->name('hapus_datalatihan');
        Route::get('petugas/edit_datalatihan/{id_latihan}', [PetugasController::class, 'edit_latihan'])->name('edit_datalatihan');
        Route::post('petugas/perbarui_datalatihan/{id}',[PetugasController::class, 'update_latihan'])->name('update_latihan');
        Route::get('petugas/detail_datalatihan/{id}',[PetugasController::class, 'detail_latihan'])->name('detail_latihan');


        Route::get('petugas/detail_datadaftar/{id_daftar}',[PetugasController::class, 'konfirmasi_pembayaran'])->name('konfirmasi_pembayaran');
        Route::post('petugas/updatekonfirmasipembayaran/{id_daftar}', [PetugasController::class, 'update_pembayaran'])->name('Update_status');

    });
    Route::group(['middleware' =>'cek_level:anggota'],function(){
        Route::get('/anggota',[AnggotaController::class, 'index'])->name('anggota');

        Route::get('anggota/data_latihan',[AnggotaController::class, 'data_latihan'])->name('data_latihan');
        Route::get('anggota/data_latihan/daftar_latihan/{id_latihan}',[AnggotaController::class, 'tampil_daftarlatihan'])->name('tampil_daftarlatihan');
        Route::post('anggota/data_latihan/postdaftar_latihan/{id_latihan}',[AnggotaController::class, 'post_datapendaftaran'])->name('post_daftarlatihan');
        
        Route::get('anggota/akses_tiketlatihan/{id_latihan}/{id_daftar}', [AnggotaController::class, 'aksestiketlatihan'])->name('akses_tiket');
        Route::get('anggota/edit_anggota/{id}',[AnggotaController::class, 'edit_anggota'])->name('edit_anggota');
        Route::post('anggota/edit_passanggota/{id}',[AnggotaController::class, 'edit_passanggota'])->name('edit_passanggota');
    });
});
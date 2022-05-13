<?php

use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\PengirimanController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\TargetController;


/* Dashboard */
Route::get('/', [DashboardController::class, 'index'])->name('index');


/* Login */
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login/authenticate', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

/* -----------Admin-----------------*/
// Pegawai
Route::match(['get', 'post'], '/new-user', [PegawaiController::class, 'index'])->name('new-user');
Route::get('/data-pegawai', [PegawaiController::class, 'data_pegawai'])->name('data-pegawai');
Route::get('/lihat-pegawai/{id}', [PegawaiController::class, 'detail_pegawai'])->name('lihat-pegawai');
Route::match(['get', 'post'], '/edit-pegawai/{id}', [PegawaiController::class, 'edit_pegawai'])->name('edit-pegawai');
Route::post('/delete-pegawai', [PegawaiController::class, 'delete_pegawai'])->name('delete-pegawai');

Route::get('/customer', function () {
    return view('admin\customer', [
        "title" => "Customer"
    ]);
});

Route::get('/lihat-customer', function () {
    return view('admin\lihat-customer', [
        "title" => "Customer"
    ]);
});

Route::get('/edit-customer', function () {
    return view('admin\edit-customer', [
        "title" => "Customer"
    ]);
});

Route::get('/tambah-customer', function () {
    return view('admin\tambah-customer', [
        "title" => "Customer"
    ]);
});

Route::get('/pemesanan', function () {
    return view('admin\pemesanan', [
        "title" => "Pemesanan"
    ]);
});

Route::get('/edit-pemesanan', function () {
    return view('admin\edit-pemesanan', [
        "title" => "Pemesanan"
    ]);
});

Route::get('/penjualan-baru', function () {
    return view('admin\penjualan-baru', [
        "title" => "Penjualan Baru"
    ]);
});

Route::get('/jumlah-penjualan', function () {
    return view('admin\jumlah-penjualan', [
        "title" => "Jumlah Penjualan"
    ]);
});

Route::get('/lihat-penjualan', function () {
    return view('admin\lihat-penjualan', [
        "title" => "Jumlah Penjualan"
    ]);
});

Route::get('/target', function () {
    return view('admin\target', [
        "title" => "Target"
    ]);
});

Route::get('/pengiriman', function () {
    return view('admin\pengiriman', [
        "title" => "Pengiriman"
    ]);
});

Route::get('/penjadwalan', function () {
    return view('admin\penjadwalan', [
        "title" => "Penjadwalan"
    ]);
});


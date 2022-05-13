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

//Customer
Route::get('/customer', [CustomerController::class, 'index'])->name('customer');
Route::get('/lihat-customer/{id}', [CustomerController::class, 'lihat_customer'])->name('lihat-customer');
Route::match(['get', 'post'], '/edit-customer/{id}', [CustomerController::class, 'edit_customer'])->name('edit-customer');
Route::match(['get', 'post'],  '/tambah-customer', [CustomerController::class, 'tambah_customer'])->name('tambah-customer');
Route::post('/delete-customer', [CustomerController::class, 'delete_customer'])->name('delete-customer');



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

Route::get('/tambah-target', function () {
    return view('admin\tambah-target', [
        "title" => "Target"
    ]);
});

Route::get('/lihat-target', function () {
    return view('admin\lihat-target', [
        "title" => "Target"
    ]);
});

Route::get('/edit-target', function () {
    return view('admin\edit-target', [
        "title" => "Target"
    ]);
});


Route::get('/pengiriman', function () {
    return view('admin\pengiriman', [
        "title" => "Pengiriman"
    ]);
});

Route::get('/tambah-pengiriman', function () {
    return view('admin\tambah-pengiriman', [
        "title" => "Pengiriman"
    ]);
});

Route::get('/edit-pengiriman', function () {
    return view('admin\edit-pengiriman', [
        "title" => "Pengiriman"
    ]);
});

Route::get('/lihat-pengiriman', function () {
    return view('admin\lihat-pengiriman', [
        "title" => "Pengiriman"
    ]);
});

Route::get('/penjadwalan', function () {
    return view('admin\penjadwalan', [
        "title" => "Penjadwalan"
    ]);
});

Route::get('/tambah-penjadwalan', function () {
    return view('admin\tambah-penjadwalan', [
        "title" => "Penjadwalan"
    ]);
});

Route::get('/edit-penjadwalan', function () {
    return view('admin\edit-penjadwalan', [
        "title" => "Penjadwalan"
    ]);
});

Route::get('/lihat-penjadwalan', function () {
    return view('admin\lihat-penjadwalan', [
        "title" => "Penjadwalan"
    ]);
});


/* -----------Sales-----------------*/
// Pegawai


Route::get('/sales', function () {
    return view('sales\dashboard', [
        "title" => "Dashboard"
    ]);
});

Route::get('/data-barang-sales', function () {
    return view('sales\data-barang', [
        "title" => "Data Barang"
    ]);
});

Route::get('/pemesanan-sales', function () {
    return view('sales\pemesanan', [
        "title" => "Pemesanan"
    ]);
});

Route::get('/tambah-pesanan-sales', function () {
    return view('sales\tambah-pesanan', [
        "title" => "Pemesanan"
    ]);
});

Route::get('/edit-pesanan-sales', function () {
    return view('sales\edit-pesanan', [
        "title" => "Pemesanan"
    ]);
});

Route::get('/jadwal-kunjungan', function () {
    return view('sales\jadwal-kunjungan', [
        "title" => "Jadwal Kunjungan"
    ]);
});

Route::get('/target-penjualan', function () {
    return view('sales\target-penjualan', [
        "title" => "Target Penjualan"
    ]);
});



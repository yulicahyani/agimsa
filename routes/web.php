<?php

use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\LoginController;

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


/* Testing */
Route::get('/', function () {
    return view('admin\dashboard', [
        "title" => "Dashboard"
    ]);
});


/* Login */
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login/authenticate', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

/* -----------Admin-----------------*/

Route::get('/dashboard', function () {
    return view('admin\dashboard', [
        "title" => "Dashboard"
    ]);
});

Route::get('/new-user', function () {
    return view('admin\new-user', [
        "title" => "New User"
    ]);
});

Route::get('/data-pegawai', function () {
    return view('admin\data-pegawai', [
        "title" => "Data Pegawai"
    ]);
});

Route::get('/edit-pegawai', function () {
    return view('admin\edit-pegawai', [
        "title" => "Data Pegawai"
    ]);
});
Route::get('/lihat-pegawai', function () {
    return view('admin\lihat-pegawai', [
        "title" => "Data Pegawai"
    ]);
});

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


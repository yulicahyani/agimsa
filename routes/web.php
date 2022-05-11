<?php

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


/* Testing */
Route::get('/', function () {
    return view('admin\dashboard');
});


/* Login */
Route::get('/login', function () {
    return view('login');
});

/* Admin */

Route::get('/dashboard', function () {
    return view('admin\dashboard');
});

Route::get('/new-user', function () {
    return view('admin\new-user');
});

Route::get('/data-pegawai', function () {
    return view('admin\data-pegawai');
});

Route::get('/customer', function () {
    return view('admin\customer');
});

Route::get('/pemesanan', function () {
    return view('admin\pemesanan');
});

Route::get('/penjualan-baru', function () {
    return view('admin\penjualan-baru');
});

Route::get('/jumlah-penjualan', function () {
    return view('admin\jumlah-penjualan');
});

Route::get('/target', function () {
    return view('admin\target');
});

Route::get('/pengiriman', function () {
    return view('admin\pengiriman');
});

Route::get('/penjadwalan', function () {
    return view('admin\penjadwalan');
});


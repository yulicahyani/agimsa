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
use App\Http\Controllers\BarangController;


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

//Pemesanan
Route::match(['get', 'post'], '/pemesanan', [PemesananController::class, 'index'])->name('pemesanan');
Route::match(['get', 'post'], '/edit-pemesanan/{id}', [PemesananController::class, 'edit_pemesanan'])->name('edit-pemesanan');
Route::post('/delete-pemesanan', [PemesananController::class, 'delete_pemesanan'])->name('delete-pemesanan');
Route::get('/detail-customer', [CustomerController::class, 'detail_customer'])->name('getDetailCustomer');
Route::get('/detail-barang', [BarangController::class, 'detail_barang'])->name('getDetailBarang');

//Penjualan
Route::match(['get', 'post'], '/penjualan-baru', [PenjualanController::class, 'index'])->name('penjualan-baru');
Route::post('/tambah-penjualan', [PenjualanController::class, 'tambah_penjualan'])->name('tambah-penjualan');
Route::get('/jumlah-penjualan', [PenjualanController::class, 'jumlah_penjualan'])->name('jumlah-penjualan');
Route::get('/lihat-penjualan/{faktur}', [PenjualanController::class, 'lihat_penjualan'])->name('lihat-penjualan');
Route::post('/delete-penjualan', [PenjualanController::class, 'delete_penjualan'])->name('delete-penjualan');


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
//Dashboard
Route::get('/sales', [DashboardController::class, 'index_sales'])->name('index_sales');

//Pemesanan
Route::get('/pemesanan-sales', [PemesananController::class, 'index_sales'])->name('pemesanan_sales');
Route::match(['get', 'post'], '/edit-pesanan-sales/{id}', [PemesananController::class, 'edit_pemesanan_sales'])->name('edit-pemesanan-sales');
Route::post('/delete-pemesanan-sales', [PemesananController::class, 'delete_pemesanan_sales'])->name('delete-pemesanan-sales');
Route::get('/detail-customer', [CustomerController::class, 'detail_customer'])->name('getDetailCustomer');
Route::get('/detail-barang', [BarangController::class, 'detail_barang'])->name('getDetailBarang');
Route::match(['get', 'post'],  '/tambah-pesanan-sales', [PemesananController::class, 'tambah_pesanan'])->name('tambah-pesanan');


//Data Barang
Route::get('/data-barang-sales', [BarangController::class, 'index'])->name('data_barang_sales');

//Target Penjualan
Route::get('/target-penjualan', [TargetController::class, 'index'])->name('target-penjualan');

//Jadwal Kunjungan
Route::get('/jadwal-kunjungan', [JadwalController::class, 'index_sales'])->name('jadwal-kunjungan');
Route::match(['get', 'post'], '/edit-jadwal/{id}', [JadwalController::class, 'edit_jadwal_sales'])->name('edit-jadwal');
Route::get('/detail-customer', [CustomerController::class, 'detail_customer'])->name('getDetailCustomer');
Route::get('/detail-pegawai', [PegawaiController::class, 'detail_pegawai_by_id'])->name('getDetailPegawai');
Route::post('/delete-jadwal', [JadwalController::class, 'delete_jadwal'])->name('delete-jadwal');
Route::get('/lihat-jadwal/{id}', [JadwalController::class, 'lihat_jadwal'])->name('lihat-jadwal');

// Route::get('/edit-jadwal', function () {
//     return view('sales\edit-jadwal', [
//         "title" => "Jadwal Kunjungan"
//     ]);
// });

// Route::get('/lihat-jadwal', function () {
//     return view('sales\lihat-jadwal', [
//         "title" => "Jadwal Kunjungan"
//     ]);
// });


/* -----------Gudang-----------------*/

Route::get('/gudang', function () {
    return view('gudang\dashboard', [
        "title" => "Dashboard"
    ]);
});

Route::get('/data-barang-gudang', function () {
    return view('gudang\data-barang', [
        "title" => "Data Barang"
    ]);
});

Route::get('/stok-barang', function () {
    return view('gudang\stok-barang', [
        "title" => "Stok Barang"
    ]);
});

Route::get('/pengeluaran-barang', function () {
    return view('gudang\pengeluaran-barang', [
        "title" => "Pengeluaran Barang"
    ]);
});

/* -----------Gudang-----------------*/

Route::get('/pimpinan', function () {
    return view('pimpinan\dashboard', [
        "title" => "Dashboard"
    ]);
});

Route::get('/laporan-pegawai', function () {
    return view('pimpinan\laporan-pegawai', [
        "title" => "Laporan Pegawai"
    ]);
});

Route::get('/laporan-penjualan', function () {
    return view('pimpinan\laporan-penjualan', [
        "title" => "Laporan Penjualan"
    ]);
});

Route::get('/laporan-data-barang', function () {
    return view('pimpinan\laporan-data-barang', [
        "title" => "Laporan Data Barang"
    ]);
});

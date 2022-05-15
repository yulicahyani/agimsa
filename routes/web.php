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

//Target
Route::match(['get', 'post'],'/target', [TargetController::class, 'index_admin'])->name('target');
Route::get('/detail-penjualan-target', [TargetController::class, 'detail_penjualan'])->name('getDetailPenjualan');
Route::get('/detail-pegawai', [PegawaiController::class, 'detail_pegawai_by_id'])->name('getDetailPegawai');
Route::match(['get', 'post'], '/tambah-target', [TargetController::class, 'tambah_target'])->name('tambah-target');
Route::post('/delete-target', [TargetController::class, 'delete_target'])->name('delete-target');
Route::match(['get', 'post'], '/edit-target/{id}', [TargetController::class, 'edit_target'])->name('edit-target');
Route::get('/lihat-target/{id}', [JadwalController::class, 'lihat_target'])->name('lihat-target');


//Pengiriman
Route::get('/pengiriman', [PengirimanController::class, 'index'])->name('pengiriman');
Route::match(['get', 'post'], '/tambah-pengiriman', [PengirimanController::class, 'tambah_pengiriman'])->name('tambah-pengiriman');
Route::match(['get', 'post'], '/edit-pengiriman/{id}', [PengirimanController::class, 'edit_pengiriman'])->name('edit-pengiriman');
Route::get('/lihat-pengiriman/{id}', [PengirimanController::class, 'lihat_pengiriman'])->name('lihat-pengiriman');
Route::post('/delete-pengiriman', [PengirimanController::class, 'delete_pengiriman'])->name('delete-pengiriman');

//Penjadwalan
Route::get('/penjadwalan', [JadwalController::class, 'index_admin'])->name('penjadwalan');
Route::match(['get', 'post'], '/tambah-penjadwalan', [JadwalController::class, 'tambah_penjadwalan'])->name('tambah-penjadwalan');
Route::match(['get', 'post'], '/edit-penjadwalan/{id}', [JadwalController::class, 'edit_jadwal_admin'])->name('edit-penjadwalan');
Route::get('/detail-customer', [CustomerController::class, 'detail_customer'])->name('getDetailCustomer');
Route::get('/detail-pegawai', [PegawaiController::class, 'detail_pegawai_by_id'])->name('getDetailPegawai');
Route::post('/delete-penjadwalan', [JadwalController::class, 'delete_penjadwalan'])->name('delete-penjadwalan');
Route::get('/lihat-penjadwalan/{id}', [JadwalController::class, 'lihat_penjadwalan'])->name('lihat-penjadwalan');


/* -----------Sales-----------------*/
//Dashboard
Route::get('/sales', [DashboardController::class, 'index_sales'])->name('index_sales');

//Pemesanan
Route::match(['get', 'post'],'/pemesanan-sales', [PemesananController::class, 'index_sales'])->name('pemesanan_sales');
Route::match(['get', 'post'], '/edit-pesanan-sales/{id}', [PemesananController::class, 'edit_pemesanan_sales'])->name('edit-pemesanan-sales');
Route::post('/delete-pemesanan-sales', [PemesananController::class, 'delete_pemesanan_sales'])->name('delete-pemesanan-sales');
Route::get('/detail-customer', [CustomerController::class, 'detail_customer'])->name('getDetailCustomer');
Route::get('/detail-barang', [BarangController::class, 'detail_barang'])->name('getDetailBarang');
Route::match(['get', 'post'],  '/tambah-pesanan-sales', [PemesananController::class, 'tambah_pesanan'])->name('tambah-pesanan');


//Data Barang
Route::get('/data-barang-sales', [BarangController::class, 'index'])->name('data_barang_sales');

//Target Penjualan
Route::match(['get', 'post'],'/target-penjualan', [TargetController::class, 'index'])->name('target-penjualan');

//Jadwal Kunjungan
Route::get('/jadwal-kunjungan', [JadwalController::class, 'index_sales'])->name('jadwal-kunjungan');
Route::match(['get', 'post'], '/edit-jadwal/{id}', [JadwalController::class, 'edit_jadwal_sales'])->name('edit-jadwal');
Route::get('/detail-customer', [CustomerController::class, 'detail_customer'])->name('getDetailCustomer');
Route::get('/detail-pegawai', [PegawaiController::class, 'detail_pegawai_by_id'])->name('getDetailPegawai');
Route::post('/delete-jadwal', [JadwalController::class, 'delete_jadwal'])->name('delete-jadwal');
Route::get('/lihat-jadwal/{id}', [JadwalController::class, 'lihat_jadwal'])->name('lihat-jadwal');

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

/* -----------Pimpinan-----------------*/
//Dashboard
Route::get('/pimpinan', [DashboardController::class, 'index_pimpinan'])->name('index_pimpinan');

Route::get('/laporan-pegawai', function () {
    return view('pimpinan\laporan-pegawai', [
        "title" => "Laporan Pegawai"
    ]);
});

Route::get('/laporan-penjualan', [PenjualanController::class, 'index_pimpinan'])->name('laporan_penjualan');

// Route::get('/laporan-penjualan', function () {
//     return view('pimpinan\laporan-penjualan', [
//         "title" => "Laporan Penjualan"
//     ]);
// });

Route::get('/laporan-data-barang', [BarangController::class, 'index_pimpinan'])->name('laporan_data_barang');

<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Penjualan;


class DashboardController extends Controller
{

    public function index(Request $request){
        $penjualanperbulan = [];
        foreach(range(1,12) as $bulan) {
            $penjualanperbulan[] = Penjualan::whereMonth('tgl_penjualan', '=', date($bulan))->whereYear('tgl_penjualan', '=', date('Y'))->count();
        }

        $data = [
            'title'=>'Dashboard',
            'countUser'=> Pegawai::all()->count(),
            'countPenjualan'=> Penjualan::all()->count(),
            'tanggal' => date('M d, Y'),
            'countCustomer'=> Customer::all()->count(),
            'countPenjualanBulanan'=> Penjualan::whereMonth('tgl_penjualan', '=', date('m'))->whereYear('tgl_penjualan', '=', date('Y'))->count(),
            'countPendapatanBulanan'=> Penjualan::whereMonth('tgl_penjualan', '=', date('m'))->whereYear('tgl_penjualan', '=', date('Y'))->sum('total_harga'),
            'countPendapatan'=> Penjualan::all()->sum('total_harga'),
            'countProduk'=> Barang::all()->count(),
            'penjualanperbulan' => $penjualanperbulan,
        ];
    
        return view('admin.dashboard',$data);
    }

    public function index_sales(Request $request){
        $penjualanperbulan = [];
        foreach(range(1,12) as $bulan) {
            $penjualanperbulan[] = Penjualan::whereMonth('tgl_penjualan', '=', date($bulan))->whereYear('tgl_penjualan', '=', date('Y'))->count();
        }

          
        $data = [
            'title'=>'Dashboard',
            'countUser'=> Pegawai::all()->count(),
            'countPenjualan'=> Penjualan::all()->count(),
            'tanggal' => date('M d, Y'),
            'countCustomer'=> Customer::all()->count(),
            'countPenjualanBulanan'=> Penjualan::whereMonth('tgl_penjualan', '=', date('m'))->whereYear('tgl_penjualan', '=', date('Y'))->count(),
            'countPendapatanBulanan'=> Penjualan::whereMonth('tgl_penjualan', '=', date('m'))->whereYear('tgl_penjualan', '=', date('Y'))->sum('total_harga'),
            'countPendapatan'=> Penjualan::all()->sum('total_harga'),
            'countProduk'=> Barang::all()->count(),
            'penjualanperbulan' => $penjualanperbulan,
            
        ];
    
        return view('sales.dashboard',$data);
    }

    public function index_pimpinan(Request $request){
        $penjualanperbulan = [];
        foreach(range(1,12) as $bulan) {
            $penjualanperbulan[] = Penjualan::whereMonth('tgl_penjualan', '=', date($bulan))->whereYear('tgl_penjualan', '=', date('Y'))->count();
        }
        $data = [
            'title'=>'Dashboard',
            'countUser'=> Pegawai::all()->count(),
            'countPenjualan'=> Penjualan::all()->count(),
            'tanggal' => date('M d, Y'),
            'countCustomer'=> Customer::all()->count(),
            'countPenjualanBulanan'=> Penjualan::whereMonth('tgl_penjualan', '=', date('m'))->whereYear('tgl_penjualan', '=', date('Y'))->count(),
            'countPendapatanBulanan'=> Penjualan::whereMonth('tgl_penjualan', '=', date('m'))->whereYear('tgl_penjualan', '=', date('Y'))->sum('total_harga'),
            'countPendapatan'=> Penjualan::all()->sum('total_harga'),
            'countProduk'=> Barang::all()->count(),
            'penjualanperbulan' => $penjualanperbulan,
            
        ];
    
        return view('pimpinan.dashboard',$data);
    }

    public function index_gudang(Request $request){
        $penjualanperbulan = [];
        foreach(range(1,12) as $bulan) {
            $penjualanperbulan[] = Penjualan::whereMonth('tgl_penjualan', '=', date($bulan))->whereYear('tgl_penjualan', '=', date('Y'))->count();
        }
        $data = [
            'title'=>'Dashboard',
            'countUser'=> Pegawai::all()->count(),
            'countPenjualan'=> Penjualan::all()->count(),
            'tanggal' => date('M d, Y'),
            'countCustomer'=> Customer::all()->count(),
            'countPenjualanBulanan'=> Penjualan::whereMonth('tgl_penjualan', '=', date('m'))->whereYear('tgl_penjualan', '=', date('Y'))->count(),
            'countPendapatanBulanan'=> Penjualan::whereMonth('tgl_penjualan', '=', date('m'))->whereYear('tgl_penjualan', '=', date('Y'))->sum('total_harga'),
            'countPendapatan'=> Penjualan::all()->sum('total_harga'),
            'countProduk'=> Barang::all()->count(),
            'penjualanperbulan' => $penjualanperbulan,
        ];
    
        return view('gudang.dashboard',$data);
    }
}

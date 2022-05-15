<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Penjualan;


class DashboardController extends Controller
{

    public function index(Request $request){
        $data = [
            'title'=>'Dashboard',
            'countUser'=> Pegawai::all()->count(),
            'countPenjualan'=> Penjualan::all()->count(),
        ];
    
        return view('admin.dashboard',$data);
    }

    public function index_sales(Request $request){
        $data = [
            'title'=>'Dashboard',
            'countUser'=> Pegawai::all()->count(),
            'countPenjualan'=> Penjualan::all()->count(),
        ];
    
        return view('sales.dashboard',$data);
    }

    public function index_pimpinan(Request $request){
        $data = [
            'title'=>'Dashboard',
            'countUser'=> Pegawai::all()->count(),
            'countPenjualan'=> Penjualan::all()->count(),
        ];
    
        return view('pimpinan.dashboard',$data);
    }

    public function index_gudang(Request $request){
        $data = [
            'title'=>'Dashboard',
            'countUser'=> Pegawai::all()->count(),
            'countPenjualan'=> Penjualan::all()->count(),
        ];
    
        return view('gudang.dashboard',$data);
    }
}

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
}

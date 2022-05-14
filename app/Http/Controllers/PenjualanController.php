<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Http\Requests\StorePenjualanRequest;
use App\Http\Requests\UpdatePenjualanRequest;

class PenjualanController extends Controller
{
    
    public function index()
    {
        if(session()->has('user') && session('user')->jabatan == 'Admin'){
            $data = [
                'title' => 'Penjualan Baru',
            ];
    
            return view('admin/penjualan-baru', $data);
        }else{
            return redirect('/login');
        }
    }

   
   
}

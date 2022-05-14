<?php

namespace App\Http\Controllers;

use App\Models\Target;
use App\Http\Requests\StoreTargetRequest;
use App\Http\Requests\UpdateTargetRequest;

class TargetController extends Controller
{
    
    public function index()
    {
        if(session()->has('user') && session('user')->jabatan == 'Sales'){
            $data = [
                'title' => 'Target Penjualan',
                'target' => Target::all()
            ];
    
            return view('sales/target-penjualan', $data);
        }else{
            return redirect('/login');
        }
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBarangRequest;
use App\Http\Requests\UpdateBarangRequest;

class BarangController extends Controller
{
    
    public function index()
    {
        
    }

    public function detail_barang(Request $request){
        $barang = Barang::where('kode_barang', $request->barang)->get();

        if(!$barang->isEmpty()){
            $data = [
                'status' => 200,
                'data' =>  $barang
            ];
        }else{
            $data = [
                'status' => 500,
            ];
        }
        return $data;
    }
    
}

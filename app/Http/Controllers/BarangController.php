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
        if(session()->has('user') && session('user')->jabatan == 'Sales'){
            $data = [
                'title' => 'Data Barang',
                'barang' => Barang::all()
            ];
    
            return view('sales/data-barang', $data);
        }else{
            return redirect('/login');
        }
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

    public function index_pimpinan()
    {
        if(session()->has('user') && session('user')->jabatan == 'Pimpinan'){
            $data = [
                'title' => 'Laporan Data Barang',
                'barang' => Barang::all()
            ];
    
            return view('pimpinan\laporan-data-barang', $data);
        }else{
            return redirect('/login');
        }
    }
    
}

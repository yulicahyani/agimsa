<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;
use App\Http\Requests\StorePemesananRequest;
use App\Http\Requests\UpdatePemesananRequest;

class PemesananController extends Controller
{
   
    public function index()
    {
        if(session()->has('user') && session('user')->jabatan == 'Admin'){
            $data = [
                'title' => 'Pemesanan',
                'pemesanan' => Pemesanan::all()
            ];
    
            return view('admin/pemesanan', $data);
        }else{
            return redirect('/login');
        }
    }

    public function edit_pemesanan(Request $request, $id)
    {
        if(session()->has('user') && session('user')->jabatan == 'Admin'){
            
            $pemesanan = Pemesanan::find($id);
            
            

            $data = [
                'title' => 'Pemesanan',
                'pemesanan'=>$pemesanan
            ];
    
            return view('admin/edit-pemesanan', $data);
        }else{
            return redirect('/login');
        }

    }

    public function delete_pemesanan(Request $request)
    {
        if(session()->has('user') && session('user')->jabatan == 'Admin'){
            Pemesanan::find($request->id_pemesanan)->delete();
            return redirect()->route('pemesanan')->with(['success'=>'Data berhasil dihapus!']);
        }else{
            return redirect('/login');
        }

    }

    
}

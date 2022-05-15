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

    public function index_gudang()
    {
        if(session()->has('user') && session('user')->jabatan == 'Gudang'){
            $data = [
                'title' => 'Data Barang',
                'barang' => Barang::all()
            ];
            return view('gudang/data-barang', $data);
        }else{
            return redirect('/login');
        }
    }
    
    public function tambah_barang(Request $request)
    {
        if(session()->has('user') && session('user')->jabatan == 'Gudang'){
           
            if ($request->isMethod('POST') ){
                $post = $request->validate([
                    'nama_barang' => 'required',
                    'merk' => 'required',
                    'jumlah_stok' => 'required',
                    'keterangan' => 'required',
                ]);

                $barang = new Barang();
                $barang->nama_barang = $post['nama_barang'];
                $barang->merk = $post['merk'];
                $barang->jumlah_stok = $post['jumlah_stok'];
                $barang->keterangan = $post['keterangan'];

                $barang->save();
                return redirect()->route('data-barang-gudang')->with(['success'=>"Data berhasil disimpan"]);

            }
           
            $data = [
                'title' => 'Data Barang',
            ];    
            return view('gudang/tambah-barang', $data);
        }else{
            return redirect('/login');
        }
    }

    public function edit_barang(Request $request, $kode)
    {
        if(session()->has('user') && session('user')->jabatan == 'Gudang'){
            $barang = Barang::find($kode);

            if ($request->isMethod('POST') ){
                $post = $request->validate([
                    'nama_barang' => 'required',
                    'merk' => 'required',
                    'jumlah_stok' => 'required',
                    'keterangan' => 'required',
                ]);

                $barang->nama_barang = $post['nama_barang'];
                $barang->merk = $post['merk'];
                $barang->jumlah_stok = $post['jumlah_stok'];
                $barang->keterangan = $post['keterangan'];

                if($barang->isDirty()){
                    $barang->save();
                    return redirect()->route('data-barang-gudang')->with(['success'=>"Data berhasil diupdate"]);
                }
                
                return redirect()->route('data-barang-gudang')->with(['warning'=>"Tidak ada perubahan"]);

            }

            $data = [
                'title' => 'Data Barang',
                'barang' => $barang
            ];
    
            return view('gudang/edit-barang', $data);
        }else{
            return redirect('/login');
        }
    }

    public function delete_barang(Request $request)
    {
        if(session()->has('user') && session('user')->jabatan == 'Gudang'){
            Barang::find($request->kode_barang)->delete();
            return redirect()->route('data-barang-gudang')->with(['success'=>'Data berhasil dihapus!']);
        }else{
            return redirect('/login');
        }
    }
}

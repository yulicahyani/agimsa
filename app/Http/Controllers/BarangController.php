<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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


    public function pengeluaran_barang(Request $request)
    {
        if(session()->has('user') && session('user')->jabatan == 'Gudang'){
            $barang = Barang::all();
            $sold = DB::select("SELECT DISTINCT(kode_barang), SUM(qty) AS total FROM `tb_penjualan` GROUP BY kode_barang");
            
            foreach($barang as $key=>$item){
                $barang[$key]->total = 0;
                foreach($sold as $s){
                    if($item->kode_barang == $s->kode_barang){
                        $barang[$key]->total = $s->total;
                    }
                }
            }

            $data = [
                'title' => 'Pengeluaran Barang',
                'barang' => $barang
            ];
    
            return view('gudang/pengeluaran-barang', $data);
        }else{
            return redirect('/login');
        }
    }

    public function lihat_pengeluaran_barang($kode)
    {
        if(session()->has('user') && session('user')->jabatan == 'Gudang'){

            $fakturs = DB::select("SELECT DISTINCT(no_faktur) FROM `tb_penjualan`");
            $penjualan = Penjualan::where('kode_barang', $kode)->get();

            foreach ( $fakturs as $i=>$faktur){
                $total_barang = 0;
                $tanggal = '';
                $alamat = '';

               
                foreach ( $penjualan as $key=>$item){
                    if($faktur->no_faktur == $item['no_faktur']){
                        $total_barang=$total_barang + $item['qty'];
                        $tanggal = $item['tgl_penjualan'];
                        $alamat = $item['alamat'];
                    }
                }
                
                $fakturs[$i]->total_barang =  $total_barang;
                $fakturs[$i]->tanggal =  $tanggal;
                $fakturs[$i]->alamat =  $alamat;
            }

            $data = [
                'title' => 'Pengeluaran Barang',
                'barang' => Barang::find($kode),
                'penjualan' => $fakturs,
            ];
    
            return view('gudang/lihat-pengeluaran-barang', $data);
        }else{
            return redirect('/login');
        }
    }
}

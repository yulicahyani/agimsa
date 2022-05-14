<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Barang;
use App\Models\Customer;
use App\Models\Pegawai;
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
            
            if( $request->isMethod('POST')){
                
                $post = $request->validate([
                    'id_customer' => 'required',
                    'nama_customer' => 'required',
                    'alamat' => 'required',
                    'kode_barang' => 'required',
                    'nama_barang' => 'required',
                    'tanggal_pesan' => 'required',
                    'qty' => 'required',
                    'pembayaran' => 'required',
                    'harga' => 'required',
                    'sales' => 'required',
                    'status' => 'required',
                ]);
    
                $pemesanan->id_customer = $post['id_customer'];
                $pemesanan->nama_customer = $post['nama_customer'];
                $pemesanan->alamat = $post['alamat'];
                $pemesanan->kode_barang = $post['kode_barang'];
                $pemesanan->nama_barang = $post['nama_barang'];
                $pemesanan->tanggal_pesan = $post['tanggal_pesan'];
                $pemesanan->qty = $post['qty'];
                $pemesanan->pembayaran = $post['pembayaran'];
                $pemesanan->harga = $post['harga'];
                $pemesanan->sales = $post['sales'];
                $pemesanan->status = $post['status'];

                if ( $pemesanan->isDirty() ){
                    $pemesanan->save();
                    return redirect()->route('pemesanan')->with(['success'=>'Update berhasil disimpan']);
                }

                return redirect()->route('pemesanan')->with(['warning'=>'Tidak ada perubahan']);
                
            }
            

            $data = [
                'title' => 'Pemesanan',
                'pemesanan'=>$pemesanan,
                'customer'=>Customer::all(),
                'barang'=>Barang::all(),
                'sales'=>Pegawai::where('jabatan', 'Sales')->get()

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

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
   
    public function index(Request $request)
    {
        if(session()->has('user') && session('user')->jabatan == 'Admin'){

            if($request->isMethod('POST')){
                $post = $request->validate([
                    'tanggal_pesan'=> 'required'
                ]);
                $pemesanan = Pemesanan::where('tanggal_pesan', $post['tanggal_pesan'])->get();
                $data = [
                    'title' => 'Pemesanan',
                    'pemesanan' => $pemesanan
                ];
                return view('admin/pemesanan', $data);
            }
            
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


    //Sales

    public function index_sales()
    {
        if(session()->has('user') && session('user')->jabatan == 'Sales'){
            $data = [
                'title' => 'Pemesanan',
                'pemesanan' => Pemesanan::all()
            ];
    
            return view('sales/pemesanan', $data);
        }else{
            return redirect('/login');
        }
    }

    public function edit_pemesanan_sales(Request $request, $id)
    {
        if(session()->has('user') && session('user')->jabatan == 'Sales'){
            
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
                    return redirect()->route('pemesanan_sales')->with(['success'=>'Update berhasil disimpan']);
                }

                return redirect()->route('pemesanan_sales')->with(['warning'=>'Tidak ada perubahan']);
                
            }
            

            $data = [
                'title' => 'Pemesanan',
                'pemesanan'=>$pemesanan,
                'customer'=>Customer::all(),
                'barang'=>Barang::all(),
                'sales'=>Pegawai::where('jabatan', 'Sales')->get()

            ];
    
            return view('sales/edit-pesanan', $data);
        }else{
            return redirect('/login');
        }

    }

    public function tambah_pesanan(Request $request)
    {
        if(session()->has('user') && session('user')->jabatan == 'Sales'){
           
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

                $pemesanan = new Pemesanan();
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
                $pemesanan->save();

                return redirect()->route('pemesanan_sales')->with(['success'=>'Data berhasil ditambahkan']);
            }
           
            $data = [
                'title' => 'Pemesanan',
                'customer'=>Customer::all(),
                'barang'=>Barang::all(),
                'sales'=>Pegawai::where('jabatan', 'Sales')->get()

            ];
    
            return view('sales/tambah-pesanan', $data);
        }else{
            return redirect('/login');
        }

    }

    public function delete_pemesanan_sales(Request $request)
    {
        if(session()->has('user') && session('user')->jabatan == 'Sales'){
            Pemesanan::find($request->id_pemesanan)->delete();
            return redirect()->route('pemesanan_sales')->with(['success'=>'Data berhasil dihapus!']);
        }else{
            return redirect('/login');
        }

    }

    
}

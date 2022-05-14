<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Customer;
use App\Models\Pegawai;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePenjualanRequest;
use App\Http\Requests\UpdatePenjualanRequest;

class PenjualanController extends Controller
{
    
    public function index(Request $request)
    {
        if(session()->has('user') && session('user')->jabatan == 'Admin'){
            // dd(Pemesanan::max('qty'));
            if($request->isMethod('POST')){
                $post = $request->validate([
                    'customer'=>'required',
                    'sales'=>'required',
                ]);
                
                $pesanan = Pemesanan::where('id_customer', $post['customer'])->where('sales', $post['sales'])->where('status', 'setuju')->get();
                
                //hitung total harga dan jumlah bayar
                $jumlah_bayar = 0;
                foreach ($pesanan as $key=>$item){
                    $pesanan[$key]['total'] = $item->qty * $item->harga;
                    $jumlah_bayar = $jumlah_bayar + ($item->qty * $item->harga);
                }

                //cek no faktur
                $no_faktur = 0;
                if (Penjualan::max('no_faktur')==null){
                    $no_faktur = 1;
                }else{
                    $no_faktur = (int)Penjualan::max('no_faktur') + 1;
                }
                $data = [
                    'title' => 'Penjualan Baru',
                    'customer' => Customer::all(),
                    'pegawai' => Pegawai::where('jabatan', 'Sales')->get(),
                    'current_customer' => Customer::find($post['customer']),
                    'name_sales'=>Pegawai::where('nama_pegawai', $post['sales'])->get('nama_pegawai')[0]->nama_pegawai,
                    'no_faktur' => $no_faktur,
                    'pesanan'=>$pesanan,
                    'jumlah_bayar'=>$jumlah_bayar
                ];
                return view('admin/penjualan-baru', $data);
            }
            
            $data = [
                'title' => 'Penjualan Baru',
                'customer' => Customer::all(),
                'pegawai' => Pegawai::where('jabatan', 'Sales')->get(),
            ];
    
            return view('admin/penjualan-baru', $data);
        }else{
            return redirect('/login');
        }
    }

    public function tambah_penjualan(Request $request)
    {
        if(session()->has('user') && session('user')->jabatan == 'Admin'){

            $post = $request->validate([
                'customer'=>'required',
                'id_customer'=>'required',
                'sales'=>'required',
                'alamat'=>'required',
                'faktur'=>'required',
                'tanggal'=>'required',
            ]);
            
            $pesanan = Pemesanan::where('id_customer', $post['id_customer'])->where('sales', $post['sales'])->where('status', 'setuju')->get();

            //hitung total harga dan jumlah bayar
            foreach ($pesanan as $key=>$item){
                $pesanan[$key]['total_harga'] = $item->qty * $item->harga;
            }

            //simpan ke tb_penjualan
            foreach($pesanan as $key=>$item){
                $penjualan = new Penjualan();
                $penjualan->no_faktur = $post['faktur'];
                $penjualan->id_pemesanan = $item->id_pemesanan;
                $penjualan->kode_barang = $item->kode_barang;
                $penjualan->nama_barang = $item->nama_barang;
                $penjualan->tgl_penjualan = $post['tanggal'];
                $penjualan->qty = $item->qty;
                $penjualan->harga = $item->harga;
                $penjualan->total_harga = $item->total_harga;
                $penjualan->alamat = $item->alamat;
                $penjualan->save();
            }

            //Update status pemesanan menjadi 'selesai'
            foreach ($pesanan as $key=>$item){
                $update_pesanan = Pemesanan::find($item->id_pemesanan);
                $update_pesanan->status = 'selesai';
                $update_pesanan->save();
            }
            
            $data = [
                'title' => 'Jumlah Penjualan'
            ];  
            return redirect()->route('jumlah-penjualan')->with(['success'=>'Data berhasil ditambahkan']);
        }else{
            return redirect('/login');
        }
    }

    public function jumlah_penjualan(Request $request)
    {
        if(session()->has('user') && session('user')->jabatan == 'Admin'){
            
            $fakturs = DB::select("SELECT DISTINCT(no_faktur) FROM `tb_penjualan`");
            $penjualan = Penjualan::all();
            

            foreach ( $fakturs as $i=>$faktur){
                $jumlah_bayar = 0;
                $id_pemesanan = 0;
                foreach ( $penjualan as $key=>$item){
                    if($faktur->no_faktur == $item['no_faktur']){
                        $jumlah_bayar=$jumlah_bayar + $item['total_harga'];
                        $id_pemesanan = $item['id_pemesanan'];
                    }
                }
                
                $fakturs[$i]->jumlah_bayar =  $jumlah_bayar;
                $fakturs[$i]->nama_customer =  Pemesanan::where('id_pemesanan', $id_pemesanan)->get('nama_customer')[0]->nama_customer;
            }

            $data = [
                'title' => 'Jumlah Penjualan',
                'fakturs' => $fakturs
            ];
    
            return view('admin/jumlah-penjualan', $data);
        }else{
            return redirect('/login');
        }
    }

    public function lihat_penjualan(Request $request, $faktur)
    {
        if(session()->has('user') && session('user')->jabatan == 'Admin'){
            
            $penjualan = Penjualan::where('no_faktur', $faktur)->get();
            $jumlah_bayar = DB::select("SELECT SUM(total_harga) AS jb FROM `tb_penjualan` WHERE no_faktur= :faktur", ['faktur'=>$faktur])[0]->jb;
            $pemesanan = Pemesanan::where('id_pemesanan', $penjualan[0]->id_pemesanan)->first();

            $data = [
                'title' => 'Lihat Penjualan',
                'penjualan' => $penjualan,
                'pemesanan' => $pemesanan,
                'jumlah_bayar' => $jumlah_bayar                      
            ];
    
            return view('admin/lihat-penjualan', $data);
        }else{
            return redirect('/login');
        }
    }

    public function delete_penjualan(Request $request)
    {
        if(session()->has('user') && session('user')->jabatan == 'Admin'){   
            Penjualan::where('no_faktur', $request->no_faktur)->delete();
            return redirect()->route('jumlah-penjualan')->with(['success'=>'Data berhasil dihapus!']);
        }else{
            return redirect('/login');
        }
    }
}

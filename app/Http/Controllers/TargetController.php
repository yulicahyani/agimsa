<?php

namespace App\Http\Controllers;

use App\Models\Target;
use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Penjualan;
use App\Models\Pemesanan;
use App\Http\Requests\StoreTargetRequest;
use App\Http\Requests\UpdateTargetRequest;

class TargetController extends Controller
{
    //sales
    public function index(Request $request)
    {
        if(session()->has('user') && session('user')->jabatan == 'Sales'){

            if($request->isMethod('POST')){
                $post = $request->validate([
                    'bulan'=> 'required'
                ]);
                $target = Target::whereMonth('tanggal', '=', date($post['bulan']))->get();
                $data = [
                    'title' => 'Target Penjualan',
                    'target' => $target
                ];
                return view('sales/target-penjualan', $data);
            }
            

            $data = [
                'title' => 'Target Penjualan',
                'target' => Target::all()
            ];
    
            return view('sales/target-penjualan', $data);
        }else{
            return redirect('/login');
        }
    }

    //admin
    public function index_admin(Request $request)
    {
        if(session()->has('user') && session('user')->jabatan == 'Admin'){

            if($request->isMethod('POST')){
                $post = $request->validate([
                    'bulan'=> 'required'
                ]);
                $target = Target::whereMonth('tanggal', '=', date($post['bulan']))->get();
                $data = [
                    'title' => 'Target',
                    'target' => $target
                ];
                return view('admin/target', $data);
            }
            
            $data = [
                'title' => 'Target',
                'target' => Target::all()
            ];
    
            return view('admin/target', $data);
        }else{
            return redirect('/login');
        }
    }

    public function edit_target(Request $request, $id)
    {
        if(session()->has('user') && session('user')->jabatan == 'Admin'){
            
            $target = Target::find($id);
            
            if( $request->isMethod('POST')){
                
                $post = $request->validate([
                    'id_pegawai' => 'required',
                    'nama_pegawai' => 'required',
                    'tanggal' => 'required',
                    'penjualan' => 'required',
                    'persentase' => 'required',
                    'status' => 'required',
                ]);

                $target->id_pegawai = $post['id_pegawai'];
                $target->nama_sales = $post['nama_pegawai'];
                $target->tanggal = $post['tanggal'];
                $target->penjualan = $post['penjualan'];
                $target->persentase = $post['persentase'];
                $target->status = $post['status'];


                if ( $target->isDirty() ){
                    $target->save();
                    return redirect()->route('target')->with(['success'=>'Update berhasil disimpan']);
                }

                return redirect()->route('target')->with(['warning'=>'Tidak ada perubahan']);
                
            }
            

            $data = [
                'title' => 'Target',
                'target'=>$target,
                'sales'=>Pegawai::where('jabatan', 'Sales')->get()
            ];
    
            return view('admin\edit-target', $data);
        }else{
            return redirect('/login');
        }

    }

    public function tambah_target(Request $request)
    {
        if(session()->has('user') && session('user')->jabatan == 'Admin'){
           
            if( $request->isMethod('POST')){

                $post = $request->validate([
                    'id_pegawai' => 'required',
                    'nama_pegawai' => 'required',
                    'tanggal' => 'required',
                    'penjualan' => 'required',
                    'persentase' => 'required',
                    'status' => 'required',
                ]);
    

                $target = new Target();
                $target->id_pegawai = $post['id_pegawai'];
                $target->nama_sales = $post['nama_pegawai'];
                $target->tanggal = $post['tanggal'];
                $target->penjualan = $post['penjualan'];
                $target->persentase = $post['persentase'];
                $target->status = $post['status'];
                $target->save();

                return redirect()->route('target')->with(['success'=>'Data berhasil ditambahkan']);
            }
           
            $data = [
                'title' => 'Target',
                'sales'=>Pegawai::where('jabatan', 'Sales')->get()

            ];
    
            return view('admin/tambah-target', $data);
        }else{
            return redirect('/login');
        }

    }

    public function detail_penjualan(Request $request){
        $target = Target::where('id_pegawai', $request->id_pegawai)->latest('tanggal')->first(['tanggal','penjualan']);
        $pemesanan = Pemesanan::where('sales', $request->nama_pegawai)->where('status', 'selesai')->get(['id_pemesanan']);

        $id_pesan = [];
        foreach ($pemesanan as $item){
            $id_pesan[] = $item -> id_pemesanan;
        }

        if($target != null){

            
            $last_tanggal = $target['tanggal'];
            $penjualan_sb = $target['penjualan'];

            $penjualan = Penjualan::wherein('id_pemesanan', $id_pesan)->whereDate('tgl_penjualan', '>' , $last_tanggal)->get(['total_harga']);

            $penjualan_array = [];
            foreach ($penjualan as $item){
                $penjualan_array[] = $item -> total_harga;
            }
            $total_penjualan = array_sum($penjualan_array);
            $data = [
                'status' => 200,
                'penjualan_sebelum' => $penjualan_sb,
                'penjualan' => $total_penjualan
            ];
        }else{

            $penjualan = Penjualan::wherein('id_pemesanan', $id_pesan)->get(['total_harga']);
            $penjualan_array = [];
            foreach ($penjualan as $item){
                $penjualan_array[] = $item -> total_harga;
            }
            $total_penjualan = array_sum($penjualan_array);

            $data = [
                'status' => 200,
                'penjualan_sebelum' => 0,
                'penjualan' => $total_penjualan
            ];
        }

        return $data;
    }

    
    public function delete_target(Request $request)
    {
        if(session()->has('user') && session('user')->jabatan == 'Admin'){
            Target::find($request->id_target )->delete();
            return redirect()->route('target')->with(['success'=>'Data berhasil dihapus!']);
        }else{
            return redirect('/login');
        }

    }

    public function lihat_target($id)
    {
        if(session()->has('user') && session('user')->jabatan == 'Admin'){
            $data = [
                'title' => 'Target',
                'target'=> Target::find($id),
                'sales' => Pegawai::where('jabatan', 'Sales')->get()
            ];
    
            return view('admin\lihat-target', $data);
        }else{
            return redirect('/login');
        }

    }



}

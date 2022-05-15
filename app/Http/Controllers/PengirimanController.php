<?php

namespace App\Http\Controllers;

use App\Models\Pengiriman;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Http\Requests\StorePengirimanRequest;
use App\Http\Requests\UpdatePengirimanRequest;

class PengirimanController extends Controller
{
    
    public function index()
    {
        if(session()->has('user') && session('user')->jabatan == 'Admin'){
           
            $data = [
                'title'=>'Pengiriman',
                'pengiriman'=>Pengiriman::all()
            ];
            return view('admin/pengiriman', $data);
        }else{
            return redirect('/login');
        }

    }

    public function tambah_pengiriman(Request $request)
    {
        if(session()->has('user') && session('user')->jabatan == 'Admin'){
           if ($request->isMethod('POST') ){
                $post = $request->validate([
                    'nama_pengirim' => 'required',
                    'tgl_kirim' => 'required',
                    'alamat' => 'required',
                    'status' => 'required',
                ]);

                $pengirim = new Pengiriman();
                $pengirim->nama_pengirim = $post['nama_pengirim'];
                $pengirim->tgl_kirim = $post['tgl_kirim'];
                $pengirim->alamat = $post['alamat'];
                $pengirim->status = $post['status'];
                $pengirim->save();
                return redirect()->route('pengiriman')->with(['success'=>'Data berhasil ditambahkan']);
           }



            $data = [
                'title'=>'Pengiriman',
                'pengirim'=>Pegawai::where('jabatan', 'Pengirim')->get(),
            ];
            return view('admin/tambah-pengiriman', $data);
        }else{
            return redirect('/login');
        }

    }

    public function edit_pengiriman(Request $request, $id)
    {
        if(session()->has('user') && session('user')->jabatan == 'Admin'){
            
            if($request->isMethod('POST')){
                $post = $request->validate([
                    'nama_pengirim' => 'required',
                    'tgl_kirim' => 'required',
                    'alamat' => 'required',
                    'status' => 'required',
                ]);

                $pengirim = Pengiriman::find($id);
                $pengirim->nama_pengirim = $post['nama_pengirim'];
                $pengirim->tgl_kirim = $post['tgl_kirim'];
                $pengirim->alamat = $post['alamat'];
                $pengirim->status = $post['status'];

                if($pengirim->isDirty()){
                    $pengirim->save();
                    return redirect()->route('pengiriman')->with(['success'=>'Update berhasil disimpan']);
                }

                return redirect()->route('pengiriman')->with(['warning'=>'Tidak ada perubahan']);
            }

            $data = [
                'title'=>'Pengiriman',
                'pengiriman'=>Pengiriman::find($id),
                'pengirim'=>Pegawai::where('jabatan', 'Pengirim')->get()
            ];
            
            return view('admin/edit-pengiriman', $data);
        }else{
            return redirect('/login');
        }

    }

    public function lihat_pengiriman(Request $request, $id)
    {
        if(session()->has('user') && session('user')->jabatan == 'Admin'){
            $data = [
                'title'=>'Pengiriman',
                'pengiriman'=> Pengiriman::find($id)
            ];
            return view('admin/lihat-pengiriman', $data);
        }else{
            return redirect('/login');
        }

    }

    public function delete_pengiriman(Request $request)
    {
        if(session()->has('user') && session('user')->jabatan == 'Admin'){
            Pengiriman::find($request->id_pengiriman)->delete();
            return redirect()->route('pengiriman')->with(['success'=>'Data berhasil dihapus!']);
        }else{
            return redirect('/login');
        }

    }

    
}

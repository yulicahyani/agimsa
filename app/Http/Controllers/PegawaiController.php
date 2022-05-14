<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Http\Requests\StorePegawaiRequest;
use App\Http\Requests\UpdatePegawaiRequest;

class PegawaiController extends Controller
{

    public function index(Request $request)
    {   
        if(session()->has('user') && session('user')->jabatan == 'Admin'){
            if($request->isMethod('POST')){
                //create pegawai
                $post = $request->validate([
                    'nama_pegawai' => 'required',
                    'alamat' => 'required',
                    'email' => 'required|unique:tb_pegawai|email',
                    'no_tlp' => 'required',
                    'tempat_lahir' => 'required',
                    'tgl_lahir' => 'required|date',
                    'username' => 'required|unique:tb_pegawai',
                    'password' => 'required',
                    'agama' => 'required',
                    'jabatan' => 'required',
                    'jenis_kelamin' => 'required',
                ]);
    
                $user = new Pegawai();
                $user->jabatan = $post['jabatan'];
                $user->nama_pegawai = $post['nama_pegawai'];
                $user->tempat_lahir = $post['tempat_lahir'];
                $user->tgl_lahir = $post['tgl_lahir'];
                $user->jenis_kelamin = $post['jenis_kelamin'];
                $user->no_tlp = (string)$post['no_tlp'];
                $user->username = $post['username'];
                $user->password = $post['password'];
                $user->agama = $post['agama'];
                $user->email = $post['email'];
                $user->alamat = $post['alamat'];
                $user->save();
                return redirect()->route('data-pegawai')->with(['success'=>'User berhasil ditambahkan']);
            }
    
            $data = [
                'title'=> 'New User'
            ];
    
            return view('admin/new-user', $data);
        }else{
            return redirect('/login');
        }
        

    }

    public function data_pegawai(Request $request){
        if(session()->has('user') && session('user')->jabatan == 'Admin'){
            $data = [
                'title'=> 'Data Pegawai',
                'pegawai'=> Pegawai::all()
            ];
            return view('admin/data-pegawai', $data);
        }else{
            return redirect('/login');
        }
       
    }

    public function detail_pegawai(Request $request, $id){
        if(session()->has('user') && session('user')->jabatan == 'Admin'){
            $data = [
                'title'=>'Lihat Pegawai',
                'pegawai'=> Pegawai::find($id)
            ];
            return view('admin/lihat-pegawai', $data);
        }else{
            return redirect('/login');
        }
    }

    public function edit_pegawai(Request $request, $id){
        if(session()->has('user') && session('user')->jabatan == 'Admin'){
            $pegawai = Pegawai::find($id);
            if($request->isMethod('POST')){
                $post = $request->validate([
                    'nama_pegawai' => 'required',
                    'alamat' => 'required',
                    'email' => 'required|email',
                    'no_tlp' => 'required',
                    'tempat_lahir' => 'required',
                    'tgl_lahir' => 'required|date',
                    'username' => 'required',
                    'password' => 'required',
                    'agama' => 'required',
                    'jabatan' => 'required',
                    'jenis_kelamin' => 'required',
                ]);

                $pegawai->jabatan = $post['jabatan'];
                $pegawai->nama_pegawai = $post['nama_pegawai'];
                $pegawai->tempat_lahir = $post['tempat_lahir'];
                $pegawai->tgl_lahir = $post['tgl_lahir'];
                $pegawai->jenis_kelamin = $post['jenis_kelamin'];
                $pegawai->no_tlp = (string)$post['no_tlp'];
                $pegawai->username = $post['username'];
                $pegawai->password = $post['password'];
                $pegawai->agama = $post['agama'];
                $pegawai->email = $post['email'];
                $pegawai->alamat = $post['alamat'];

                if($pegawai->isDirty()){
                    if($pegawai->isDirty('username')){
                        $validateUsername = $request->validate(['username'=>'unique:tb_pegawai']);
                        $pegawai->username = $validateUsername['username'];
                    }

                    if($pegawai->isDirty('email')){
                        $validateEmail = $request->validate(['email'=>'unique:tb_pegawai']);
                        $pegawai->email = $validateEmail['email'];
                    }

                    $pegawai->save();
                    return redirect()->route('data-pegawai')->with(['success'=>'Update berhasil disimpan']);
                }
                return redirect()->route('data-pegawai')->with(['warning'=>'Tidak ada perubahan']);
            }


            $data = [
                'title'=>'Edit Pegawai',
                'pegawai'=> $pegawai
            ];
            return view('admin/edit-pegawai', $data);
        }else{
            return redirect('/login');
        }

        
    }

    
    public function delete_pegawai(Request $request){
        if(session()->has('user') && session('user')->jabatan == 'Admin'){
            Pegawai::find($request->id_pegawai)->delete();
            return redirect()->route('data-pegawai')->with(['success'=>'Data berhasil dihapus!']);
        }else{
            return redirect('/login');
        }
       
    }

    public function detail_pegawai_by_id(Request $request){
        $pegawai = Pegawai::where('id_pegawai', $request->pegawai)->get();

        if(!$pegawai->isEmpty()){
            $data = [
                'status' => 200,
                'data' =>  $pegawai
            ];
        }else{
            $data = [
                'status' => 500,
            ];
        }
        return $data;
    }

    
}

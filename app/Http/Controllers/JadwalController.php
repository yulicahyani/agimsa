<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Customer;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Http\Requests\StoreJadwalRequest;
use App\Http\Requests\UpdateJadwalRequest;

class JadwalController extends Controller
{
    
    public function index_sales()
    {
        if(session()->has('user') && session('user')->jabatan == 'Sales'){
            $data = [
                'title' => 'Jadwal Kunjungan',
                'jadwal' => Jadwal::all()
            ];
    
            return view('sales/jadwal-kunjungan', $data);
        }else{
            return redirect('/login');
        }
    }

    public function edit_jadwal_sales(Request $request, $id)
    {
        if(session()->has('user') && session('user')->jabatan == 'Sales'){
            
            $jadwal = Jadwal::find($id);
            
            if( $request->isMethod('POST')){
                
                $post = $request->validate([
                    'id_pegawai' => 'required',
                    'id_customer' => 'required',
                    'nama_pegawai' => 'required',
                    'nama_customer' => 'required',
                    'daerah' => 'required',
                    'lokasi_kunjungan' => 'required',
                    'tanggal' => 'required',
                    'keterangan' => 'required',
                    'status' => 'required',
                ]);
    
                $jadwal->id_pegawai = $post['id_pegawai'];
                $jadwal->id_customer = $post['id_customer'];
                $jadwal->nama_pegawai = $post['nama_pegawai'];
                $jadwal->nama_customer = $post['nama_customer'];
                $jadwal->daerah = $post['daerah'];
                $jadwal->lokasi_kunjungan = $post['lokasi_kunjungan'];
                $jadwal->tanggal = $post['tanggal'];
                $jadwal->keterangan = $post['keterangan'];
                $jadwal->status = $post['status'];
                

                if ( $jadwal->isDirty() ){
                    $jadwal->save();
                    return redirect()->route('jadwal-kunjungan')->with(['success'=>'Update berhasil disimpan']);
                }

                return redirect()->route('jadwal-kunjungan')->with(['warning'=>'Tidak ada perubahan']);
                
            }
            

            $data = [
                'title' => 'Jadwal Kunjungan',
                'jadwal'=>$jadwal,
                'customer'=>Customer::all(),
                'sales'=>Pegawai::where('jabatan', 'Sales')->get()

            ];
    
            return view('sales/edit-jadwal', $data);
        }else{
            return redirect('/login');
        }

    }

    public function delete_jadwal(Request $request)
    {
        if(session()->has('user') && session('user')->jabatan == 'Sales'){
            Jadwal::find($request->id_kunjungan )->delete();
            return redirect()->route('jadwal-kunjungan')->with(['success'=>'Data berhasil dihapus!']);
        }else{
            return redirect('/login');
        }

    }

    public function lihat_jadwal($id)
    {
        if(session()->has('user') && session('user')->jabatan == 'Sales'){
            $data = [
                'title' => 'Jadwal Kunjungan',
                'jadwal'=> Jadwal::find($id)
            ];
    
            return view('sales/lihat-jadwal', $data);
        }else{
            return redirect('/login');
        }

    }
    
}

<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;

class CustomerController extends Controller
{
   
    public function index()
    {
        if(session()->has('user') && session('user')->jabatan == 'Admin'){
            $data = [
                'title' => 'Customer',
                'customer' => Customer::all()
            ];
    
            return view('admin/customer', $data);
        }else{
            return redirect('/login');
        }
        
    }

    public function lihat_customer(Request $request, $id)
    {
        if(session()->has('user') && session('user')->jabatan == 'Admin'){
            $data = [
                'title' => 'Customer',
                'customer'=> Customer::find($id)
            ];
    
            return view('admin/lihat-customer', $data);
        }else{
            return redirect('/login');
        }

    }

    public function tambah_customer(Request $request)
    {
        if(session()->has('user') && session('user')->jabatan == 'Admin'){
           
            if( $request->isMethod('POST')){
                $post = $request->validate([
                    'nama_customer' => 'required',
                    'daerah' => 'required',
                    'alamat' => 'required',
                    'telepon' => 'required',
                    'email' => 'required|email',
                ]);
    
                $customer = new Customer();
                $customer->nama_customer = $post['nama_customer'];
                $customer->daerah = $post['daerah'];
                $customer->alamat = $post['alamat'];
                $customer->telepon = (string)$post['telepon'];
                $customer->email = $post['email'];
                $customer->save();
                return redirect()->route('customer')->with(['success'=>'Data berhasil ditambahkan']);
            }
           
            $data = [
                'title' => 'Customer'
            ];
    
            return view('admin/tambah-customer', $data);
        }else{
            return redirect('/login');
        }

    }

    public function edit_customer(Request $request, $id)
    {
        if(session()->has('user') && session('user')->jabatan == 'Admin'){
            
            $customer = Customer::find($id);
            
            if( $request->isMethod('POST')){
                $post = $request->validate([
                    'nama_customer' => 'required',
                    'daerah' => 'required',
                    'alamat' => 'required',
                    'telepon' => 'required',
                    'email' => 'required|email',
                ]);
    
                $customer->nama_customer = $post['nama_customer'];
                $customer->daerah = $post['daerah'];
                $customer->alamat = $post['alamat'];
                $customer->telepon = (string)$post['telepon'];
                $customer->email = $post['email'];

                if ( $customer->isDirty() ){
                    $customer->save();
                    return redirect()->route('customer')->with(['success'=>'Update berhasil disimpan']);
                }

                return redirect()->route('customer')->with(['warning'=>'Tidak ada perubahan']);
                
            }

            $data = [
                'title' => 'Customer',
                'customer'=>$customer
            ];
    
            return view('admin/edit-customer', $data);
        }else{
            return redirect('/login');
        }

    }

    public function delete_customer(Request $request)
    {
        if(session()->has('user') && session('user')->jabatan == 'Admin'){
            Customer::find($request->id_customer)->delete();
            return redirect()->route('customer')->with(['success'=>'Data berhasil dihapus!']);
        }else{
            return redirect('/login');
        }

    }

    public function detail_customer(Request $request){
        $customer = Customer::where('id_customer', $request->customer)->get();

        if(!$customer->isEmpty()){
            $data = [
                'status' => 200,
                'data' =>  $customer
            ];
        }else{
            $data = [
                'status' => 500,
            ];
        }
        return $data;
    }

    
}

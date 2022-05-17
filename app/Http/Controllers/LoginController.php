<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;

class LoginController extends Controller
{
    public function index(){
        if(session()->has('user')){
            return redirect('/');
        }
        return view('login');
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $user = Pegawai::where('username', '=', $credentials['username'])->where('password', '=', $credentials['password'])->get();

        if(count($user)>0){
            $request->session()->put('user', $user[0]);

            if ( session('user')['jabatan'] == 'Admin'){
                return redirect('/');
            }

            if ( session('user')['jabatan'] == 'Sales'){
                return redirect('/sales');
            }

            if ( session('user')['jabatan'] == 'Gudang'){
                return redirect('/gudang');
            }

            if ( session('user')['jabatan'] == 'Pimpinan'){
                return redirect('/pimpinan');
            }
            return redirect('/');
        }

        return back()->with('loginError', 'Username or Password Wrong!');
    }

    public function logout(Request $request){
        if(session()->has('user')){
            session()->pull('user');
        }
        return redirect('login')->with('success', 'You have successfully logged out');
    }
}

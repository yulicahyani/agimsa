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
            return redirect('/');
        }

        return back()->with('loginError', 'Username atau Password Salah!');
    }

    public function logout(Request $request){
        if(session()->has('user')){
            session()->pull('user');
        }
        return redirect('login')->with('success', 'Anda berhasil logout');
    }
}

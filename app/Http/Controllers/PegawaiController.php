<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Http\Requests\StorePegawaiRequest;
use App\Http\Requests\UpdatePegawaiRequest;

class PegawaiController extends Controller
{
    
    public function index(Request $request)
    {   
        if($request->isMethod('POST')){
            //create pegawai
            
        }

        $data = [
            'title'=> 'New User'
        ];

        return view('admin/new-user', $data);
    }

    
}

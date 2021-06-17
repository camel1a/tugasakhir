<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use App\Models\Pegawai;
use App\Models\Konsumen;

use Illuminate\Http\Request;

class login extends Controller
{
    function login(Request $kiriman){
        $dataadmin= Admin::where ('username', $kiriman->username) ->where('password', $kiriman->password)->get();
        $datapegawai= Pegawai::where ('username', $kiriman->username) ->where('password', $kiriman->password)->get();
        $datakonsumen= Konsumen::where ('email', $kiriman->username) ->where('password', $kiriman->password)->get();

        
        if (count ($dataadmin)>0){

            Auth::guard('admin')->LoginUsingId($dataadmin[0]['username']);
            return redirect('/admin/dashboard');

        }else if (count ($datapegawai)>0){

            Auth::guard('pegawai')->LoginUsingId($datapegawai[0]['id_pegawai']);
            return redirect('/pegawai/dashboard-pegawai');

        }else if (count ($datakonsumen)>0){

            Auth::guard('konsumen')->LoginUsingId($datakonsumen[0]['id_konsumen']);
            return redirect('/konsumen/profile-konsumen');
            

        }else{
            return redirect('/login');
        }
        

    }

    function logout(){

        if(Auth::guard('admin')->check()){

            Auth::guard('admin')->logout();

        }else if(Auth::guard('pegawai')->check()){

            Auth::guard('pegawai')->logout();

        }else if (Auth::guard('konsumen')->check()){

            Auth::guard('konsumen')->logout();

        }

        return redirect('/login');

    }

}

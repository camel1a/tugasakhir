<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use DB;

class PegawaiDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesanan = DB::table('pesanans')->where('id_pegawai', '=',auth()->user()->id_pegawai)->count();
        return view('Pegawai.pegawai',compact('pesanan'))->with('i');   
    }

}

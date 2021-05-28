<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Konsumen;
use App\Models\Pesanan;
use App\Models\Paket;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;

class AdminDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = Pegawai::count();
        $konsumen = Konsumen::count();
        $pesanan = Pesanan::count();
        $pemasukan = Pemasukan::sum('nominal');
        $pengeluaran = Pengeluaran::sum('nominal');
        $paket = Paket::count();
        $total=$pemasukan-$pengeluaran;
        return view('Admin.admin',compact('pegawai','konsumen','pesanan','pemasukan','pengeluaran','paket','total'))->with('i');   
    }

}

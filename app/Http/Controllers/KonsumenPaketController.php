<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paket;

class KonsumenPaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paket = Paket::all();
        return view('Konsumen.data-paket',compact('paket'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $foto = $request->file('foto');
        $new_name = rand().'.'.$foto->getClientOriginalExtension();
        $foto->move(public_path('foto'), $new_name);

        $data = array(
            'jenis'=>$request->jenis,
            'deskripsi'=>$request->deskripsi,
            'harga'=>$request->harga,
            'foto'=>$new_name,
            'status'=>"Diterima"
        );
        Paket::create($data);
        return redirect('konsumen\paket-konsumen')->with('success','paket berhasil ditambah');
    }

}

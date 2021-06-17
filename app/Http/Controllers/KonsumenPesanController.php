<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Paket;

class KonsumenPesanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // untuk menampilkan
    public function index()
    {
        $pesanan = Pesanan::all();
        $paket = Paket::all();
        return view('Konsumen.pesan-paket',compact('pesanan','paket'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $data = array(
            'id_konsumen'=>auth()->user()->id_konsumen,
            'id_pegawai'=>1,
            'id_paket'=>$request->id_paket,
            'tgl'=>$request->tgl
        );
        Pesanan::create($data);
        return redirect('konsumen\pesan-konsumen')->with('success','Data Pesan paket berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // untuk edit
    public function update(Request $request, $id)
    {
         if($request->has('id_paket'))
        {
            $data = array(
                'id_paket'=>$request->id_paket,
            );
        Pesanan::whereid_pesanan($id)->update($data);
        }
            $data = array(
            'id_paket'=>$request->id_paket,
            'tgl'=>$request->tgl
            );
        Pesanan::whereid_pesanan($id)->update($data);
        return redirect('konsumen\pesan-konsumen');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // untuk hapus
    public function destroy($id)
    {
        try{
            $datas = Pesanan::findOrfail($id);
            $datas->delete();
            return redirect('konsumen\pesan-konsumen')->with('success','pesan paket Berhasil Dihapus');
        }catch(\Throwable $th){
            return redirect('konsumen\pesan-konsumen')->withErrors('Data gagal dihapus. Harap hapus data yang terkait');
        }
    }
}

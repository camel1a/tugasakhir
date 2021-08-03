<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Paket;
use App\Models\konsumen;
use App\Models\Transportasi;
use DB;

class PegawaiPesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paket = Paket::all();
        $konsumen = Konsumen::all();
        $pesanan = Pesanan::all();
        $transportasi = Transportasi::all();
        
        return view('Pegawai.data-pesanan',compact('pesanan','paket','konsumen','transportasi'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = array(
            'id_pegawai'=>auth()->user()->id_pegawai,
            'id_konsumen'=>$request->id_konsumen,
            'id_paket'=>$request->id_paket,
            'id_transportasi'=>$request->id_transportasi,
            'alamat'=>$request->alamat,
            'tgl'=>$request->tgl
        );
        Pesanan::create($data);
        return redirect('pegawai\pesanan-pegawai')->with('success','Data Pegawai berhasil ditambah');
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
            if($request->has('id_konsumen'))
            {
                $data = array(
                    'id_konsumen'=>$request->id_konsumen,
                );
            Pesanan::whereid_pesanan($id)->update($data);
            }

            if($request->has('id_paket'))
            {
                $data = array(
                    'id_paket'=>$request->id_paket,
                );
            Pesanan::whereid_pesanan($id)->update($data);
            }

            if($request->has('tgl'))
            {
                $data = array(
                    'tgl'=>$request->tgl,
                );
            Pesanan::whereid_pesanan($id)->update($data);
            }
            
            return redirect('pegawai\pesanan-pegawai');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $datas = Pesanan::findOrfail($id);
            $datas->delete();
            return redirect('pegawai\pesanan-pegawai')->with('success','pesanan Berhasil Dihapus');
        }catch(\Throwable $th){
            return redirect('pegawai\pesanan-pegawai')->withErrors('Data gagal dihapus. Harap hapus data yang terkait');
        }
    }
}

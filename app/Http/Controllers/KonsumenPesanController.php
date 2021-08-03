<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Paket;
use App\Models\Transportasi;
use App\Models\Transaksi;



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
        $transportasi = Transportasi::all();
        $transaksi = Transaksi::all();

        return view('Konsumen.pesan-paket',compact('pesanan','paket','transportasi','transaksi'))->with('i');
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
            'id_transportasi'=>$request->id_transportasi,
            'alamat'=>$request->alamat,
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
            if($request->has('id_transportasi'))
            {
                $data = array(
                    'id_transportasi'=>$request->id_transportasi,
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

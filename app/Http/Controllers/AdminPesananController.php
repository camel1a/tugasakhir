<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Paket;
use App\Models\konsumen;
use App\Models\Pegawai;

class AdminPesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesanan = Pesanan::all();
        $paket = Paket::all();
        $konsumen = Konsumen::all();
        $pegawai = Pegawai::all();
        return view('Admin.data-pesanan',compact('pesanan','paket','konsumen','pegawai'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $data = array(
            'id_konsumen'=>$request->id_konsumen,
            'id_paket'=>$request->id_paket,
            'tgl'=>$request->tgl
        );
        Pesanan::create($data);
        return redirect('admin\pesanan')->with('success','Data Pesanan berhasil ditambah');
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
            
            if($request->has('id_pegawai'))
            {
                $data = array(
                    'id_pegawai'=>$request->id_pegawai,
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
            
            return redirect('admin\pesanan');

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
            return redirect('admin\pesanan')->with('success','pesanan Berhasil Dihapus');
        }catch(\Throwable $th){
            return redirect('admin\pesanan')->withErrors('Data gagal dihapus. Harap hapus data yang terkait');
        }
    }
}

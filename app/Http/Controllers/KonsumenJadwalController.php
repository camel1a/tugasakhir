<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;

class KonsumenJadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //untuk menampilkan
    public function index()
    {
        $jadwal = Jadwal::all();
        return view('Konsumen.data-jadwal',compact('jadwal'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //untuk tambah
    public function store(Request $request)
    {
        

        $data = array(
            'id_konsumen'=>auth()->user()->id_konsumen,
            'id_pegawai'=>1,
            'tgl'=>$request->tgl,
            'kepentingan'=>$request->kepentingan,
            'status'=>"Menunggu Informasi"
        );
        Jadwal::create($data);
        return redirect('konsumen\jadwal-konsumen')->with('success','Data Pegawai berhasil ditambah');
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

            $data = array(
                'tgl'=>$request->tgl,
                'kepentingan'=>$request->kepentingan,
                'status'=>"Menunggu Informasi"
            );
        Jadwal::whereid_jadwal($id)->update($data);
        return redirect('konsumen\jadwal-konsumen');

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
            $datas = Jadwal::findOrfail($id);
            $datas->delete();
            return redirect('konsumen\jadwal-konsumen')->with('success','jadwal Berhasil Dihapus');
        }catch(\Throwable $th){
            return redirect('konsumen\jadwal-konsumen')->withErrors('Data gagal dihapus. Harap hapus data yang terkait');
        }
    }
}

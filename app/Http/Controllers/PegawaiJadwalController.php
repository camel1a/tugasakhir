<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;

class PegawaiJadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwal = Jadwal::all();
        return view('Pegawai.data-jadwal',compact('jadwal'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
                'status'=>$request->status
            );
        Jadwal::whereid_jadwal($id)->update($data);
        return redirect('pegawai\jadwal-pegawai');

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
            $datas = Jadwal::findOrfail($id);
            $datas->delete();
            return redirect('pegawai\jadwal-pegawai')->with('success','jadwal Berhasil Dihapus');
        }catch(\Throwable $th){
            return redirect('pegawai\jadwal-pegawai')->withErrors('Data gagal dihapus. Harap hapus data yang terkait');
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Pegawai;

class AdminJadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwal = Jadwal::all();
        $pegawai = Pegawai::all();

        return view('Admin.data-jadwal',compact('jadwal','pegawai'))->with('i');
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

            if($request->has('id_pegawai'))
            {
                $data = array(
                    'id_pegawai'=>$request->id_pegawai,
                );
           Jadwal::whereid_jadwal($id)->update($data);
            }

            if($request->has('tgl'))
            {
                $data = array(
                    'tgl'=>$request->tgl,
                );
           Jadwal::whereid_jadwal($id)->update($data);
            }

            if($request->has('kepentingan'))
            {
                $data = array(
                    'kepentingan'=>$request->kepentingan,
                );
           Jadwal::whereid_jadwal($id)->update($data);
            }

            if($request->has('status'))
            {
                $data = array(
                    'status'=>$request->status,
                );
           Jadwal::whereid_jadwal($id)->update($data);
            }
        return redirect('admin\jadwal');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //untuk hapus
    public function destroy($id)
    {
        try{
            $datas = Jadwal::findOrfail($id);
            $datas->delete();
            return redirect('admin\jadwal')->with('success','jadwal Berhasil Dihapus');
        }catch(\Throwable $th){
            return redirect('admin\jadwal')->withErrors('Data gagal dihapus. Harap hapus data yang terkait');
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengeluaran;

class AdminPengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengeluaran = Pengeluaran::all();
        return view('Admin.data-pengeluaran',compact('pengeluaran'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $data = array(
            'jenis'=>$request->jenis,
            'nominal'=>$request->nominal,
            'tgl'=>$request->tgl
        );
        Pengeluaran::create($data);
        return redirect('admin\pengeluaran')->with('success','Data Pengeluaran berhasil ditambah');
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
                'jenis'=>$request->jenis,
                'nominal'=>$request->nominal,
                'tgl'=>$request->tgl
            );
        Pengeluaran::whereid_pengeluaran($id)->update($data);
        return redirect('admin\pengeluaran');

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
            $datas = Pengeluaran::findOrfail($id);
            $datas->delete();
            return redirect('admin\pengeluaran')->with('success','pengeluaran Berhasil Dihapus');
        }catch(\Throwable $th){
            return redirect('admin\pengeluaran')->withErrors('Data gagal dihapus. Harap hapus data yang terkait');
        }
    }
}

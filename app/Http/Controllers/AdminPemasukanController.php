<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemasukan;

class AdminPemasukanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemasukan = Pemasukan::all();
        return view('Admin.data-pemasukan',compact('pemasukan'))->with('i');
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
        Pemasukan::create($data);
        return redirect('admin\Pemasukan')->with('success','Data konsumen berhasil ditambah');
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
        Pemasukan::whereid_pemasukan($id)->update($data);
        return redirect('admin\pemasukan');

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
            $datas = Pemasukan::findOrfail($id);
            $datas->delete();
            return redirect('admin\pemasukan')->with('success','pemasukan Berhasil Dihapus');
        }catch(\Throwable $th){
            return redirect('admin\pemasukan')->withErrors('Data gagal dihapus. Harap hapus data yang terkait');
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paket;

class AdminPaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paket = Paket::all();
        return view('Admin.data-paket',compact('paket'))->with('i');
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
            'foto'=>$new_name
        );
        Paket::create($data);
        return redirect('admin\paket')->with('success','paket berhasil ditambah');
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
        $foto = $request->file('foto');
        if($request->hasFile('foto'))
        {
            $new_name = rand().'.'.$foto->getClientOriginalExtension();
            $foto->move(public_path('foto'), $new_name);
            $data = array(            
                'foto'=>$new_name
            );
        Paket::whereid_paket($id)->update($data);
        }
            $data = array(
                'jenis'=>$request->jenis,
                'deskripsi'=>$request->deskripsi,
                'harga'=>$request->harga
            );
        Paket::whereid_paket($id)->update($data);
        return redirect('admin\paket');

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
            $datas = Paket::findOrfail($id);
            $datas->delete();
            return redirect('admin\paket')->with('success','paket Berhasil Dihapus');
        }catch(\Throwable $th){
            return redirect('admin\paket')->withErrors('Data gagal dihapus. Harap hapus data yang terkait');
        }
    }
}

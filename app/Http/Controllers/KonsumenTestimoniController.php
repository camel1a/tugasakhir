<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimoni;

class KonsumenTestimoniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // untuk menampilkan 
    public function index()
    {
        $testimoni = Testimoni::all();
        return view('Konsumen.data-testimoni',compact('testimoni'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    // untuk tambah
    public function store(Request $request)
    {
        $foto = $request->file('foto');
        $new_name = rand().'.'.$foto->getClientOriginalExtension();
        $foto->move(public_path('foto'), $new_name);
        
        $data = array(
            'id_konsumen'=>auth()->user()->id_konsumen,
            'caption'=>$request->caption,
            'foto'=>$new_name
        );
        Testimoni::create($data);
        return redirect('konsumen\testimoni-konsumen')->with('success','Data Pegawai berhasil ditambah');
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
        Testimoni::whereid_testimoni($id)->update($data);
        }
            $data = array(
                'caption'=>$request->caption
            );
        Testimoni::whereid_testimoni($id)->update($data);
        return redirect('konsumen\testimoni-konsumen');

    }
    // untuk hapus
    public function destroy($id)
    {
        try{
            $datas = Testimoni::findOrfail($id);
            $datas->delete();
            return redirect('konsumen\testimoni-konsumen')->with('success','testimoni Berhasil Dihapus');
        }catch(\Throwable $th){
            return redirect('konsumen\testimoni-konsumen')->withErrors('Data gagal dihapus. Harap hapus data yang terkait');
        }
    }
}

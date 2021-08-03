<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Transportasi;
use App\Models\Kabupaten;

class AdminTransportasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transportasi = Transportasi::all();
        $kabupaten = Kabupaten::all();
        return view('Admin.data-transportasi',compact('transportasi','kabupaten'))->with('i');
    }

    public function show($id)
    {
        $data1= Transportasi::where("id_kabupaten",$id)->get();
        return response()->json($data1);


    }

   

    
    public function store(Request $request)
    {
        $data = array(
            'id_kabupaten'=>$request->id_kabupaten,
            'nama_kec'=>$request->kecamatan,
            'harga'=>$request->harga
            
        );
        Transportasi::create($data);
        return redirect('admin/transportasi')->with('success','paket berhasil ditambah');
    }

   

    public function update(Request $request, $id)
    {
        if($request->has('id_kabupaten'))
            {
                $data = array(
                    'id_kabupaten'=>$request->id_kabupaten,
                );
           Transportasi::whereid_transportasi($id)->update($data);
            }

            $data = array(
                'nama_kec'=>$request->kecamatan,
                'harga'=>$request->harga
            );
          Transportasi::whereid_transportasi($id)->update($data);
          return redirect('admin/transportasi');
    }

    public function destroy($id)
    {
        try{
            $datas = Transportasi::findOrfail($id);
            $datas->delete();
            return redirect('admin/transportasi')->with('success','paket Berhasil Dihapus');
        }catch(\Throwable $th){
            return redirect('admin/transportasi')->withErrors('Data gagal dihapus. Harap hapus data yang terkait');
        }
    }

    
}

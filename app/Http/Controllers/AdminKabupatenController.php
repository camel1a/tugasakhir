<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kabupaten;

class AdminKabupatenController extends Controller
{
    

    
    public function store(Request $request)
    {
        $data = array(
            'nama'=>$request->nama
            
        );
        Kabupaten::create($data);
        return redirect('admin/transportasi')->with('success','paket berhasil ditambah');
    }

    

    public function update(Request $request, $id)
    {
        $data = array(
            'nama'=>$request->nama
        );
      Kabupaten::whereid_kabupaten($id)->update($data);
      return redirect('admin/transportasi');
    }

    public function destroy($id)
    {
        try{
            $datas = Kabupaten::findOrfail($id);
            $datas->delete();
            return redirect('admin/transportasi')->with('success','paket Berhasil Dihapus');
        }catch(\Throwable $th){
            return redirect('admin/transportasi')->withErrors('Data gagal dihapus. Harap hapus data yang terkait');
        }
    }
}

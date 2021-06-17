<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Konsumen;

class AdminKonsumenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $konsumen = Konsumen::all();
        return view('Admin.data-konsumen',compact('konsumen'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $data = array(
            'email'=>$request->email,
            'nama'=>$request->nama,
            'password'=>$request->password,
            'no_hp'=>$request->no_hp,
            'alamat'=>$request->alamat
        );
        Konsumen::create($data);
        return redirect('admin\konsumen')->with('success','Data konsumen berhasil ditambah');
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
            'email'=>$request->email,
            'nama'=>$request->nama,
            'password'=>$request->password,
            'no_hp'=>$request->no_hp,
            'alamat'=>$request->alamat
           );
       Konsumen::whereid_konsumen($id)->update($data);
       return redirect('admin\konsumen');

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
            $datas = Konsumen::findOrfail($id);
            $datas->delete();
            return redirect('admin\konsumen')->with('success','konsumen Berhasil Dihapus');
        }catch(\Throwable $th){
            return redirect('admin\konsumen')->withErrors('Data gagal dihapus. Harap hapus data yang terkait');
        }
    }
}

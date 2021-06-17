<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;

class AdminPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = Pegawai::all();
        return view('Admin.data-pegawai',compact('pegawai'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $data = array(
            'username'=>($request->username),
            'password'=>($request->password),
            'nama'=>$request->nama,
            'email'=>$request->email,
            'no_hp'=>$request->no_hp,
            'jobdesk'=>$request->jobdesk,
            'alamat'=>$request->alamat,
            'jk'=>$request->jk
        );
        Pegawai::create($data);
        return redirect('admin\pegawai')->with('success','Data Pegawai berhasil ditambah');
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
            if($request->has('id_jk'))
            {
                $data = array(
                    'id_jk'=>$request->id_jk,
                );
            Pegawai::whereid_pegawai($id)->update($data);
            }
            $data = array(
                'username'=>($request->username),
                'password'=>($request->password),
                'nama'=>$request->nama,
                'email'=>$request->email,
                'no_hp'=>$request->no_hp,
                'jobdesk'=>$request->jobdesk,
                'alamat'=>$request->alamat,
                'jk'=>$request->jk
            );
        Pegawai::whereid_pegawai($id)->update($data);
        return redirect('admin\pegawai');

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
            $datas = Pegawai::findOrfail($id);
            $datas->delete();
            return redirect('admin\pegawai')->with('success','pegawai Berhasil Dihapus');
        }catch(\Throwable $th){
            return redirect('admin\pegawai')->withErrors('Data gagal dihapus. Harap hapus data yang terkait');
        }
    }
}

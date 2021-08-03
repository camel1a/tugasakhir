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
        
        $foto = $request->file('foto');
        $new_name = rand().'.'.$foto->getClientOriginalExtension();
        $foto->move(public_path('foto'), $new_name);
        $data = array(
            'username'=>($request->username),
            'password'=>($request->password),
            'nama'=>$request->nama,
            'email'=>$request->email,
            'no_hp'=>$request->no_hp,
            'jobdesk'=>$request->jobdesk,
            'kontrak'=>$request->kontrak,
            'alamat'=>$request->alamat,
            'jk'=>$request->jk,
            'foto'=>$new_name
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

        $foto = $request->file('foto');
        if($request->hasFile('foto'))
        {
            $new_name = rand().'.'.$foto->getClientOriginalExtension();
            $foto->move(public_path('foto'), $new_name);
            $data = array(            
                'foto'=>$new_name
            );
        Pegawai::whereid_pegawai($id)->update($data);
            if($request->has('jk'))
            {
                $data = array(
                    'jk'=>$request->jk,
                );
            Pegawai::whereid_pegawai($id)->update($data);
            }
            if($request->has('kontrak'))
            {
                $data = array(
                    'kontrak'=>$request->kontrak,
                );
            Pegawai::whereid_pegawai($id)->update($data);
            }
            
            Pegawai::whereid_pegawai($id)->update($data);
            }
            $data = array(
                'username'=>($request->username),
                'password'=>($request->password),
                'nama'=>$request->nama,
                'email'=>$request->email,
                'no_hp'=>$request->no_hp,
                'jobdesk'=>$request->jobdesk,
                'alamat'=>$request->alamat
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

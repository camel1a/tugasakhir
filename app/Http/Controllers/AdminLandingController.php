<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Landing;

class AdminLandingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $landing = Landing::all();
        return view('Admin.data-landing',compact('landing'))->with('i');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->bagian=="Dokumentasi"){
            $foto = $request->file('foto');
            $new_name = rand().'.'.$foto->getClientOriginalExtension();
            $foto->move(public_path('foto'), $new_name);
        $data = array(
            'bagian'=>$request->bagian,
            'foto'=>$new_name,
            'judul'=>$request->judul
        );
        Landing::create($data);
        return redirect('admin\landing')->with('success','Data Pesanan berhasil ditambah');
    }
    if($request->bagian=="Services"){
        
    $data = array(
        'bagian'=>$request->bagian,
        'judul'=>$request->judul,
        'deskripsi'=>$request->deskripsi,
    );
    Landing::create($data);
    return redirect('admin\landing')->with('success','Data Pesanan berhasil ditambah');
    }

    if($request->bagian=="QnA"){
        
    $data = array(
        'bagian'=>$request->bagian,
        'pertanyaan'=>$request->pertanyaan,
        'jawaban'=>$request->jawaban,
    );
    Landing::create($data);
    return redirect('admin\landing')->with('success','Data Pesanan berhasil ditambah');
    }
    return redirect('admin\landing')->with('success','Data Pesanan berhasil ditambah');

    }

    



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        Landing::whereid_landing($id)->update($data);
        }
        if($request->has('bagian'))
            {
                $data = array(
                    'bagian'=>$request->bagian,
                );
           Landing::whereid_landing($id)->update($data);
            }

            if($request->has('judul'))
            {
                $data = array(
                    'judul'=>$request->judul,
                );
           Landing::whereid_landing($id)->update($data);
            }

            if($request->has('deskripsi'))
            {
                $data = array(
                    'deskripsi'=>$request->deskripsi,
                );
           Landing::whereid_landing($id)->update($data);
            }

            if($request->has('alamat'))
            {
                $data = array(
                    'alamat'=>$request->alamat,
                );
           Landing::whereid_landing($id)->update($data);
            }
            if($request->has('email'))
            {
                $data = array(
                    'email'=>$request->email,
                );
           Landing::whereid_landing($id)->update($data);
            }
            if($request->has('no_hp'))
            {
                $data = array(
                    'no_hp'=>$request->no_hp,
                );
           Landing::whereid_landing($id)->update($data);
            }
            if($request->has('pertanyaan'))
            {
                $data = array(
                    'pertanyaan'=>$request->pertanyaan,
                );
           Landing::whereid_landing($id)->update($data);
            }
            if($request->has('jawaban'))
            {
                $data = array(
                    'jawaban'=>$request->jawaban,
                );
           Landing::whereid_landing($id)->update($data);
            }
        return redirect('admin\landing');

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
            $datas = Landing::findOrfail($id);
            $datas->delete();
            return redirect('admin\landing')->with('success','landing Berhasil Dihapus');
        }catch(\Throwable $th){
            return redirect('admin\landing')->withErrors('Data gagal dihapus. Harap hapus data yang terkait');
        }
    }
}

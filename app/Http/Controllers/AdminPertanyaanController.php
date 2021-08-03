<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pertanyaan;

class AdminPertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pertanyaan = Pertanyaan::all();
        return view('Admin.data-pertanyaan',compact('pertanyaan'))->with('i');
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = array(
            'nama'=>$request->nama,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'mesagge'=>$request->mesagge
            
        );
        Pertanyaan::create($data);
        return redirect('/')->with('success','paket berhasil ditambah');
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
        
        if($request->has('nama'))
            {
                $data = array(
                    'nama'=>$request->nama,
                );
           Pertanyaan::whereid_pertanyaan($id)->update($data);
            }

            if($request->has('email'))
            {
                $data = array(
                    'email'=>$request->email,
                );
           Pertanyaan::whereid_pertanyaan($id)->update($data);
            }

            if($request->has('subject'))
            {
                $data = array(
                    'subject'=>$request->subject,
                );
           Pertanyaan::whereid_pertanyaan($id)->update($data);
            }

            if($request->has('mesagge'))
            {
                $data = array(
                    'mesagge'=>$request->mesagge,
                );
           Pertanyaan::whereid_pertanyaan($id)->update($data);
            }
            
        return redirect('admin\pertanyaan');
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
            $datas = Pertanyaan::findOrfail($id);
            $datas->delete();
            return redirect('admin\pertanyaan')->with('success','pertanyaan Berhasil Dihapus');
        }catch(\Throwable $th){
            return redirect('admin\pertanyaan')->withErrors('Data gagal dihapus. Harap hapus data yang terkait');
        }
    }
}

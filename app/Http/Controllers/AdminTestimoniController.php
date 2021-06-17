<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimoni;

class AdminTestimoniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimoni = Testimoni::all();
        return view('Admin.data-testimoni',compact('testimoni'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
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
        return redirect('admin\testimoni');

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
            $datas = Testimoni::findOrfail($id);
            $datas->delete();
            return redirect('admin\testimoni')->with('success','testimoni Berhasil Dihapus');
        }catch(\Throwable $th){
            return redirect('admin\testimoni')->withErrors('Data gagal dihapus. Harap hapus data yang terkait');
        }
    }
}

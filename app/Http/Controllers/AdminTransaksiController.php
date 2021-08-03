<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Transaksi;
use App\Models\Pesanan;
use App\Models\Konsumen;
use PDF;


class AdminTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::all();
        $pesanan = Pesanan::all();
        return view('Admin.data-pesanan',compact('transaksi','pesanan'))->with('i');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $foto = $request->file('foto');
        $new_name = rand().'.'.$foto->getClientOriginalExtension();
        $foto->move(public_path('foto'), $new_name);
        $data = array(
            'id_pesanan'=>$request->id_pesanan,
            'metode'=>'Cash',
            'nominal'=>$request->nominal,
            'status'=>$request->status,
            'pembayaran'=>$request->pembayaran,
            'tgl'=>$request->tgl,
            'foto'=>$new_name
        );
        Transaksi::create($data);
        return redirect('admin\pesanan')->with('success','Data Transaksi berhasil ditambah');
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
        Transaksi::whereid_transaksi($id)->update($data);
        }

            if($request->has('id_pesanan'))
            {
                $data = array(
                    'id_pesanan'=>$request->id_pesanan,
                );
            Transaksi::whereid_transaksi($id)->update($data);
            }

            if($request->has('metode'))
            {
                $data = array(
                    'metode'=>$request->metode,
                );
            Transaksi::whereid_transaksi($id)->update($data);
            }

            if($request->has('nominal'))
            {
                $data = array(
                    'nominal'=>$request->nominal,
                );
            Transaksi::whereid_transaksi($id)->update($data);
            }

            if($request->has('status'))
            {
                $data = array(
                    'status'=>$request->status,
                );
             Transaksi::whereid_transaksi($id)->update($data);
            }

            if($request->has('pembayaran'))
            {
                $data = array(
                    'pembayaran'=>$request->pembayaran,
                );
             Transaksi::whereid_transaksi($id)->update($data);
            }

            if($request->has('tgl'))
            {
                $data = array(
                    'tgl'=>$request->tgl,
                );
            Transaksi::whereid_transaksi($id)->update($data);
            }
        return redirect('admin\pesanan');
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
            $datas = Transaksi::findOrfail($id);
            $datas->delete();
            return redirect('admin\pesanan')->with('success','pesanan Berhasil Dihapus');
        }catch(\Throwable $th){
            return redirect('admin\pesanan')->withErrors('Data gagal dihapus. Harap hapus data yang terkait');
        }
    }

    public function cetak($id)
    {
        $transaksi = Transaksi::whereid_transaksi($id)->first();
        $pesanan = Pesanan::all();
        $konsumen = Konsumen::all();


        $customPaper = array(0,0,390.00,293.80);
        $pdf=PDF::loadview('admin.data-cetak',compact('transaksi', 'pesanan', 'konsumen'))->setPaper($customPaper);
        return $pdf->download('bukti-pembayaran.pdf');
    }
}

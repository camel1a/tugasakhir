<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table='pesanans';
    protected $primaryKey = 'id_pesanan';
    protected $fillable = ['id_pesanan','id_konsumen','id_paket','id_pegawai','id_transportasi','tgl','alamat']; //field tabel
    public $timestamps = false;

    public function paket()
    {
	return $this->belongsTo('App\Models\Paket','id_paket');
    }

    public function konsumen()
    {
	return $this->belongsTo('App\Models\Konsumen','id_konsumen');
    }

    public function pegawai()
    {
	return $this->belongsTo('App\Models\Pegawai','id_pegawai');
    }

    public function transportasi()
    {
	return $this->belongsTo('App\Models\Transportasi','id_transportasi');
    }
}

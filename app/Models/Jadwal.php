<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table='jadwals';
    protected $primaryKey = 'id_jadwal';
    protected $fillable = ['id_jadwal','id_konsumen','id_pegawai','email','tgl','kepentingan','status']; //field tabel
    public $timestamps = false;

    public function konsumen()
    {
	return $this->belongsTo('App\Models\Konsumen','id_konsumen');
    }

    public function pegawai()
    {
	return $this->belongsTo('App\Models\Pegawai','id_pegawai');
    }
}

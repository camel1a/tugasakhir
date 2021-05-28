<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table='pesanans';
    protected $primaryKey = 'id_pesanan';
    protected $fillable = ['id_pesanan','id_konsumen','id_paket','email','tgl']; //field tabel
    public $timestamps = false;

    public function paket()
    {
	return $this->belongsTo('App\Models\Paket','id_paket');
    }

    public function konsumen()
    {
	return $this->belongsTo('App\Models\Konsumen','id_konsumen');
    }
}
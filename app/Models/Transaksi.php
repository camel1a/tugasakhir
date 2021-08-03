<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table='transaksis';
    protected $primaryKey = 'id_transaksi';
    protected $fillable = ['id_transaksi','id_pesanan','metode','nominal','status','pembayaran','tgl','foto']; //field tabel
    public $timestamps = false;

    public function pesanan()
    {
	return $this->belongsTo('App\Models\pesanan','id_pesanan');
    }
}

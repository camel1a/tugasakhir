<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    protected $table='pengeluarans';
    protected $primaryKey = 'id_pengeluaran';
    protected $fillable = ['id_pengeluaran','jenis','nominal','tgl']; //field tabel
    public $timestamps = false;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    protected $table='pemasukans';
    protected $primaryKey = 'id_pemasukan';
    protected $fillable = ['id_pemasukan','jenis','nominal','tgl']; //field tabel
    public $timestamps = false;

}

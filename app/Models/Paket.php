<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $table='pakets';
    protected $primaryKey = 'id_paket';
    protected $fillable = ['id_paket','harga','jenis','deskripsi','foto']; //field tabel
    public $timestamps = false;
}

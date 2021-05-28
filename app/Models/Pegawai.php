<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table='pegawais';
    protected $primaryKey = 'id_pegawai';
    protected $fillable = ['id_pegawai','username','nama','password','email','no_hp', 'jk', 'jobdesk', 'alamat']; //field tabel
    public $timestamps = false;
}

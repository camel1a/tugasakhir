<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Landing extends Model
{
    protected $table='landings';
    protected $primaryKey = 'id_landing';
    protected $fillable = ['id_landing','bagian','foto','judul','deskripsi','alamat','email','no_hp','pertanyaan','jawaban']; //field tabel
    public $timestamps = false;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsumen extends Model
{
    protected $table='konsumens';
    protected $primaryKey = 'id_konsumen';
    protected $fillable = ['id_konsumen','email','nama','password','no_hp', 'alamat']; //field tabel
    public $timestamps = false;
}

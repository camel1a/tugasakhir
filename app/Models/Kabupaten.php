<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    protected $table='kabupatens';
    protected $primaryKey = 'id_kabupaten';
    protected $fillable = ['id_kabupaten','nama']; //field tabel
    public $timestamps = false;
}

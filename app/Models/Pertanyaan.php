<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    protected $table='pertanyaans';
    protected $primaryKey = 'id_pertanyaan';
    protected $fillable = ['id_pertanyaan','nama','email','subject','mesagge']; //field tabel
    public $timestamps = false;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    protected $table='testimonis';
    protected $primaryKey = 'id_testimoni';
    protected $fillable = ['id_testimoni','id_konsumen','caption','foto']; //field tabel
    public $timestamps = false;

    public function konsumen()
    {
	return $this->belongsTo('App\Models\Konsumen','id_konsumen');
    }
}

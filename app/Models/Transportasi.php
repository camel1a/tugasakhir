<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transportasi extends Model
{
    protected $table='transportasis';
    protected $primaryKey = 'id_transportasi';
    protected $fillable = ['id_transportasi','id_kabupaten','nama_kec','harga']; //field tabel
    public $timestamps = false;

    public function kabupaten()
    {
	return $this->belongsTo('App\Models\Kabupaten','id_kabupaten');
    }
}

<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class login_konsumen extends Authenticatable
{
    protected $table='konsumens';
    protected $primaryKey = 'id_konsumen';
    protected $fillable = ['id_konsumen','email','nama','password','no_hp', 'alamat']; //field tabel
    public $timestamps = false;
}

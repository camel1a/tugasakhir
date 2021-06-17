<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class login_pegawai extends Authenticatable
{
    protected $table='pegawais';
    protected $primaryKey = 'id_pegawai';
    protected $fillable = ['id_pegawai','username','nama','password','email','no_hp', 'jk', 'jobdesk', 'alamat']; //field tabel
    public $timestamps = false;
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table='admins';
    protected $primaryKey = 'username';
    protected $fillable = ['username','password']; //field tabel
    public $timestamps = false;
}

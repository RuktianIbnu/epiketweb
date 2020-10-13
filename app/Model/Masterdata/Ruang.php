<?php

namespace App\Model\Masterdata;

use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    protected $table = "ruang";
    
    protected $fillable = ['nama_ruang', 'deskripsi'];
}

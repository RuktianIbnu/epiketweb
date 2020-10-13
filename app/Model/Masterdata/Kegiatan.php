<?php

namespace App\model\masterdata;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $table = "kegiatan";
    
    protected $fillable = ['kode_jenis', 'jenis_kegiatan'];
}

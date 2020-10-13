<?php

namespace App\model\masterdata;

use Illuminate\Database\Eloquent\Model;

class Subdirektorat extends Model
{
    protected $table = "subdit";
    
    protected $fillable = ['kode_subdirektorat', 'nama_subdirektorat'];
}

<?php

namespace App\model\masterdata;

use Illuminate\Database\Eloquent\Model;

class Seksi extends Model
{
    protected $table = "seksi";
    
    protected $fillable = ['kode_seksi', 'nama_seksi'];
}

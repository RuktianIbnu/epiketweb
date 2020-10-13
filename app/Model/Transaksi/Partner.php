<?php

namespace App\Model\Transaksi;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $table = "partner";
    
    protected $fillable = ['nip_petugas_2'];
}
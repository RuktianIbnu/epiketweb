<?php

namespace App\Model\Transaksi;

use Illuminate\Database\Eloquent\Model;

class PendataanDrc extends Model
{
    protected $table = "pendataan_drc";
    
    protected $fillable = ['tanggal', 'waktu', 'petugas_1','petugas_2','suhu_ruangan','ac_backup_1','ac_backup_2','ups_redudancy','ups_load','ups_runtime','ups_temp',
    'ac_1','ac_2','ac_3','keterangan'];
}

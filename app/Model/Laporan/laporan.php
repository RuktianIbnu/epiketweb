<?php

namespace App\model\Laporan;

use Illuminate\Database\Eloquent\Model;

class laporan extends Model
{
    protected $table = "pendataan_tamu";
    
    protected $fillable = ['nama', 'departement', 'jumlah','lokasi','tanggal_mulai','tanggal_selesai','start_time','end_time','kategori','lain_lain','deskripsi',
    'efek','resiko','id_petugas','photo_pemberitahuan','type_pemberitahuan','photo_perintah','type_perintah','photo_kegiatan'];
}

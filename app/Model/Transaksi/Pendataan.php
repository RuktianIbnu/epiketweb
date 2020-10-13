<?php

namespace App\Model\Transaksi;

use Illuminate\Database\Eloquent\Model;

class Pendataan extends Model
{
    protected $table = "pendataan_tamu";
    
    protected $fillable = ['nama', 'departement', 'jumlah','lokasi','detail_lokasi','tanggal_mulai','tanggal_selesai','start_time','end_time','kategori','lain_lain','deskripsi',
    'efek','resiko','id_petugas','photo_pemberitahuan','type_pemberitahuan','photo_perintah','type_perintah','photo_kegiatan','status','nip_petugas2','nama_petugas2'];
}

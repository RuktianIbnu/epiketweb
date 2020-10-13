<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Laporan Kunjungan Pusdakim</title>
    </head>

    <body>
        <h1 align="center">Laporan Kunjungan Pusdakim</h1>
        <?php $tgl_mulai = $rs->tanggal_mulai;?>
        <?php $tgl_selesai = $rs->tanggal_selesai;?>
         
        <?php $tanggal_mulai = date('d-m-yy', strtotime($tgl_mulai));?>
        <?php $tanggal_selesai = date('d-m-yy', strtotime($tgl_selesai));?>
        
        <h5 align="center">Masuk : {{$tanggal_mulai}} {{$rs->start_time}} <br/> Keluar : {{$tanggal_selesai}} {{$rs->end_time}}</h5>
            <table style="table-layout: fixed; width: 100%" border="0">
                <thead>
                </thead>
                    <tbody>
                        <tr>
                            <td align="left" style="width:30%"><strong>Nama Lengkap</strong></td>
                            <td align="center" style="width:5%">:</td>
                            <td align="left" style="width:65%">{{$rs->nama}}</td>
                        </tr>
                        <tr>
                            <td align="left"><strong>Perusahaan</strong></td>
                            <td align="center">:</td>
                            <td align="left">{{$rs->departement}}</td>
                        </tr>
                        <tr>
                            <td align="left"><strong>Jumlah Pengunjung</strong></td>
                            <td align="center">:</td>
                            <td align="left">{{$rs->jumlah}}</td>
                        </tr>
                        <tr>
                            <td align="left"><strong>Lokasi</strong></td>
                            <td align="center">:</td>
                            <td align="left">{{$rs->lokasi}}</td>
                        </tr>
                        <tr>
                            <td align="left"><strong>Detail Lokasi</strong></td>
                            <td align="center">:</td>
                            <td align="left">Ruang {{$rs->nama_ruang}}</td>
                        </tr>
                        <tr>
                            <td align="left"><strong>Kegiatan</strong></td>
                            <td align="center">:</td>
                            <td align="left">{{$rs->kode_jenis}}</td>
                        </tr>

                        <tr></tr>
                        <br/>
                        <tr>
                            <td align="left"><strong>Deskripsi Kegiatan</strong></td>
                        </tr>
                        <tr>    
                            <td colspan="3" align="left" style="word-wrap: break-word" >{{$rs->deskripsi}}</td>
                        </tr>

                        <tr></tr>
                        <br/>
                        <br/>
                        <tr>
                            <td align="left"><strong>Efek Setelah Kegiatan</strong></td>
                        </tr>
                        <tr>
                            <td colspan="3" align="left" style="word-wrap: break-word">{{$rs->efek}}</td>
                        </tr>

                        <tr></tr>
                        <br/>
                        <br/>
                        <tr>
                            <td align="left"><strong>Resiko dan Solusi</strong></td>
                        </tr>
                        <tr>
                            <td colspan="3" align="left" style="word-wrap: break-word">{{$rs->resiko}}</td>
                        </tr>
                        
                    </tbody>
                <tfoot cellpadding="5">
                    <tr><td><br/></td></tr>
                    <tr><td><br/></td></tr>
                    <tr><td><br/></td></tr>
                    <tr>
                        <td align="left"></td>
                        <td align="right"></td>
                        <td align="right">Jakarta, {{$tanggal}}</td>
                    </tr>
                    <tr>
                    @if ($rs->id_petugas == $rs->nip_petugas2)
                        <td align="left"></td>
                        <td align="right"></td>
                        <td align="right">Petugas</td>
                    @elseif ($rs->id_petugas != $rs->nip_petugas2)    
                        <td align="right" colspan="2">Petugas CheckIn</td>
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        <td align="right">Petugas CheckOut</td>
                    @endif
                    </tr>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <tr>
                    @if ($rs->id_petugas == $rs->nip_petugas2)
                        <td align="left"></td>
                        <td align="center"></td>
                        <td align="right">{{$rs->nama_petugas}}</td>
                    @elseif ($rs->id_petugas != $rs->nip_petugas2)
                        <td align="right" colspan="2">{{$rs->nama_petugas}}</td>
                        <td align="right">{{$petugas2->nama_petugas}}</td>    
                    @endif
                    </tr>
                </tfoot>
            </table>
    </body>
</html>
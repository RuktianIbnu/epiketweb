<!DOCTYPE html>
<html lang="en">
	<style>
		table{
			table-layout: fixed; width: 100%;
            border-collapse: collapse;
            margin:1 auto;
        }
        th{
        	background-color: #f0f0f0;
        }
	</style>
    <head charset="utf-8">
        <title>Laporan Kunjungan Pusdakim</title>
    </head>
    <body>
    	<h1 align="center">Laporan Kunjungan Pusdakim</h1>
    	<table style="table-layout: fixed; width: 100%; border-collapse: collapse;" border="1">
    		<thead>
    	        <tr>	
                    <th style="word-wrap: break-word; text-align: center; font-weight: bold; vertical-align: middle">No</th>
                    <th style="word-wrap: break-word; text-align: center; font-weight: bold; vertical-align: middle">Tanggal Checkin <br/>-<br/> Checkout</th>
                    <th style="word-wrap: break-word; text-align: center;">Nama Tamu</th>
                    <th style="word-wrap: break-word; text-align: center; font-weight: bold; vertical-align: middle">Departement / Perusahaan</th>
                    <th style="word-wrap: break-word; text-align: center; font-weight: bold; vertical-align: middle">Lokasi</th>
                    <th style="word-wrap: break-word; text-align: center; font-weight: bold; vertical-align: middle">Kegiatan</th>
                    <th style="word-wrap: break-word; text-align: center; font-weight: bold; vertical-align: middle">Deskripsi</th>
                    <th style="word-wrap: break-word; text-align: center; font-weight: bold; vertical-align: middle">Efek Kegiatan</th>
                    <th style="word-wrap: break-word; text-align: center; font-weight: bold; vertical-align: middle">Resiko Dan Solusi</th>
                    <th style="word-wrap: break-word; text-align: center; font-weight: bold; vertical-align: middle">Nama Petugas Checkin <br/>-<br/> Checkout</th>
    	        </tr>
    	    </thead>
    	    <tbody>
                @if(count($rs) == 0)
    	            <tr>
    	                <td colspan='4' style="text-align: center;">
    	                    <center>Data tidak tersedia</center>
    	                </td>
    	            </tr>
                @else
                    @php $i=1 @endphp
                    @foreach($rs as $result)
                        <tr>
                            <td style="text-align: left;">{{ $i++ }}</td>
                            <td style="text-align: left;">{{$result->tanggal_mulai}} <br/>-<br/> {{$result->tanggal_selesai}}</td>
                            <td style="text-align: left;">{{$result->nama}}</td>
                            <td style="text-align: left;">{{$result->departement}}</td>
                            <td style="text-align: left;">{{$result->lokasi}} <br/>-<br/> Ruang {{$result->nama_ruang}}</td>
                            <td style="text-align: left;">{{$result->tanggal_mulai}} <br/>-<br/> {{$result->tanggal_selesai}}</td>
                            <td style="text-align: left;">{{$result->deskripsi}}</td>
                            <td style="text-align: left;">{{$result->efek}}</td>
                            <td style="text-align: left;">{{$result->resiko}}</td>
                            @if ($result->nama_petugas != $result->nama_petugas2)
                                <td style="text-align: left;">{{$result->nama_petugas}} <br/>-<br/> {{$result->nama_petugas2}}</td>
                            @elseif ($result->nama_petugas == $result->nama_petugas2)
                                <td style="text-align: left;">{{$result->nama_petugas}}</td>
                            @endif
                        </tr>
                    @endforeach
                @endif
            </tbody>
            <tfoot>
            </tfoot>
    	</table>
	</body>    
</html>
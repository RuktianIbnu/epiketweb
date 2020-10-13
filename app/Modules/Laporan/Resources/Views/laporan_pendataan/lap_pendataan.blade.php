<!DOCTYPE html>
<html>

<head>
    <title>Laporan Pendataan Tamu / Vendor</title>
</head>

<body>

	<table class='table table-bordered'>

		<thead>
	        <tr>	
                <th style="word-wrap: break-word; text-align: center; font-weight: bold; vertical-align: middle">No</th>
                <th style="word-wrap: break-word; text-align: center; font-weight: bold; vertical-align: middle">Nama Tamu / Vendor</th>
                <th style="word-wrap: break-word; text-align: center; font-weight: bold; vertical-align: middle">Departement / Vendor</th>
                <th style="word-wrap: break-word; text-align: center; font-weight: bold; vertical-align: middle">Lokasi</th>
                <th style="word-wrap: break-word; text-align: center; font-weight: bold; vertical-align: middle">Kategori Kegiatan</th>
                <th style="word-wrap: break-word; text-align: center; font-weight: bold; vertical-align: middle">Tanggal</th>
                <th style="word-wrap: break-word; text-align: center; font-weight: bold; vertical-align: middle">Waktu</th>
                <th style="word-wrap: break-word; text-align: center; font-weight: bold; vertical-align: middle">Deskripsi</th>
                <th style="word-wrap: break-word; text-align: center; font-weight: bold; vertical-align: middle">Efek Kegiatan</th>
                <th style="word-wrap: break-word; text-align: center; font-weight: bold; vertical-align: middle">Resiko Dan Solusi</th>
                <th style="word-wrap: break-word; text-align: center; font-weight: bold; vertical-align: middle">Nama Petugas</th>
	        </tr>
	    </thead>
	    <tbody>
            @if(count($data) == 0)
	            <tr>
	                <td colspan='4' style="text-align: center;">
	                    <center>Data tidak tersedia</center>
	                </td>
	            </tr>
            @else
                @php $i=1 @endphp
                @foreach($data as $key)
                    <tr>
                        <td style="text-align: left; vertical-align: middle">{{ $i++ }}</td>
                        <td style="text-align: left; vertical-align: middle">&nbsp;&nbsp;&nbsp;{{$key->nama_tamu}}</td>
                        <td style="text-align: left; vertical-align: middle">{{$key->departement}}</td>
                        <td style="text-align: left; vertical-align: middle">{{$key->lokasi}}</td>
                        @if($key->lain_lain != null)
                            <td style="text-align: left; vertical-align: middle">{{$key->kategori}} - {{$key->lain_lain}}</td>
                        @else
                            <td style="text-align: left; vertical-align: middle">{{$key->kategori}}</td>
                        @endif
                        <td style="text-align: left; vertical-align: middle">{{$key->tanggal_mulai}} - {{$key->tanggal_selesai}}</td>
                        <td style="text-align: left; vertical-align: middle">{{$key->start_time}} - {{$key->end_time}}</td>
                        <td style="text-align: left; vertical-align: middle">{{$key->deskripsi}}</td>
                        <td style="text-align: left; vertical-align: middle">{{$key->efek}}</td>
                        <td style="text-align: left; vertical-align: middle">{{$key->resiko}}</td>
                        <td style="text-align: left; vertical-align: middle">{{$key->nama_petugas}}</td>
                        <td style="text-align: left; vertical-align: middle"></td>
                    </tr>
                @endforeach
            @endif
        </tbody>
        <tfoot>

        </tfoot>
		
	</table>
	
</body>

</html>
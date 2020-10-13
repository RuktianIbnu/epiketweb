@extends('layouts.layout')
@section('content')
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<ol class="breadcrumb breadcrumb-bg-teal">
            <li><a href="{{url('/home')}}"><i class="material-icons">home</i> Home</a></li>
            <li class="active"><i class="material-icons">widgets</i> Laporan Pendataan Tamu / Vendor</li>
        </ol>
		<div class="card">
		
			<div class="body">
				<form id="form_pengguna">
					<div class="panel panel-success">
						<div class="panel-heading bg-light-green">
							Daftar Kegiatan Pusdakim
						</div>
						<div class="panel-body table-responsive">
							<div class="row clearfix">
								<div class="col-md-2">
									<label class="form-label">lokasi</label>
									<select class="form-control show-tick" style="font-size: 14px;" id="cari_lokasi" name="cari_lokasi" data-live-search="true">
										<option value="" selected>-- Pilih Lokasi --</option>
				                            <option value="Pusdakim 1 lantai 2" <?php if($lokasi=="Pusdakim 1 lantai 2") echo 'selected="selected"'; ?> >Pusdakim 1 (Lantai 2)</option>
				                            <option value="Pusdakim 1 lantai 9" <?php if($lokasi=="Pusdakim 1 lantai 9") echo 'selected="selected"'; ?> >Pusdakim 1 (Lantai 9)</option>
				                            <option value="Pusdakim 2" <?php if($lokasi=="Pusdakim 2") echo 'selected="selected"'; ?> >Pusdakim 2</option>
									</select>
								</div>
								<div class="col-md-2">
									<label class="form-label">Departement</label>
									<input type="text" class="form-control" id="cari_departement" name="cari_departement" value="{{$departement}}">
								</div>
								<div class="col-md-2">
									<label class="form-label">Kegiatan</label>
										<select class="form-control show-tick" style="font-size: 14px;" id="cari_kegiatan" name="cari_kegiatan" data-live-search="true">
											<option value="pilih" selected>-- Pilih Kegiatan --</option>
					                        @foreach($rskegiatan as $result)
					                            <option value="{{$result->id}}" @if($result->id == $kategori)selected @endif>{{$result->kode_jenis}}</option>
					                        @endforeach 
										</select>
								</div>
								<div class="col-md-2">
									<label class="form-label">nama Petugas</label>
									<input type="text" class="form-control" id="cari_nama_petugas" name="cari_nama_petugas" value="{{$nama_petugas}}">
								</div>
								<div class="col-md-2">
									<label class="form-label">Dari Tanggal</label>
									<input type="date" class="form-control" id="cari_tanggal_mulai" name="cari_tanggal_mulai" value="{{$tanggal_mulai}}">
								</div>
								<div class="col-md-2">
									<label class="form-label">Sampai Tanggal</label>
									<input type="date" class="form-control" id="cari_tanggal_selesai" name="cari_tanggal_selesai" value="{{$tanggal_mulai}}">
								</div>
							</div>

							<div class="pull-right">
								<button type="button" id="btn_cari" name="btn_cari" class="btn bg-indigo waves-effect glyphicon glyphicon-search">&nbsp;Cari</button>
							</div>
							<div class="right col-md-2">
								<!-- <a href="{{url('/laporan/laporan/pdf')}}">
									<i class="btn btn-xs waves-effect material-icons" id="btn_printpdf" name="btn_printpdf[]" value="{{$rs}}" title="PRINT">print</i>
								</a> -->
								<button type="button" id="btn_printpdf" name="btn_printpdf" class="btn bg-orange waves-effect glyphicon glyphicon-download">&nbsp;Download PDF</button>
							</div>
							<!-- <div class="right col-md-2">
								<button type="button" id="btn_printexcel" name="btn_printexcel" class="btn bg-green waves-effect glyphicon glyphicon-download">&nbsp;Download Excel</button>
							</div> -->
							
							<br/>
							<br/>
							<br/>

							<table id="tb_user" width="100%" role="grid" class="table table-striped table-bordered table-hover table-responsive">
								<thead class="bg-teal">
									<tr>
										<th style="text-align: center;" class="th_table">No</th>
										<th style="text-align: center;" class="th_table">Nama</th>
										<th style="text-align: center;" class="th_table">Departement / Vendor</th>									
										<th style="text-align: center;" class="th_table">Lokasi</th>									
										<th style="text-align: center;" class="th_table">Kegiatan</th>
										<th style="text-align: center;" class="th_table">Tanggal</th>
										<th style="text-align: center;" class="th_table">Petugas Checkin - Checout</th>
										<th style="text-align: center;" class="th_table">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 0;?>
									@foreach($rs as $result)
									<?php $no++ ;?>
										<tr id="{{$result->id}}">
											<td>{{$no}}</td>
											<td>{{$result->nama_tamu}}</td>
											<td>{{$result->departement}}</td>
											<td>{{$result->lokasi}} - Ruang {{$result->nama_ruang}}</td>
											<td>{{$result->kode_jenis}}</td>
											<td>{{$result->tanggal_selesai}}</td>
											@if ($result->nama_petugas != $result->nama_petugas2)
												<td>{{$result->nama_petugas}} - {{$result->nama_petugas2}}</td>
											@elseif ($result->nama_petugas == $result->nama_petugas2)
												<td>{{$result->nama_petugas}}</td>
											@endif
											<td>
												<a href="{{url('/transaksi/pendataan/show/'.$result->id)}}" title="EDIT PENGGUNA">
													<i class="btn btn-xs waves-effect material-icons" id="btn_edit">edit</i>
												</a>
												<a href="{{url('/transaksi/pendataan/cetak_pdf/'.$result->id)}}">
													<i class="btn btn-xs waves-effect material-icons" id="btn_print" title="PRINT" data-penggunanip="{{$result->id}}">print</i>
												</a>
											</td>
										</tr>
									@endforeach
								</tbody>							
							</table>
							<div class="body pull-right">
								     Menampilkan <div class="badge bg-teal badge-pill">{{ $rs->count() }}</div> dari <div class="badge bg-pink badge-pill">{{ $rs->total() }}</div> data
							</div>
	                		<div class="body">
	                            <nav>
	                                <ul class="pager">
	                                    <li>{{ $rs->links() }}</li>
	                                </ul>
	                            </nav>
	                        </div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@push('script-footer')

<script type="text/javascript">
	function isEmpty(str) {
      return (!str || 0 === str.length);
    }

  //   $('#btn_printexcel').click(function(){
  //   	var lokasi 			= $("#cari_lokasi").val();
		// var departement 	= $("#cari_departement").val();
	 //    var kategori 		= $("#cari_kegiatan").val();
	 //    var nama_petugas 	= $("#cari_nama_petugas").val();
	 //    var tanggal_mulai 	= $("#cari_tanggal_mulai").val();
	 //    var tanggal_selesai = $("#cari_tanggal_selesai").val();

	 //    if (kategori == "pilih") {
	 //    	kategori = "";
	 //    }

	 //    if (isEmpty(lokasi) && isEmpty(departement) && isEmpty(kategori) && isEmpty(nama_petugas) && isEmpty(tanggal_mulai) && isEmpty(tanggal_selesai)) {
			
		// 	window.location.href = '{{url("laporan/laporan/export_excel")}}';

	 //    } else if (!isEmpty(lokasi) || !isEmpty(departement) || !isEmpty(kategori) || !isEmpty(nama_petugas) || !isEmpty(tanggal_mulai) || !isEmpty(tanggal_selesai)) {
		// 	//window.location.href = "{{url('laporan/laporan/pdf')}}"+'?cari_lokasi='+lokasi+'&cari_departement='+departement+'&cari_kegiatan='+kategori;
		// 	window.location.href = "{{url('laporan/laporan_pendataan/export_excel')}}"+'?cari_lokasi='+lokasi+'&cari_departement='+departement+'&cari_kegiatan='+kategori+'&cari_nama_petugas='+nama_petugas+'&cari_tanggal_mulai='+tanggal_mulai+'&cari_tanggal_selesai='+tanggal_selesai;
	 //    }
  //   });
    
    $('#btn_printpdf').click(function(){
    	var lokasi 			= $("#cari_lokasi").val();
		var departement 	= $("#cari_departement").val();
	    var kategori 		= $("#cari_kegiatan").val();
	    var nama_petugas 	= $("#cari_nama_petugas").val();
	    var tanggal_mulai 	= $("#cari_tanggal_mulai").val();
	    var tanggal_selesai = $("#cari_tanggal_selesai").val();

	    if (isEmpty(lokasi) && isEmpty(departement) && isEmpty(kategori) && isEmpty(nama_petugas) && isEmpty(tanggal_mulai) && isEmpty(tanggal_selesai)) {
			
			window.open('/laporan/laporan/pdf/');

	    } else if (!isEmpty(lokasi) || !isEmpty(departement) || !isEmpty(kategori) || !isEmpty(nama_petugas) || !isEmpty(tanggal_mulai) || !isEmpty(tanggal_selesai)) {
			//window.location.href = "{{url('laporan/laporan/pdf')}}"+'?cari_lokasi='+lokasi+'&cari_departement='+departement+'&cari_kegiatan='+kategori;
			window.open('/laporan/laporan/pdf'+'?cari_lokasi='+lokasi+'&cari_departement='+departement+'&cari_kegiatan='+kategori+'&cari_nama_petugas='+nama_petugas+'&cari_tanggal_mulai='+tanggal_mulai+'&cari_tanggal_selesai='+tanggal_selesai);
	    }
    });

	$('#btn_cari').click(function() {
	    var lokasi 			= $("#cari_lokasi").val();
		var departement 	= $("#cari_departement").val();
	    var kategori 		= $("#cari_kegiatan").val();
	    var nama_petugas 	= $("#cari_nama_petugas").val();
	    var tanggal_mulai 	= $("#cari_tanggal_mulai").val();
	    var tanggal_selesai = $("#cari_tanggal_selesai").val();

	    if (kategori == "pilih") {
	    	kategori = "";
	    }

	    if (isEmpty(lokasi) && isEmpty(departement) && isEmpty(kategori) && isEmpty(nama_petugas) && isEmpty(tanggal_mulai) && isEmpty(tanggal_selesai)) {

			window.location.href = '{{url("laporan/laporan/search")}}';

	    } else if (!isEmpty(lokasi) || !isEmpty(departement) || !isEmpty(kategori) || !isEmpty(nama_petugas) || !isEmpty(tanggal_mulai) || !isEmpty(tanggal_selesai)) {
	  
			window.location.href = "{{url('laporan/laporan/search')}}"+'?cari_lokasi='+lokasi+'&cari_departement='+departement+'&cari_kegiatan='+kategori+'&cari_nama_petugas='+nama_petugas+'&cari_tanggal_mulai='+tanggal_mulai+'&cari_tanggal_selesai='+tanggal_selesai;
	    }
    });
</script>
@endpush
@endsection

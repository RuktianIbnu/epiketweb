@extends('layouts.layout')
@section('content')
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<ol class="breadcrumb breadcrumb-bg-teal">
            <li><a href="{{url('/home')}}"><i class="material-icons">home</i> Home</a></li>
            <li><a href="{{url('/transaksi/pendataan')}}"><i class="material-icons">widgets</i>Pendataan Kunjungan</a></li>
            <li class="active"><i class="material-icons">rate_review</i> Check Out Kunjungan</li>
        </ol>
		<div class="card">
			<div class="header bg-green">
				<h2>
					<u>Pendataan<u><small>Ubah Data Tamu</small>
				</h2>
			</div>

			<div class="body">
				<div class="row clearfix">

					<div class="col-md-12">
						<form id="form_pengguna">
							<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
							<input type="text" id="id" name="id" value="{{$rs->id}}" hidden></input>
							<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
								<br/>
								<div class="row">
								<br/>
									<div class="col-md-8">
										<div class="form-group form-float">
											<div class="form-line">
												<input type="text" class="form-control" id="nama" name="nama" value="{{$rs->nama}}" disabled>
												<label class="form-label">Nama Vendor</label>
											</div>
										</div>

										<div class="form-group form-float">
											<div class="form-line">
												<input type="text" class="form-control" id="departement" name="departement" value="{{$rs->departement}}" disabled>
												<label class="form-label">Departement / Perusahaan</label>
											</div>
										</div>

										<div class="form-group form-float">
											<div class="form-line">
												<input type="number" class="form-control" id="jumlah" name="jumlah" value="{{$rs->jumlah}}" disabled>
												<label class="form-label">Jumlah Orang</label>
											</div>
										</div>

										<div class="form-group form-float">
											<div class="form-line">
												<input type="text" class="form-control" id="lokasi" name="lokasi" value="{{$rs->lokasi}} - Ruang {{$rs->nama_ruang}}" disabled>
												<label class="form-label">Lokasi</label>
											</div>
										</div>

										<div class="form-group form-float">
											<div class="form-line">
												<input type="text" class="form-control" id="kode_jenis" name="kode_jenis" value="{{$rs->kode_jenis}}" disabled>
												<label class="form-label">Kegiatan</label>
											</div>
										</div>

										<div class="form-group form-float">
											<div class="form-line">
												<textarea type="text" class="form-control" id="deskripsi" name="deskripsi" disabled>{{$rs->deskripsi}}</textarea>
												<label class="form-label">Deskripsi Kegiatan</label>
											</div>
										</div>

										<div class="form-group form-float">
											<div class="form-line">
												<textarea type="text" class="form-control" id="efek" name="efek" disabled>{{$rs->efek}}</textarea>
												<label class="form-label">Efek Setelah Kegiatan</label>
											</div>
										</div>

										<div class="form-group form-float">
											<div class="form-line">
												<textarea type="text" class="form-control" id="resiko" name="resiko" disabled>{{$rs->resiko}}</textarea>
												<label class="form-label">Resiko Jika Gagal Dan Solusinya</label>
											</div>
										</div>

										<div class="col-md-4" class="row clearfix">
											<label class="row clearfix">Surat Pemberitahuan</label>
											<center>
												<div class="form-group">
													<div class="col-sm-3"> </div>
													<div class="row clearfix" id="hide_pemberitahuan">
														<button id="btn_download_pemberitahuan" class="btn btn-primary" type="button" style="width: 100%"><span class="glyphicon glyphicon-download"></span>&nbsp;Lihat Berkas</button>
													</div>
												</div>
											</center>
										</div>
										
											<div class="row clearfix">
												<div class="col-md-12">
													<div class="file-path-wrapper" id="pemberitahuan" hidden>
														<input type="file" name="photo_pemberitahuan" id="photo_pemberitahuan" class="form-control"><i> Surat Pemberitahuan Diupload dengan format PNG, JPG Max 500 Kb dan PDF, DOC, DOCX Max 20 Mb </i>
													</div>
												</div>
											</div>
										<br/>

										<div class="col-md-4">
											<label class="row clearfix">Surat Perintah</label>
											<center>
												<div class="form-group">
													<div class="col-sm-3"> </div>
													<div class="row clearfix" id="hide_perintah">
														<button id="btn_download_perintah" class="btn btn-primary" type="button" style="width: 100%"><span class="glyphicon glyphicon-download"></span>&nbsp;Lihat Berkas</button>
													</div>
												</div>
											</center>
										</div>

											<div class="row clearfix">
												<div class="col-md-12">
													<div class="file-path-wrapper" id="perintah" hidden>
														<input type="file" name="photo_perintah" id="photo_perintah" class="form-control"><i> Surat Perintah Diupload dengan format PNG, JPG Max 500 Kb dan PDF, DOC, DOCX Max 20 Mb</i>
													</div>
												</div>
											</div>
										<br/>
										
										<div class="col-md-4">
											<label class="row clearfix">Foto Kegiatan</label>
											<center>
												<div class="form-group">
													<div class="col-sm-3"> </div>
													<div class="row clearfix"  id="hide_kegiatan">
														<button id="btn_download_kegiatan" class="btn btn-primary" type="button" style="width: 100%"><span class="glyphicon glyphicon-download"></span>&nbsp;Lihat Berkas</button>
													</div>
												</div>
											</center>
										</div>

											<div class="row clearfix">
												<div class="col-md-12">
													<div class="file-path-wrapper" id="kegiatan" hidden>
														<input type="file" name="photo_kegiatan" id="photo_kegiatan" class="form-control"><i> Diunggah dengan format PNG, JPG Max 500 Kb</i>
													</div>
												</div>
											</div>
										<br/>
									</div>
								</div>
								
								
								<br>
								<?php $checkin = 'checkin';?>
								<?php $checkout = 'checkout';?>
								@if($rs->status == $checkin)
								<div class="row clearfix" id="hidden_ubah">
									<div class="col-md-8">
										<div class="pull-right">
											<button type="button" class="btn bg-cyan waves-effect" id="btn_ubah"><i class="material-icons">edit</i>&nbsp;Lengkapi Data Pengunjung
											</button>
										</div>
									</div>
								</div>

								<div class="row clearfix" hidden="true" id="btn_hidden">
									<div class="col-md-12">
										<div class="pull-right">
											<button type="button" class="btn bg-cyan waves-effect" id="btn_simpan"><i class="material-icons">save</i>&nbsp;Check Out</button>
											<button type="button" class="btn bg-orange waves-effect" id="btn_batal"><i class="material-icons">clear</i>&nbsp;Batal</button>
										</div>
									</div>
								</div>

								@elseif ($rs->status == $checkout)
								<div class="row clearfix" id="hidden_ubah">
									<div class="col-md-8">
										<div class="pull-right">
											<button type="button" class="btn bg-orange waves-effect" id="btn_print"> <i class="glyphicon glyphicon-download"></i> Download PDF
											</button>
										</div>
									</div>
								</div>
								@endif
								
							</div>	

							<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>		

						</form>	
					</div>

				</div>
			</div>
			
		</div>
	</div>

</div>
@push('script-footer')
<script src="{{url('js/transaksi/pendataan/show_app.js')}}"></script>
<!-- <script type="text/javascript">
	$(document).ready(function(){
		$('#lokasi').selectpicker('destroy');
		$('#lokasi').val("{{$rs->lokasi}}").selectpicker().change();

		$('#kategori').selectpicker('destroy');
		$('#kategori').val("{{$rs->kategori}}").selectpicker().change();
	})
</script> -->

<script type="text/javascript">
$('#kategori').change(function() {
    if( $(this).val() == "lain-lain" || $(this).val() == "lain") {
        $('#lain_lain').prop( "disabled", false );
    } else {       
        $('#lain_lain').prop( "disabled", true );
        $('#lain_lain').val('');
    }
});
</script>

<script type="text/javascript">
	var id = "{{$rs->id}}"
	var url_api = "{{url('api/v1/transaksi/pendataan/edit')}}"
	var url_pendataan = "{{url('/transaksi/pendataan/')}}"
	var url_filepemberitahuan = "{{$rs->photo_pemberitahuan}}"
	var url_perintah = "{{$rs->photo_perintah}}"
	var url_kegiatan = "{{$rs->photo_kegiatan}}"
</script>

<script type="text/javascript">
	$('#jumlah').change(function() {
    
});
</script>

<script>
	$('input[type="file"]').fileinput('clear');	
</script>

<script type="text/javascript">
	$('input[type="file"]').fileinput({
            'allowedFileExtensions' : ['pdf'],
            showUpload: false
        })
</script>

@endpush
@endsection


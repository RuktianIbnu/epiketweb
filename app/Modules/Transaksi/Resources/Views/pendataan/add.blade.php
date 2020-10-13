@extends('layouts.layout')
@section('content')
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<ol class="breadcrumb breadcrumb-bg-teal">
            <li><a href="{{url('/home')}}"><i class="material-icons">home</i> Home</a></li>
            <li><a href="{{url('/transaksi/pendataan')}}"><i class="material-icons">widgets</i> Transaksi Pendataan Tamu / Vendor</a></li>
            <li class="active"><i class="material-icons">library_add</i> Form Pendataan</li>
        </ol>
		<div class="card">
			<div class="header bg-green">
				<h2>
					<u>Pendataan Tamu</u><small>Menambahkan Data Tamu</small>
				</h2>
			</div>

			<div class="body">
				<div class="row clearfix">

					<div class="col-md-12">
						<form id="form_pengguna">
							<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>

							<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
								
								<br/>
								<div class="form-group form-float">
									<div class="form-line">
										<input type="text" class="form-control" id="nama" name="nama">
										<label class="form-label">Nama Lengkap</label>
									</div>
								</div>

								<div class="form-group form-float">
									<div class="form-line">
										<input type="text" class="form-control" id="departement" name="departement">
										<label class="form-label">Departement / Perusahaan</label>
									</div>
								</div>

								<div class="form-group form-float">
									<div class="form-line">
										<input type="number" class="form-control" id="jumlah" name="jumlah">
										<label class="form-label">Jumlah Orang</label>
									</div>
								</div>

								<div class="row clearfix">
									<div class="col-md-3">
										<label class="form-label">lokasi</label>
										<select class="form-control show-tick" style="font-size: 14px;" id="lokasi" name="lokasi" data-live-search="true">
											<option value="pilih" disabled selected>-- Pilih Lokasi --</option>
					                            <option value="Pusdakim 1 lantai 2">Pusdakim 1 (Lantai 2)</option>
					                            <option value="Pusdakim 1 lantai 9">Pusdakim 1 (Lantai 9)</option>
					                            <option value="Pusdakim 2 Bali">Pusdakim 2 Bali</option>
										</select>
									</div>
								</div>

								<!-- <div class="row clearfix">
									<div class="col-md-3">
										<label class="form-label">Tanggal Mulai</label>
										<input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai">
									</div>
									<div class="col-md-1">
												<label> s.d. </label>
											</div>
									<div class="col-md-3">
										<label class="form-label">Tanggal Selesai</label>
										<input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai">
									</div>
									<div class="col-md-2">
										<label class="form-label">Waktu Mulai</label>
										<input type="time" class="form-control time24" placeholder="Ex: 23:59" id="waktu_mulai" name="waktu_mulai">
									</div>
									<div class="col-md-1">
												<label> s.d. </label>
											</div>
									<div class="col-md-2">
										<label class="form-label">Waktu Selesai</label>
										<input type="time" class="form-control time24" placeholder="Ex: 23:59" id="waktu_akhir" name="waktu_akhir">
									</div>
								</div> -->

								<div class="row clearfix">
									<div class="col-md-6">
										<label class="form-label">Kategori Kegiatan</label>
										<select class="form-control show-tick" style="font-size: 14px;" id="kategori" name="kategori" data-live-search="true">
											<option value="pilih" disabled selected>-- Pilih Kategori Kegiatan --</option>
					                            <option value="Maintenance">Maintenance</option>
					                            <option value="Install">Install</option>
					                            <option value="Check">Check</option>
					                            <option value="Troubleshoot">Troubleshoot</option>
					                            <option value="lain-lain">Lain-lain</option>
										</select>
									</div>
									<div class="col-md-6">
										<label class="form-label"> Alasan lain-lain</label>
										<input type="text" class="form-control" id="lain_lain" name="lain_lain" disabled>
									</div>
								</div>

								<div class="form-group form-float">
									<div class="form-line">
										<textarea type="text" class="form-control" id="deskripsi" name="deskripsi"></textarea>
										<label class="form-label">Deskripsi Kegiatan</label>
									</div>
								</div>

								<div class="form-group form-float">
									<div class="form-line">
										<textarea type="text" class="form-control" id="efek" name="efek"></textarea>
										<label class="form-label">Efek Setelah Kegiatan</label>
									</div>
								</div>

								<div class="form-group form-float">
									<div class="form-line">
										<textarea type="text" class="form-control" id="resiko" name="resiko"></textarea>
										<label class="form-label">Resiko Jika Gagal Dan Solusinya</label>
									</div>
								</div>

								<label for="userpic">Berkas pemberitahuan</label>
								<div class="row clearfix">
									<div class="col-md-12">
										<div class="file-path-wrapper">
											<input type="file" enctype="multipart/form-data" name="photo_pemberitahuan" id="photo_pemberitahuan" class="form-control"><i>Surat Pemberitahuan Diupload dengan format PNG, JPG Max 500 Kb dan PDF, DOC, DOCX Max 20 Mb </i>
										</div>
									</div>
								</div>
								<br/>

								<label for="userpic">Berkas perintah</label>
								<div class="row clearfix">
									<div class="col-md-12">
										<div class="file-path-wrapper">
											<input type="file" name="photo_perintah" id="photo_perintah" class="form-control"><i>Surat Perintah Diupload dengan format PNG, JPG Max 500 Kb dan PDF, DOC, DOCX Max 20 Mb</i>
										</div>
									</div>
								</div>
								<br/>
								
								<label for="userpic">Foto Kegiatan</label>
								<div class="row clearfix">
									<div class="col-md-12">
										<div class="file-path-wrapper">
											<input type="file" multiple="multiple" name="photo_kegiatan" id="photo_kegiatan" class="form-control"><i>Foto Kegiatan Diupload dengan format PNG, JPG Max 500 Kb </i>
										</div>
									</div>
								</div>
								<br/>

								<div class="row clearfix">
									<div class="col-md-12">
										<div class="pull-right">
											<button type="button" class="btn bg-cyan waves-effect" id="btn_simpan"><i class="material-icons">save</i><span>&nbsp;Simpan Data</span></button>
											<button type="button" class="btn bg-orange waves-effect" id="btn_batal"><i class="material-icons">clear</i><span>&nbsp;Batal</span></button>
										</div>
									</div>
								</div>

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
<script src="{{url('js/transaksi/pendataan/add_app.js')}}"></script> 
<script type="text/javascript">
	var url_api = "{{url('api/v1/transaksi/pendataan/store')}}"
</script>

<script>
	$('input[type="file"]').fileinput('clear');	
</script>

<script type="text/javascript">
	$('#kategori').change(function() {
    if( $(this).val() == "lain-lain") {
        $('#lain_lain').prop( "disabled", false );
    } else {       
        $('#lain_lain').prop( "disabled", true );
        $('#lain_lain').val('');
    }
});
</script>

<!-- <script>
$(document).ready(function(){
  $("#jumlah").change(function(){
  	var value = $('#jumlah').val();
  		for(var i = 0; i < value; i++){
			$('<input>').attr({
			    type: 'text',
			    id: 'name_'+i,
			    name: 'name_'+i
			}).appendTo('input');
  		}
  	});
});
</script> -->

@endpush
@endsection


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
					<u>Menambahkan Data Tamu</u><small>CHECK IN</small>
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
					                            <option value="Pusdakim 2 Bali">Pusdakim 2</option>
										</select>
									</div>
									<div class="col-md-3">
										<label class="form-label">Detail Lokasi</label>
										<select class="form-control show-tick" style="font-size: 14px;" id="ruang" name="ruang" data-live-search="true">
											<option value="pilih" disabled selected>-- Pilih Ruangan --</option>
					                        @foreach($rsruang as $result)
					                            <option value="{{$result->id}}" data-areaname="{{$result->nama_ruang}}">{{$result->display}}</option>
					                        @endforeach 
										</select>
									</div>									
								</div>

								<div class="row clearfix">
									<div class="col-md-3">
										<label class="form-label">Jenis Kegiatan</label>
										<select class="form-control show-tick" style="font-size: 14px;" id="kegiatan" name="kegiatan" data-live-search="true">
											<option value="pilih" disabled selected>-- Pilih Kegiatan --</option>
					                        @foreach($rskegiatan as $result)
					                            <option value="{{$result->id}}" data-areaname="{{$result->kode_jenis}}">{{$result->kode_jenis}}</option>
					                        @endforeach 
										</select>
									</div>
								</div>

								<br/>

								<div class="row clearfix">
									<div class="col-md-12">
										<div class="pull-right">
											<button type="button" class="btn bg-cyan waves-effect" id="btn_simpan"><i class="material-icons">save</i><span>&nbsp;Check In</span></button>
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


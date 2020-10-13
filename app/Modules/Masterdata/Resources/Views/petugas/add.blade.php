@extends('layouts.layout')
@section('content')
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<ol class="breadcrumb breadcrumb-bg-teal">
            <li><a href="{{url('/home')}}"><i class="material-icons">home</i> Home</a></li>
            <li><a href="{{url('/masterdata/petugas')}}"><i class="material-icons">widgets</i> Master Data Petugas</a></li>
            <li class="active"><i class="material-icons">library_add</i> Tambah Petugas</li>
        </ol>
		<div class="card">
			<div class="header bg-green">
				<h2>
					<u>Petugas</u><small>Menambahkan Data Petugas</small>
				</h2>
			</div>

			<div class="body">
				<div class="row clearfix">

					<div class="col-md-12">
						<form id="form_pengguna">
							<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>

							<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
								<input type="text" hidden id="from_admin" name="from_admin" value="1"></input>
								<br/>
								<div class="form-group form-float">
									<div class="form-line">
										<input type="text" class="form-control" id="nama" name="nama">
										<label class="form-label">Nama Lengkap</label>
									</div>
								</div>

								<div class="form-group form-float">
									<div class="form-line">
										<input type="text" class="form-control" id="nip" name="nip" maxlength="18" min="0">
										<label class="form-label">NIP</label>
									</div>
								</div>

								<div class="form-group form-float">
									<div class="form-line">
										<input type="text" class="form-control" id="no_hp" name="no_hp" maxlength="18" min="0">
										<label class="form-label">No Telepon</label>
									</div>
								</div>

								<div class="form-group form-float">
									<div class="form-line">
										<input type="text" class="form-control" id="password" name="password">
										<label class="form-label">Password</label>
									</div>
								</div>
								
								<div class="row clearfix">
									<div class="col-md-12">
										<label class="form-label">Level Pengguna</label>
										<select class="form-control show-tick" style="font-size: 14px;" id="level_pengguna" name="level_pengguna" data-live-search="true">
											<option value="pilih" disabled selected>-- Pilih Level Pengguna --</option>
					                        @foreach($resultslevel as $resultlevel)
					                            <option value="{{$resultlevel->id}}" data-id="{{$resultlevel->id}} data-areaname="{{$resultlevel->name}}">{{$resultlevel->display}}</option>
					                        @endforeach 
										</select>
									</div>
								</div>

								<div class="row clearfix" id="subdit">
									<div class="col-md-12">
										<label class="form-label">Subdit</label>
										<select class="form-control show-tick" style="font-size: 14px;" id="kode_subdirektorat" name="kode_subdirektorat" data-live-search="true">
											<option value="pilih" disabled selected>-- Pilih Subdit --</option>
					                        @foreach($rssubdit as $result)
					                            <option value="{{$result->kode_subdirektorat}}" data-areaname="{{$result->nama_subdirektorat}}">{{$result->display}}</option>
					                        @endforeach 
										</select>
									</div>
								</div>

								<div class="row clearfix" id="kasi">
									<div class="col-md-12">
										<label class="form-label">Kasi</label>
										<select class="form-control show-tick" style="font-size: 14px;" id="kode_seksi" name="kode_seksi" data-live-search="true">
											<option value="pilih" disabled selected>-- Pilih Kasi --</option>
					                        @foreach($rsseksi as $resultseksi)
					                            <option value="{{$resultseksi->kode_seksi}}" data-areaname="{{$resultseksi->nama_seksi}}">{{$resultseksi->display}}</option>
					                        @endforeach 
										</select>
									</div>
								</div>

								<label for="userpic">Foto</label>
								<div class="row clearfix">
									<div class="col-md-12">
										<div class="file-path-wrapper">
											<input type="file" name="photo" id="photo" class="form-control"><i> Diupload dengan format PNG, JPG Max 500 Kb </i>
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
<script src="{{url('js/masterdata/petugas/add_app.js')}}"></script> 

<script type="text/javascript">
	var url_api = "{{url('api/v1/masterdata/petugas/store')}}"
</script>

@endpush
@endsection


@extends('layouts.layout')
@section('content')
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<ol class="breadcrumb breadcrumb-bg-teal">
            <li><a href="{{url('/home')}}"><i class="material-icons">home</i> Home</a></li>
            <li><a href="{{url('/masterdata/petugas')}}"><i class="material-icons">widgets</i> Master Data Petugas</a></li>
            <li class="active"><i class="material-icons">rate_review</i> Ubah Petugas</li>
        </ol>
		<div class="card">
			<div class="header bg-green">
				<h2>
					<u>Petugas<u><small>Ubah Data Petugas</small>
				</h2>
			</div>

			<div class="body">
				<div class="row clearfix">

					<div class="col-md-12">
						<form id="form_pengguna">
							<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>

							<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
								<br/>
								<div class="row">
									<div class="col-md-4">
										<center>
											@if($rs->photo != null)
												<img src="{{url($rs->photo)}}" class="img-circle img-thumbnail" alt="User Image" id="user-img" height="240" width="240">
											@else
												<img src="{{url('assets\template\img\user.png')}}" class="img-circle img-thumbnail" alt="User Image" id="user-img" height="240" width="240">
											@endif
										</center>
									</div>
									<br/>
									<div class="col-md-8">
										<div class="form-group form-float">
											<div class="form-line">
												<input type="text" class="form-control" id="nama" name="nama" value="{{$rs->nama}}" disabled>
												<label class="form-label">Nama Lengkap</label>
											</div>
										</div>

										<div class="form-group form-float">
											<div class="form-line">
												<input type="text" class="form-control" id="nip" name="nip"  maxlength="18" value="{{$rs->nip}}" disabled>
												<label class="form-label">NIP</label>
											</div>
										</div>

										<div class="form-group form-float">
											<div class="form-line">
												<input type="text" class="form-control" id="no_hp" name="no_hp" value="{{$rs->no_hp}}" maxlength="18" min="0" disabled>
												<label class="form-label">No Telepon</label>
											</div>
										</div>

										<div class="row clearfix" id="level">
											<div class="col-md-12">
												<label class="form-label">Level Pengguna</label>
												<select class="form-control show-tick" style="font-size: 14px;"  id="level_pengguna" name="level_pengguna" data-live-search="true">
													<option value="pilih" disabled='true' selected>-- Pilih Level Petugas --</option>
													@foreach($rslevel as $rslevel)
					                                    <option value="{{$rslevel->id}}" @if($rs->level_pengguna == $rslevel->id) selected @endif>{{$rslevel->display}}</option>
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
							                            <option value="{{$result->kode_subdirektorat}}" @if($rs->kode_subdirektorat == $result->kode_subdirektorat) selected @endif>{{$result->display}}</option>
							                        @endforeach 
												</select>
											</div>
										</div>

										<div class="row clearfix">
											<div class="col-md-12">
												<label class="form-label">Kasi</label>
												<select class="form-control show-tick" style="font-size: 14px;" id="kode_seksi" name="kode_seksi" data-live-search="true">
													<option value="pilih" disabled='true' selected>-- Pilih Kasi --</option>
							                        @foreach($rsseksi as $resultseksi)
							                            <option value="{{$resultseksi->kode_seksi}}" @if($rs->kode_seksi == $resultseksi->kode_seksi) selected @endif>{{$resultseksi->display}}</option>
							                        @endforeach 
												</select>
											</div>
										</div>

										<label for="userpic">Foto</label>
										<div class="row clearfix">
											<div class="col-md-12">
												<div class="file-path-wrapper">
													<input type="file" name="photo" id="photo" class="form-control" disabled><i> Diunggah dengan format PNG, JPG Max 500 Kb</i>
												</div>
											</div>
										</div>
										<br/>
									</div>
								</div>
								
								<br>
								
								<div class="row clearfix" id="hidden_ubah">
									<div class="col-md-12">
										<div class="pull-right">
											<button type="button" class="btn bg-cyan waves-effect" id="btn_ubah"><i class="material-icons">edit</i>&nbsp;Ubah Data</button>
										</div>
									</div>
								</div>

								<div class="row clearfix" hidden="true" id="btn_hidden">
									<div class="col-md-12">
										<div class="pull-right">
											<button type="button" class="btn bg-cyan waves-effect" id="btn_simpan"><i class="material-icons">save</i>&nbsp;Simpan Data</button>
											<button type="button" class="btn bg-orange waves-effect" id="btn_batal"><i class="material-icons">clear</i>&nbsp;Batal</button>
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
<script src="{{url('js/masterdata/petugas/show_app.js')}}"></script>

<script type="text/javascript">
	var id = "{{$rs->id}}"
	var url_api = "{{url('api/v1/masterdata/petugas/edit')}}"
	var url_petugas = "{{url('/masterdata/petugas/')}}"

	$(document).ready(function(){
		$("level_pengguna").selectpicker('destroy');
		$("level_pengguna").val("{{$rs->level_pengguna}}").selectpicker().change();
		$('#kode_subdirektorat').attr('disabled', true);
	    $('#kode_seksi').attr('disabled', true);
    	$('#level_pengguna').attr('disabled', true);
	})
</script>
@endpush
@endsection


@extends('layouts.layout')
@section('content')
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<ol class="breadcrumb breadcrumb-bg-teal">
            <li><a href="{{url('/home')}}"><i class="material-icons">home</i> Home</a></li>
            <li><a href="{{url('/masterdata/seksi')}}"><i class="material-icons">widgets</i> Master Seksi</a></li>
            <li class="active"><i class="material-icons">library_add</i> Tambah Seksi</li>
        </ol>
		<div class="card">
			<div class="header bg-green">
				<h2>
					<u>Seksi</u><small>Menambahkan Seksi</small>
				</h2>
			</div>

			<div class="body">
				<div class="row clearfix">

					<div class="col-md-12">
						<form id="form_pengguna">
							<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>

							<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
								
								<br/>

								<div class="row clearfix">
									<div class="col-md-12">
										<label class="form-label">Subdit</label>
										<select class="form-control show-tick" style="font-size: 14px;" id="kode_subdirektorat" name="kode_subdirektorat" data-live-search="true">
											<option value="pilih" disabled selected>-- Pilih Subdit --</option>
					                        @foreach($rs as $result)
					                            <option value="{{$result->kode_subdirektorat}}" data-areaname="{{$result->nama_subdirektorat}}">{{$result->display}}</option>
					                        @endforeach 
										</select>
									</div>
								</div>

								<div class="form-group form-float">
									<div class="form-line">
										<input type="text" class="form-control" id="kode_seksi" name="kode_seksi">
										<label class="form-label">Kode seksi</label>
									</div>
								</div>

								<div class="form-group form-float">
									<div class="form-line">
										<input type="text" class="form-control" id="nama_seksi" name="nama_seksi" min="0">
										<label class="form-label">Nama seksi</label>
									</div>
								</div>

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
<script src="{{url('js/masterdata/seksi/add_app.js')}}"></script> 

<script type="text/javascript">
	var url_api = "{{url('api/v1/masterdata/seksi/store')}}"
</script>

@endpush
@endsection


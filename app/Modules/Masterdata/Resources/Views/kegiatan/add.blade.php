@extends('layouts.layout')
@section('content')
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<ol class="breadcrumb breadcrumb-bg-teal">
            <li><a href="{{url('/home')}}"><i class="material-icons">home</i> Home</a></li>
            <li><a href="{{url('/masterdata/kegiatan')}}"><i class="material-icons">widgets</i> Master Data Kegiatan</a></li>
            <li class="active"><i class="material-icons">library_add</i> Tambah Jenis Kegiatan</li>
        </ol>
		<div class="card">
			<div class="header bg-green">
				<h2>
					<u>Petugas</u><small>Menambahkan Data Kegiatan</small>
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
										<input type="text" class="form-control" id="kode_jenis" name="kode_jenis">
										<label class="form-label">Nama Jenis Kegiatan</label>
									</div>
								</div>

								<div class="form-group form-float">
									<div class="form-line">
										<input type="text" class="form-control" id="jenis_kegiatan" name="jenis_kegiatan">
										<label class="form-label">Deskripsi Jenis Kegiatan</label>
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
<script src="{{url('js/masterdata/kegiatan/add_app.js')}}"></script> 

<script type="text/javascript">
	var url_api = "{{url('api/v1/masterdata/kegiatan/store')}}"
</script>

@endpush
@endsection


@extends('layouts.layout')
@section('content')
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<ol class="breadcrumb breadcrumb-bg-teal">
            <li><a href="{{url('/home')}}"><i class="material-icons">home</i> Home</a></li>
            <li><a href="{{url('/masterdata/ruang')}}"><i class="material-icons">widgets</i> Master Data Ruang</a></li>
            <li class="active"><i class="material-icons">library_add</i> Tambah Ruang</li>
        </ol>
		<div class="card">
			<div class="header bg-green">
				<h2>
					<u>Petugas</u><small>Menambahkan Data Ruang</small>
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
										<input type="text" class="form-control" id="nama_ruang" name="nama_ruang">
										<label class="form-label">Nama Ruang</label>
									</div>
								</div>

								<div class="form-group form-float">
									<div class="form-line">
										<input type="text" class="form-control" id="deskripsi" name="deskripsi">
										<label class="form-label">Deskripsi Ruang</label>
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
<script src="{{url('js/masterdata/ruang/add_app.js')}}"></script> 

<script type="text/javascript">
	var url_api = "{{url('api/v1/masterdata/ruang/store')}}"
</script>

@endpush
@endsection


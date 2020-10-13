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
								<div class="row clearfix">
									<div class="col-md-4">
		                            	<label class="form-label">{{__('Partner Piket') }}</label>
		                                <select class="form-control" style="font-size: 12px;" id="petugas_2" name="petugas_2" data-live-search="true">
		                                    <option class="form-control" value="pilih" disabled selected>-- Pilih Partner --</option>
		                                    @foreach($rs as $result)
		                                        <option value="{{$result->nip}}" data-areaname="{{$result->nama}}">{{$result->display}}</option>
		                                    @endforeach 
		                                </select>
		                            </div>
		                            <div class="col-md-2">
										<label class="form-label">Tanggal</label>
										<input type="date" class="form-control" id="tanggal" name="tanggal">
									</div>
									<div class="col-md-2">
										<label class="form-label">Waktu</label>
										<input type="time" class="form-control time24" placeholder="Ex: 23:59" id="waktu" name="waktu">
									</div>
		                        </div>

								<div class="row clearfix">
									<div class="col-md-2">
										<label class="form-label">Suhu Ruangan</label>
										<input type="text" class="form-control" placeholder="&deg C" id="suhu_ruangan" name="suhu_ruangan">
									</div>
									<div class="col-md-2">
										<label class="form-label">AC Back Up 1</label>
										<input type="text" class="form-control" placeholder="" id="ac_backup_1" name="ac_backup_1">
									</div>
									<div class="col-md-2">
										<label class="form-label">AC Back Up 2</label>
										<input type="text" class="form-control" placeholder="" id="ac_backup_2" name="ac_backup_2">
									</div>
								</div>

								<div class="row clearfix">
									<div class="col-md-2">
										<label class="form-label">UPS Redudancy</label>
										<input type="text" class="form-control" placeholder="" id="ups_redudancy" name="ups_redudancy">
									</div>
									<div class="col-md-2">
										<label class="form-label">UPS Load</label>
										<input type="text" class="form-control" placeholder="" id="ups_load" name="ups_load">
									</div>
									<div class="col-md-2">
										<label class="form-label">UPS Runtime</label>
										<input type="text" class="form-control" placeholder="" id="ups_runtime" name="ups_runtime">
									</div>
									<div class="col-md-2">
										<label class="form-label">UPS Temperature</label>
										<input type="text" class="form-control" placeholder="&deg C" id="ups_temp" name="ups_temp">
									</div>
								</div>

								<div class="row clearfix">
									<div class="col-md-2">
										<label class="form-label">AC 1</label>
										<input type="text" class="form-control" placeholder="" id="ac_1" name="ac_1">
									</div>
									<div class="col-md-2">
										<label class="form-label">AC 2</label>
										<input type="text" class="form-control" placeholder="" id="ac_2" name="ac_2">
									</div>
									<div class="col-md-2">
										<label class="form-label">AC 3</label>
										<input type="text" class="form-control" placeholder="" id="ac_3" name="ac_3">
									</div>
								</div>

								<div class="row clearfix">
									<div class="col-md-12">
										<label class="form-label">Keterangan</label>
										<textarea class="form-control" placeholder="" id="keterangan" name="keterangan"></textarea> 
									</div>
								</div>
								<br/>

								<label for="userpic">Foto Kegiatan</label>
								<div class="row clearfix">
									<div class="col-md-12">
										<div class="file-path-wrapper">
											<input type="file" multiple="multiple" name="photo[]" id="photo" class="form-control"><i> Diupload dengan format PNG, JPG Max 500 Kb </i>
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
<script src="{{url('js/transaksi/pendataan_drc/add_app.js')}}"></script> 
<script type="text/javascript">
	var url_api = "{{url('api/v1/transaksi/PendataanDrc/store')}}"
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


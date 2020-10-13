@extends('layouts.layout')
@section('content')
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<ol class="breadcrumb breadcrumb-bg-teal">
            <li><a href="{{url('/home')}}"><i class="material-icons">home</i> Home</a></li>
            <li><a href="{{url('/transaksi/PendataanDrcBali')}}"><i class="material-icons">widgets</i> Pendataan DRC</a></li>
            <li class="active"><i class="material-icons">rate_review</i> Ubah Petugas</li>
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
							<input type="text" id="nip" name="nip" value="{{$rs->petugas_1}}" hidden></input>
							<input type="text" id="id" name="id" value="{{$rs->id}}" hidden></input>
							<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
								<br/>
								<div class="row">
								<br/>
									<div class="col-md-8">
										<br/>
											<div class="row clearfix">
												<div class="col-md-4">
					                            	<label class="form-label">{{__('Partner Piket') }}</label>
					                                <select class="form-control" style="font-size: 12px;" id="petugas_2" name="petugas_2" data-live-search="true">
					                                    <option class="form-control" value="pilih" disabled selected>-- Pilih Partner --</option>
					                                    @foreach($rsPartner as $result)
					                                        <option value="{{$result->nip}}" @if($rs->petugas_2 == $result->nip) selected @endif>{{$result->display}}</option>
					                                    @endforeach 
					                                </select>
					                            </div>
					                            <div class="col-md-3">
													<label class="form-label">Tanggal</label>
													<input type="date" class="form-control" id="tanggal" name="tanggal" value="{{$rs->tanggal}}">
												</div>
												<div class="col-md-3">
													<label class="form-label">Waktu</label>
													<input type="time" class="form-control time24" placeholder="Ex: 23:59" id="waktu" name="waktu" value="{{$rs->waktu}}">
												</div>
					                        </div>

											<div class="row clearfix">
												<div class="col-md-2">
													<label class="form-label">Suhu Ruangan</label>
													<input type="text" class="form-control" placeholder="&deg C" id="suhu_ruangan" name="suhu_ruangan" value="{{$rs->suhu_ruangan}}">
												</div>
												<div class="col-md-2">
													<label class="form-label">AC Back Up 1</label>
													<input type="text" class="form-control" placeholder="" id="ac_backup_1" name="ac_backup_1" value="{{$rs->ac_backup_1}}">
												</div>
												<div class="col-md-2">
													<label class="form-label">AC Back Up 2</label>
													<input type="text" class="form-control" placeholder="" id="ac_backup_2" name="ac_backup_2" value="{{$rs->ac_backup_2}}">
												</div>
											</div>

											<div class="row clearfix">
												<div class="col-md-2">
													<label class="form-label">UPS Redudancy</label>
													<input type="text" class="form-control" placeholder="" id="ups_redudancy" name="ups_redudancy" value="{{$rs->ups_redudancy}}">
												</div>
												<div class="col-md-2">
													<label class="form-label">UPS Load</label>
													<input type="text" class="form-control" placeholder="" id="ups_load" name="ups_load" value="{{$rs->ups_load}}">
												</div>
												<div class="col-md-2">
													<label class="form-label">UPS Runtime</label>
													<input type="text" class="form-control" placeholder="" id="ups_runtime" name="ups_runtime" value="{{$rs->ups_runtime}}">
												</div>
												<div class="col-md-3">
													<label class="form-label">UPS Temperature</label>
													<input type="text" class="form-control" placeholder="&deg C" id="ups_temp" name="ups_temp" value="{{$rs->ups_temp}}">
												</div>
											</div>

											<div class="row clearfix">
												<div class="col-md-2">
													<label class="form-label">AC 1</label>
													<input type="text" class="form-control" placeholder="" id="ac_1" name="ac_1" value="{{$rs->ac_1}}">
												</div>
												<div class="col-md-2">
													<label class="form-label">AC 2</label>
													<input type="text" class="form-control" placeholder="" id="ac_2" name="ac_2" value="{{$rs->ac_2}}">
												</div>
												<div class="col-md-2">
													<label class="form-label">AC 3</label>
													<input type="text" class="form-control" placeholder="" id="ac_3" name="ac_3" value="{{$rs->ac_3}}">
												</div>
											</div>

											<div class="row clearfix">
												<div class="col-md-12">
													<label class="form-label">Keterangan</label>
													<textarea class="form-control" placeholder="" id="keterangan" name="keterangan">{{$rs->keterangan}}</textarea> 
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
									</div>
								</div>
								
								
								<br>
								

								<div class="row clearfix" id="hidden_ubah">
									<div class="col-md-8">
										<div class="pull-right">
											<button type="button" class="btn bg-cyan waves-effect" id="btn_ubah"><i class="material-icons">edit</i>&nbsp;Ubah Data
											</button>
										</div>
									</div>
								</div>

								<div class="row clearfix" id="hidden_ubah">
									<div class="col-md-8">
										<div class="pull-right">
											<button type="button" class="btn bg-orange waves-effect" id="btn_print"> <i class="glyphicon glyphicon-download"></i> Download PDF
											</button>
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
<script src="{{url('js/transaksi/pendataan_drc/show_app.js')}}"></script>

<script type="text/javascript">
	var id = "{{$rs->id}}"
	var url_api = "{{url('api/v1/transaksi/PendataanDrc/edit')}}"
	var url_pendataan = "{{url('/transaksi/PendataanDrcBali/')}}"
</script>

<script type="text/javascript">
	$('#jumlah').change(function() {
    
});
</script>

<script>
	$('input[type="file"]').fileinput('clear');	
</script>
@endpush
@endsection


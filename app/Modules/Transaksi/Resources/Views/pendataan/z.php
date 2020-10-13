{{ Html::style(url('css/Transaksi/pkt.css')) }}

<section class="content-header">
	<h1>&nbsp;Jadwal dan Realisasi Pemberangkatan Transmigrasi
	</br>
	<small>Menampilkan data jadwal dan realisasi pemberangkatan transmigran</small>
</h1>
<ol class="breadcrumb">
	<li><a href="#"> Transaksi</a></li>
	<li><a href="#"> PPP</a></li>
	<li class="active">Jadwal Pemberangkatan Baru</li>
</ol>
</section>

<section class="content">
	<div class="panel panel-success">
		<div class="panel-body">
			<div class="box-body">
				<div class="row">
					<div class="box-header with-border"> <button onclick="history.back()" class="btn btn-success pull-right" style="margin-right: 5px"><i class="fa fa-backward"></i>&nbsp;Kembali</button> </div>
					<br/>
					<div class="col-md-12">

						<form class="form-horizontal" id="form_pemberangkatan">

								<div class="col-md-offset-2">

									<div class="form-group">
										<label class="control-label col-sm-3" style="text-align: right;" for="kode_jp">Kode Jadwal Pemberangkatan</label>
										<div class="col-md-6">
											<input type="text" id="kode_jp" name="kode_jp" class="form-control col-md-7 col-xs-12" readonly>
										</div>
									</div>

									<div class="form-group ">
										<label class="control-label col-sm-3" style="text-align: right;" for="tahun">Tahun</label>
										<div class="col-md-6">
											<div class="input-group input-group-sm">
												<input type="text" id="tahun" name="tahun" class="form-control col-md-7 col-xs-12 form-control datepicker" style="font-size: 14px" disabled>
												<span class="input-group-btn">
													<button class="btn btn-success" type="button" tabindex="-1"><i class="fa fa-calendar"></i></button>
												</span>
											</div>
										</div>
									</div>

									<div class="form-group ">
										<label class="control-label col-sm-3" style="text-align: right;" for="tgl_keberangkatan">Tanggal Keberangkatan</label>
										<div class="col-md-6">
											<div class="input-group input-group-sm">
												<input type="text" id="tgl_keberangkatan" name="tgl_keberangkatan" class="form-control col-md-7 col-xs-12 form-control datepicker2" style="font-size: 14px" disabled>
												<span class="input-group-btn">
													<button class="btn btn-success" type="button" tabindex="-1"><i class="fa fa-calendar"></i></button>
												</span>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-3" for="spp" style="text-align: right;">SPP</div>
										<div class="col-md-6"> 
											<textarea class="form-control" id="spp" name="spp" disabled /> 
										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-3"> </div>
										<div class="col-md-4"> 
											<input type="file" class="form-control" name="file_spp" id="file_spp" readonly> 
										</div>
										<div class="col-md-2">
											<button id="btn_dl_file_spp" class="btn btn-primary" type="button" style="width: 100%" hidden><span class="glyphicon glyphicon-download"></span>&nbsp;Unduh Berkas</button>
										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-3" for="dasal" style="text-align: right;">Dasal (KK)</div>
										<div class="col-md-3">
											<input type="number" id="tps_dasal" name="tps_dasal" class="form-control col-md-7 col-xs-12" placeholder="TPS" disabled>
										</div>
										<div class="col-md-3">
											<input type="number" id="tpa_dasal" name="tpa_dasal" class="form-control col-md-7 col-xs-12" placeholder="TPA" disabled>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-sm-3" style="text-align: right;" for="kode_sp">Satuan Pemukiman</label>
										<div class="col-md-6">
											<select id="kode_sp" name="kode_sp" class="form-control select2_single" style="width: 100%" disabled>
												<option value="pilih" disabled selected>Pilih</option>
												@foreach($rssp as $result)
												<option value="{{$result->kode_sp}}">{{@$result->display}}</option>
												@endforeach
											</select>  
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-sm-3" style="text-align: right;" for="kode_tu">Jenis/Pola</label>
										<div class="col-md-6">
											<input type="text" id="kode_tu" name="kode_tu" class="form-control col-md-7 col-xs-12" readonly>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-sm-3" style="text-align: right;" for="kode_kabupaten">Kabupaten Daerah Tujuan</label>
										<div class="col-md-6">
											<input type="text" id="kode_kabupaten" name="kode_kabupaten" class="form-control col-md-7 col-xs-12" readonly>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-sm-3" style="text-align: right;" for="kode_provinsi">Provinsi Daerah Tujuan</label>
										<div class="col-md-6">
											<input type="text" id="kode_provinsi" name="kode_provinsi" class="form-control col-md-7 col-xs-12" readonly>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-sm-3" style="text-align: right;" for="kode_provinsi_dasal">Provinsi Daerah Asal</label>
										<div class="col-md-6">
											<select id="kode_provinsi_dasal" name="kode_provinsi_dasal" class="form-control select2_single" style="width: 100%" disabled>
												<option value="pilih" disabled selected>Pilih</option>
												@foreach($rsprov as $result)
												<option value="{{$result->kode_provinsi}}">{{@$result->display}}</option>
												@endforeach
											</select>  
										</div>
									</div>
									<br/>

									<div class="form-group">
										<label class="control-label col-md-3 col-
										sm-3 col-xs-12" for="btn_tambah_pemberangkatan"></label>
										<div class="col-md-6 col-sm-6 col-xs-12">
											<button type="button" class="pull-right btn btn-info" id="btn_tambah_pemberangkatan" disabled><span class="fa fa-plus"></span> Tambah Pemberangkatan</button>
										</div>
									</div>
									<br/>
								</div>

								<div class="modal fade" id="mdl_tambah_pemberangkatan" role="dialog">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h3 class="modal-title" id="mdl_title"/>
											</div>

											<div class="modal-body col-md-offset-2">

												<div class="form-group">
													<div class="col-sm-3">
														<label class="control-label" style="text-align: left;" for="kode_kabupaten_dasal">Kabupaten Daerah Asal</label>
													</div>
													<div class="col-md-6">
														<select id="kode_kabupaten_dasal" name="kode_kabupaten_dasal" class="form-control select2_single" style="width: 100%" fillable>
															<option value="pilih" disabled selected>Pilih Kabupaten Asal</option>
														</select>  
													</div>
												</div>

												<div class="form-group">
													<div class="col-sm-3" style="text-align: right;" for="jenis_angkutan">Jenis Angkutan</div>
													<div class="col-md-2">
														<input type="number" id="angkutan_darat" name="angkutan_darat" placeholder="Darat (KK)" class="form-control col-md-7 col-xs-12" fillable>
													</div>
													<div class="col-md-2">
														<input type="number" id="angkutan_laut" name="angkutan_laut" placeholder="Laut (KK)" class="form-control col-md-7 col-xs-12" fillable>
													</div>
													<div class="col-md-2">
														<input type="number" id="angkutan_udara" name="angkutan_udara" placeholder="udara (KK)" class="form-control col-md-7 col-xs-12" fillable>
													</div>
												</div>

												<div class="form-group row">
													<div class="col-sm-3" style="text-align: right;" for="realisasi">Realisasi TPA</div>
													<div class="col-md-3">
														<input type="number" id="tpa_kk_realisasi" name="tpa_kk_realisasi" placeholder="(KK)" class="form-control col-md-7 col-xs-12" fillable>
													</div>
													<div class="col-md-3">
														<input type="number" id="tpa_jiwa_realisasi" name="tpa_jiwa_realisasi" placeholder="(Jiwa)" class="form-control col-md-7 col-xs-12" fillable>
													</div>
												</div>  

												<div class="form-group row">
													<div class="col-sm-3" style="text-align: right;" for="realisasi">Realisasi TPS</div>
													<div class="col-md-3">
														<input type="number" id="tps_kk_realisasi" name="tps_kk_realisasi" placeholder="(KK)" class="form-control col-md-7 col-xs-12" fillable>
													</div>
													<div class="col-md-3">
														<input type="number" id="tps_jiwa_realisasi" name="tps_jiwa_realisasi" placeholder="(Jiwa)" class="form-control col-md-7 col-xs-12" fillable>
													</div>
												</div>  

											</div>

											<div class="modal-footer">
												<button type="button" id="btn_tutup_tambah" class="btn btn-default" data-dismiss="modal" class="fa fa-close">Tutup</button>
												<button id="btn_tambah_detail" type="button" class="btn btn-primary"><span class="fa fa-plus"></span> Tambah</button>
												<button id="btn_edit_pemberangkatan" data-dismiss="modal" type="button" class="btn btn-primary"><span class="fa fa-plus" hidden></span> Ubah</button>
											</div>

										</div>
									</div>
								</div>


							<div class="col-md-12">
								<div class="form-group table-responsive">
									<table class="table table-bordered">
										<thead>
											<tr>
												<th width="28%;" style="text-align: center;">Kabupaten</th>
												<th width="11%;" style="text-align: center;">Angkutan Darat</th>
												<th width="11%;" style="text-align: center;">Angkutan Laut</th>
												<th width="11%;" style="text-align: center;">Angkutan Udara</th>
												<th width="11%;" style="text-align: center;">TPA (KK)</th>
												<th width="11%;" style="text-align: center;">TPA (Jiwa)</th>
												<th width="11%;" style="text-align: center;">TPS (KK)</th>
												<th width="11%;" style="text-align: center;">TPS (Jiwa) (KK)</th>
												<th width="12%;" style="text-align: center;">Aksi</th>
											</tr>
										</thead>
										<tbody id="tb_body" style="text-align: center;">

										</tbody>
									</table>
								</div>
							</div>


							<div class="col-md-12">

								<div class="col-md-offset-2">

									<div class="form-group row">
										<div class="col-sm-3" style="text-align: right;" for="total">Total TPA & TPS</div>
										<div class="col-md-3">
											<input type="number" id="total_kk_realisasi" name="total_kk_realisasi" placeholder="(KK)" class="form-control col-md-7 col-xs-12" readonly>
										</div>
										<div class="col-md-3">
											<input type="number" id="total_jiwa_realisasi" name="total_jiwa_realisasi" placeholder="(Jiwa)" class="form-control col-md-7 col-xs-12" readonly>
										</div>
									</div>

									<div class="form-group row">
										<div class="col-sm-3" style="text-align: right;" for="total">Sisa SPP</div>
										<div class="col-md-6">
											<input type="number" id="sisa_spp" name="sisa_spp" placeholder="(KK)" class="form-control col-md-7 col-xs-12" readonly>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-sm-3" style="text-align: right;" for="kode_kabupaten_embarkasi">Embarkasi</label>
										<div class="col-md-6">
											<select id="kode_kabupaten_embarkasi" name="kode_kabupaten_embarkasi" class="form-control select2_single" multiple="multiple" style="width: 100%" disabled>
												@foreach($rskab as $result)
												<option value="{{$result->kode_kabupaten}}">{{@$result->display}}</option>
												@endforeach
											</select>  
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-sm-3" style="text-align: right;" for="kode_kabupaten_debarkasi">Debarkasi</label>
										<div class="col-md-6">
											<select id="kode_kabupaten_debarkasi" name="kode_kabupaten_debarkasi" class="form-control select2_single" multiple="multiple" style="width: 100%" disabled>
												@foreach($rskab as $result)
												<option value="{{$result->kode_kabupaten}}">{{@$result->display}}</option>
												@endforeach
											</select>  
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-sm-3" style="text-align: right;" for="sarana">Sarana</label>
										<div class="col-md-6">
											<textarea class="form-control" id="sarana" name="sarana" disabled />
										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-3" for="keterangan" style="text-align: right;">Keterangan</div>
										<div class="col-md-6">
											<textarea class="form-control" id="keterangan" name="keterangan" disabled />
										</div>
									</div>

								</div>
								
							</div>

						</form>

						<div class="box-footer">
							<div class="col-md-13">
								<div class="pull-right" style="margin-right: 5px;">
									<div id="1">
										<button id="btn_ubah" class="btn btn-primary" type="button"><i class="fa fa-edit"></i>&nbsp;Ubah Data</button>
									</div>
									<div id="2">
										<button id="btn_simpan" class="btn btn-primary" type="button" hidden><i class="fa fa-save"></i>&nbsp;Simpan Data</button>
										<button id="btn_hapus" name="_method" class="btn btn-danger" type="button" hidden><i class="fa fa-trash"></i>&nbsp;Hapus Data</button>
										<button id="btn_cancel" class="btn btn-warning" type="button" hidden><i class="fa fa-remove"></i>&nbsp;Batal</button>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>	
</section>

<script type="text/javascript">
	$(document).ready(function() {

		$('#kode_jp').val(generate_code('JWP'));
		$('#kode_sp').select2();
		$('#kode_provinsi_dasal').select2();
		$('#kode_kabupaten_dasal').select2();
		$('#kode_kabupaten_embarkasi').select2();
		$('#kode_kabupaten_debarkasi').select2();

		$('#btn_ubah').on('click', function(){
			$("button:hidden").removeAttr("hidden");
			$('input:disabled').removeAttr("disabled");
			$('select:disabled').removeAttr("disabled");
			$('textarea:disabled').removeAttr("disabled");
			$('[id^="btn_hapus_detail"]').removeAttr('disabled');
            $('[id^="btn_edit_detail"]').removeAttr('disabled');
			$('#btn_tambah_pemberangkatan').removeAttr('disabled');
			$('#btn_ubah').prop('hidden',true);
		});

		$('#btn_tambah_pemberangkatan').on('click', function() {
            clear_mdl()
			$('#mdl_title').text('Tambah Detail Realisasi Pemberangkatan')
			$('#btn_edit_pemberangkatan').prop('hidden', true)
			$('#btn_tambah_detail').removeAttr('hidden')
            $('#btn_tutup_tambah').removeAttr('hidden')
            $("#mdl_tambah_pemberangkatan").modal('show');

        });

		$('input[type="file"]').fileinput({
            'allowedFileExtensions' : ['pdf'],
            showUpload: false
        })

        $('#spp').on('keyup', function() {
        	if ($(this).val() != '') {
        		$('#file_spp').fileinput('enable')

        	}	else {
        		$('#file_spp').fileinput('disable')
        	}
        });

		$('.datepicker').datepicker({
			format: 'yyyy',
			viewMode : 'years',
			minViewMode : 'years',
			autoclose: true,
		});

		$('.datepicker2').datepicker({
			format: 'yyyy-mm-dd',
			autoclose: true
		});

		$('#kode_sp').on('change', function(){
			$.ajax({
				type    : "get",
				url     : "{{url('jp/pullData')}}",
				data    : {
					'_token'    : $('meta[name=csrf-token]').attr('content'),
					type 		: 'pullData',
					kode_sp    	: $('#kode_sp').val()
				},
				success: function(data) {
					$('#kode_tu').val(data.nama_tu);
					$('#kode_kabupaten').val(data.nama_kabupaten);
					$('#kode_provinsi').val(data.nama_provinsi);
				}
			});
		});

		$('#kode_provinsi_dasal').on('change', function(){
			$.ajax({
				type 	: "get",
				url 	: '{{url("jp/pullData")}}',
				data 	: {
					'_token' 		: $('meta[name=csrf-token]').attr('content'),
					type 			: 'pullData',
					kode_provinsi 	: $('#kode_provinsi_dasal').val()
				},
				success: function(data) {
					$('#kode_kabupaten_dasal').empty();
					$('#kode_kabupaten_dasal').append($('<option selected disabled/></option>').html('Pilih'));
					$.each(data, function(i, item) {
						$('#kode_kabupaten_dasal').append($('<option></option>').val(item.kode_kabupaten).html(item.display).data('nama_kabupaten', item.nama_kabupaten));          
					});
				}
			});
		});


	});

	function clear_mdl() {
		$('[fillable]').val('')
		$('#kode_kabupaten_dasal').val('Pilih').change()
	}
</script>

<script type="text/javascript">
	
	var kode_lama;
	var current_table_id = null;
	$(document).ready(function () {
		$(".bckimg").css('background-image','none');

		$.ajax({
			type    : "get",
			url     : "{{url('jp/pullData')}}",
			data    : {
				'_token'          	: $('meta[name=csrf-token]').attr('content'),
				'type'            	: 'pullData',
				'kode_jp'			: "{{Request::get('kode_jp')}}"
			},
			success: function(data) {
				$('#kode_jp').val(data.kode_jp);
				$('#tahun').val(data.tahun);
				$('#tgl_keberangkatan').val(data.tgl_keberangkatan);
				$('#tps_dasal').val(data.tps_dasal);
				$('#tpa_dasal').val(data.tpa_dasal);
				$('#total_kk_realisasi').val(data.total_kk_realisasi);
				$('#total_jiwa_realisasi').val(data.total_jiwa_realisasi);
				$('#sisa_spp').val(data.sisa_spp);
				$('#kode_sp').val(data.kode_sp).change();
				$('#kode_provinsi_dasal').val(data.kode_provinsi_dasal).change();
                $('#sarana').val(data.sarana);
                $('#keterangan').val(data.keterangan);

				kode_lama = $("#kode_jp").val();

				if (data.file_spp) {

                    $('#spp').val(data.spp)
                    $('#file_spp').fileinput('enable')
                    $('#btn_dl_file_spp').removeAttr('hidden')
                    $('#btn_dl_file_spp').click(function(){

                        window.open(data.file_spp);

                    })

                } else {

                	$('#btn_dl_file_spp').hide();

                }

				$.ajax({
					type    : "get",
					url     : "{{url('jp/pullData')}}",
					data    : {
						'_token'              : $('meta[name=csrf-token]').attr('content'),
						'type'                : 'pullData',
						'pemberangkatan_realisasi'  :  "{{Request::get('kode_jp')}}"
					},
					success: function(data) {
						$.each(data, function(i, value) {
							
							var row = "<tr id='"+(i+1)+"' data-id='"+value.id+"'>";
								row += "<td hidden><input id='kode_kabupaten_dasal_detail_"+(i+1)+"' class='form-control' style='text-align: left;' readonly type='text' value='"+value.kode_kabupaten+"' editable></td>"
								row += "<td><input id='kabupaten_dasal_detail_"+(i+1)+"' class='form-control' style='text-align: left;' readonly type='text' value='"+value.display+"'></td>"
								row += "<td><input id='angkutan_darat_detail' class='form-control' style='text-align: center;' readonly type='number' value='"+value.angkutan_darat+"' editable/></td>"
								row += "<td><input id='angkutan_laut_detail' class='form-control' style='text-align: center;' readonly type='number' value='"+value.angkutan_laut+"' editable/></td>"
								row += "<td><input id='angkutan_udara_detail' class='form-control' style='text-align: center;' readonly type='number' value='"+value.angkutan_udara+"' editable/></td>"
								row += "<td><input id='tpa_kk_realisasi_detail' class='form-control' style='text-align: center;' readonly type='number' value='"+value.tpa_kk_realisasi+"' editable name='sum_kk'/></td>"
								row += "<td><input id='tpa_jiwa_realisasi_detail' class='form-control' style='text-align: center;' readonly type='number' value='"+value.tpa_jiwa_realisasi+"' editable name='sum_jiwa'/></td>"
								row += "<td><input id='tps_kk_realisasi_detail' class='form-control' style='text-align: center;' readonly type='number' value='"+value.tps_kk_realisasi+"' editable name='sum_kk'/></td>"
								row += "<td><input id='tps_jiwa_realisasi_detail' class='form-control' style='text-align: center;' readonly type='number' value='"+value.tps_jiwa_realisasi+"' editable name='sum_jiwa'/></td>"
								row += "<td><button id='btn_hapus_detail' class='btn btn-danger btn-xs' type='button' disabled><i class='fa fa-trash'></i></button><button id='btn_edit_detail' class='btn btn-success btn-xs' type='button' disabled><i class='fa fa-pencil'></i></button></td>"
			
							$('#tb_body').append(row); 	

						});


					}
				});

				$.ajax({
					type    : "get",
					url     : "{{url('jp/pullData')}}",
					data    : {
						'_token'          	: $('meta[name=csrf-token]').attr('content'),
						'type'            	: 'pullData',
						'pemberangkatan_embarkasi'	: "{{Request::get('kode_jp')}}"
					},
					success: function(data) {

						$.each(data, function(i, item) {
							$("#kode_kabupaten_embarkasi").find("option[value='"+item.kode_kabupaten_embarkasi+"']").val(item.kode_kabupaten_embarkasi).html(item.display).prop("selected","selected").change();               
						});

					}	
				});

				$.ajax({
					type    : "get",
					url     : "{{url('jp/pullData')}}",
					data    : {
						'_token'          	: $('meta[name=csrf-token]').attr('content'),
						'type'            	: 'pullData',
						'pemberangkatan_debarkasi'	: "{{Request::get('kode_jp')}}"
					},
					success: function(data) {

						$.each(data, function(i, item) {
							$("#kode_kabupaten_debarkasi").find("option[value='"+item.kode_kabupaten_debarkasi+"']").val(item.kode_kabupaten_debarkasi).html(item.display).prop("selected","selected").change();
						});
					}	
				});
	

			}
		});

		$('#kode_sp').on('change', function(){
			$.ajax({
				type    : "get",
				url     : "{{url('jp/pullData')}}",
				data    : {
					'_token'    : $('meta[name=csrf-token]').attr('content'),
					type 		: 'pullData',
					kode_sp    	: $('#kode_sp').val()
				},
				success: function(data) {
					$('#kode_tu').val(data.nama_tu);
					$('#kode_kabupaten').val(data.nama_kabupaten);
					$('#kode_provinsi').val(data.nama_provinsi);
				}
			});
		});

		$("#tb_body").on('click','#btn_hapus_detail', function(e){
			$('#'+$(this).closest("tr").attr('id')).remove()
		})

		$("#tb_body").on('click','#btn_edit_detail', function(e){
			clear_mdl()
			current_table_id = $(this).closest("tr").attr('id')
			var a = []

			$('#'+$(this).closest("tr").attr('id')+' [editable]').each(function(){

				a.push($(this).val())

			})			

			$('[fillable]').each(function(index){

				if (index == 0) {
					$(this).val(a[index]).change()	
				}

				$(this).val(a[index])

			})

			$('#mdl_title').text('Ubah Detail Realisasi Pemberangkatan')
			$('#btn_tambah_detail').prop('hidden', true)
            $('#btn_tutup_tambah').prop('hidden', true)
			$('#btn_edit_pemberangkatan').removeAttr('hidden')
			$("#mdl_tambah_pemberangkatan").modal('show')

		})

		$('#btn_edit_pemberangkatan').click(function(){

			var a = []
			var kabupaten_detail

			$('[fillable]').each(function(index) {
				if (index == 0) {
					kabupaten_detail = $(this).find(':selected').text()
				}
				a.push($(this).val())
			})

			$('#'+current_table_id+' [editable]').each(function(index){
				
				if (index == 0) {
					$('#kabupaten_dasal_detail_'+current_table_id).val(kabupaten_detail)
				}

				$(this).val(a[index])

			})

			current_table_id = null
			$('#total_kk_realisasi').val(sum_kk())
			$('#total_jiwa_realisasi').val(sum_jiwa())
			$('#sisa_spp').val(sisa_spp())
		})

	});
</script>

<script type="text/javascript">

	var pemberangkatan = []
    var array_pemberangkatan = []
	$('#btn_tambah_detail').click(function(){        

		if ($('#kode_kabupaten_dasal')[0].selectedIndex <= 0) {
        	swal("Gagal", "Kabupaten Daerah Asal harus dipilih", "error");
        return;
    	}
		pemberangkatan = [] 
 
            $('[fillable]').each(function(){ 
 
                pemberangkatan.push($(this).val())
 
            })

			var row = "<tr id='"+($('tbody tr').length + 1)+"'>"
			row += "<td hidden><input id='kode_kabupaten_dasal_detail_"+($('tbody tr').length + 1)+"' class='form-control' style='text-align: left;' readonly type='text' value='"+pemberangkatan[0]+"' editable></td>"
			row += "<td><input id='kabupaten_dasal_detail_"+($('tbody tr').length + 1)+"' class='form-control' style='text-align: left;' readonly type='text' value='"+$('#kode_kabupaten_dasal').find(':selected').text()+"'></td>"
			row += "<td><input id='angkutan_darat_detail' class='form-control' style='text-align: center;' readonly type='number' value='"+pemberangkatan[1]+"' editable/></td>"
			row += "<td><input id='angkutan_laut_detail' class='form-control' style='text-align: center;' readonly type='number' value='"+pemberangkatan[2]+"' editable/></td>"
			row += "<td><input id='angkutan_udara_detail' class='form-control' style='text-align: center;' readonly type='number' value='"+pemberangkatan[3]+"' editable/></td>"
			row += "<td><input id='tpa_kk_realisasi_detail' class='form-control' style='text-align: center;' readonly type='number' value='"+pemberangkatan[4]+"' editable name='sum_kk'/></td>"
			row += "<td><input id='tpa_jiwa_realisasi_detail' class='form-control' style='text-align: center;' readonly type='number' value='"+pemberangkatan[5]+"' editable name='sum_jiwa'/></td>"
			row += "<td><input id='tps_kk_realisasi_detail' class='form-control' style='text-align: center;' readonly type='number' value='"+pemberangkatan[6]+"' editable name='sum_kk'/></td>"
			row += "<td><input id='tps_jiwa_realisasi_detail' class='form-control' style='text-align: center;' readonly type='number' value='"+pemberangkatan[7]+"' editable name='sum_jiwa'/></td>"
			row += "<td><button id='btn_hapus_detail' class='btn btn-danger btn-xs' type='button'><i class='fa fa-trash'></i></button><button id='btn_edit_detail' class='btn btn-success btn-xs' type='button'><i class='fa fa-pencil'></i></button></td>"


			$('#tb_body').append(row)
			clear_mdl()
			$('#kode_kabupaten_dasal option:selected').removeAttr("selected");
			$('#kode_kabupaten_dasal').val('Pilih').change()
			$('#total_kk_realisasi').val(sum_kk())
			$('#total_jiwa_realisasi').val(sum_jiwa())
			$('#sisa_spp').val(sisa_spp())
		
	})
	
</script>

<script type="text/javascript">
var sisa_spp, total_kk_realisasi = 0;

	function sum_kk() {
		var sum = 0
		$('input[name="sum_kk"]').each(function() {
			sum = sum + Number($(this).val())	
		})

		return sum
	}

	function sum_jiwa() {
		var sum = 0
		$('input[name="sum_jiwa"]').each(function() {
			sum = sum + Number($(this).val())	
		})

		return sum
	}

	function sisa_spp(){
		var sisa_spp, total_kk_realisasi = 0;
		
		var total_kk_realisasi 	= Number($('#total_kk_realisasi').val());
		var tpa_dasal 	= Number($('#tpa_dasal').val());

		sisa_spp 		= tpa_dasal - total_kk_realisasi;

		return sisa_spp

	}

	$('#tpa_dasal').on('blur', function() { 
		if ($(this).val != null || $(this).val != undefined) { 
			$('#total_kk_realisasi').val(sum_kk())
			$('#total_jiwa_realisasi').val(sum_jiwa())
			$('#sisa_spp').val(sisa_spp())
		} 
	}) 

</script>

<script type="text/javascript">
	$('#btn_cancel').click(function() {
		window.location.reload();
	});

	$("#btn_hapus").click(function(){
		swal({
			title: "Apakah anda yakin?",
			text: "Kode Pemberangkatan: "+kode_lama+' beserta dokumen terkait akan dihapus',
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#ef0f3e",
			confirmButtonText: "Hapus",
			cancelButtonText: "Batal",
			closeOnConfirm: false
		},
		function(){
			$.ajax({
				type: "post",
				url: '{{url("jp/pushData")}}',
				data: {
					'_token'            : $('meta[name=csrf-token]').attr('content'),
					type                : 'deleteData',
					kode_jp 		    :  kode_lama
				},
				success: function(data) {
					if(data.responses == 'OK'){
						swal({
							title: "Sukses",
							text: "Data telah dihapus",
							type: "success",
							timer: 3000,
							showConfirmButton: true
						},
						function(){
							window.location.href = "jp?menu=jp";
						});
					}
					else if(res.responses=='error'){
						swal("Kesalahan", "Permintaan tidak dapat diproses", "error");
					}
				}
			});
		});
	});
</script>

<script type="text/javascript">
	var kode_lama;
	var error = false;
	$(document).ready(function () {
	
		$("#btn_simpan").click(function(){
			var b = [];
			if ($('#tahun').val() == '') {
				swal( "Gagal", "Tahun harus dipilih", "error" );
				return false;
			} else if ($('#tgl_keberangkatan').val() == '') {
				swal( "Gagal", "Tanggal Keberangkatan harus dipilih", "error" );
				return false;
			} else if ($('#kode_sp')[0].selectedIndex <= 0) {
				swal( "Gagal", "Satuan Pemukiman harus dipilih", "error" );
				return false;
			} else if ($('#kode_provinsi_dasal')[0].selectedIndex <= 0) {
				swal( "Gagal", "Provinsi Daerah Asal harus dipilih", "error" );
				return false;
			} else if ($('#kode_kabupaten_embarkasi').val() == null ) {
            	swal( "Gagal", "Embarkasi harus dipilih", "error" );
           		return false;
           	} else if ($('#kode_kabupaten_debarkasi').val() == null ) {
            	swal( "Gagal", "Debarkasi harus dipilih", "error" );
           		return false;
           	} else if ($('#sarana').val() == '') {
				swal( "Gagal", "Sarana tidak boleh kosong", "error" );
				return false;
			}

			objembarkasi=[];
			$('#kode_kabupaten_embarkasi :selected').each(function(){
				var embarkasi = $(this).val();
				obj = {
					kode_jp : kode_jp,
					kode_kabupaten_embarkasi : embarkasi 
				};

				objembarkasi.push(obj);
			});

			objdebarkasi=[];
			$('#kode_kabupaten_debarkasi :selected').each(function(){
				var debarkasi = $(this).val();
				obj = {
					kode_jp : kode_jp,
					kode_kabupaten_debarkasi : debarkasi
				};
				objdebarkasi.push(obj);
			});
		

			$('tbody tr').each(function(){
				
				current_table_id = $(this).closest("tr").attr('id')
				var a = []

				$('#'+$(this).closest("tr").attr('id')+' [editable]').each(function(){

					a.push($(this).val())

				})

				b.push(a)
			})

	        var uploadfile = new FormData($("#form_pemberangkatan")[0]);
	        uploadfile.append('embarkasi', JSON.stringify(objembarkasi));
	        uploadfile.append('debarkasi', JSON.stringify(objdebarkasi));
	        uploadfile.append('array_pemberangkatan', JSON.stringify(b));
	        uploadfile.append('kode_lama', kode_lama);

			$.ajaxSetup({
			    headers: {
			    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			});

			$.ajax({
				type: "POST",
				url: '{{url("jp/pushData?type=updateData")}}',
				data: uploadfile,
					processData: false,
	        		contentType: false,
				success: function(data) {
					if(data.responses == 'OK'){
						swal({
							title: "Sukses",
							text: "Data telah disimpan",
							type: "success",
							timer: 3000,
							showConfirmButton: true
						},
						function(){
							window.location.href = "jp?menu=jp";
						});

					} if (data.responses == 'File error') {
						swal({
							type: "error",
							title: "Kesalahan",
							text: "Unggah berkas dokumen gagal dengan alasan: <br><br><pre>"+data.error_cause.join("")+"</pre><br> <i>** Pastikan berkas dokumen dalam format PDF dan ukuran file tidak melebihi 500KB  .</i>",
							html: true
						});

					} else if(data.responses == 'Duplicate'){
						swal("Kesalahan", "Kode Pemberangkatan sudah ada", "error");
					} else if(data.responses == 'error'){
						swal("Kesalahan", "Permintaan tidak dapat diproses", "error");
					}
				}
			});
		});
	});	

</script>
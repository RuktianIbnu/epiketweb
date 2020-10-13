<!-- Modal untuk ubah password -->
<div class="modal fade" id="modal_ubah_sandi" tabindex="-1" role="dialog" data-backdrop="false">
	<div class="modal-dialog" role="document">
		<div class="modal-content modal-col-default">
			<div class="modal-header bg-teal">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="tutup_modal">×</button>
				<h4 class="modal-title">Ubah Kata Sandi {{Auth::user()->nama}}</h4>
			</div>
			<div class="modal-body">
				<div class="body">
					<form>
						
						
						<div class="form-group form-float">
							<div class="form-line" id="div_sandi_lama">
								<input type="password" id="sandi_lama" name="sandi_lama" class="form-control"/>
								<label class="form-label" for="sandi_lama">Kata Sandi Lama</label>
							</div>
						</div>

						<div class="form-group form-float">
							<div class="form-line" id="div_sandi_baru">
								<input type="password" id="sandi_baru" name="sandi_baru" class="form-control"/>
								<label class="form-label" for="sandi_baru">Kata Sandi Baru</label>
							</div>
						</div>
						
						<div class="form-group form-float">
							<div class="form-line" id="div_sandi_ulang">
								<input type="password" id="sandi_ulang" name="sandi_ulang" class="form-control"/>
								<label class="form-label" for="sandi_ulang">Ulang Kata Sandi</label>
							</div>
						</div>

						<span class="help-block" id='pesan'></span>
					</form>
				</div>
			</div>
			<div class="modal-footer">
				<button id="btn_ubah_password" type="button" class="btn btn-lg btn-primary waves-effect">OK</button>
			</div>
		</div>
	</div>
</div>
<!-- End modal untuk ubah password-->

<script type="text/javascript">
	$('#tutup_modal').on('click', function(){
       	$('#sandi_lama').val("");
       	$('#sandi_baru').val("");
       	$('#sandi_ulang').val("");
       	$('#div_sandi_baru').removeClass('focused error')
	    $('#div_sandi_ulang').removeClass('focused error')
	    $('#pesan').html('')
    })
</script>

<script type="text/javascript">
  	$('#sandi_ulang').on('blur', function(){

	    if ($('#sandi_baru').val() == '' && $('#sandi_ulang').val() == '') {
	      	$('#div_sandi_baru').removeClass('focused error')
	      	$('#div_sandi_ulang').removeClass('focused error')
	      	$('#pesan').html('')
	    } else if ($('#sandi_baru').val() != $('#sandi_ulang').val()) {
	      	$('#div_sandi_ulang').addClass('focused error')
	      	$('#div_sandi_baru').addClass('focused error')
	      
	      	$('#pesan').html('Kata Sandi tidak cocok').css('color', 'red')
	    } else {
	      	$('#div_sandi_baru').removeClass('error')
	      	$('#div_sandi_ulang').removeClass('error')
	      	$('#pesan').html('Kata Sandi cocok').css('color', 'green')
	    }

  	})

  $("#btn_ubah_password").click(function(){
    
    if ($('#sandi_lama').val() == '') {
      	swal( "Kesalahan", "Kata Sandi Lama tidak boleh kosong", "error" )
      	return
    } else if ($('#sandi_baru').val() == '') {
      	swal( "Kesalahan", "Kata Sandi Baru tidak boleh kosong", "error" )
      	return
    } else if ($('#sandi_ulang').val() == '') {
      	swal( "Kesalahan", "Ulang Kata Sandi tidak boleh kosong", "error" )
      	return
    } else if ($('#sandi_baru').val() != $('#sandi_ulang').val()) {
      	swal( "Kesalahan", "Kata Sandi Baru dengan Ulang Kata Sandi tidak sama", "error" )
      	return
    }

    $.ajax({
      	type: "POST",
      	url: "{{url('api/v1/masterdata/petugas/changePassword')}}",
      	data: {
        	sandi_lama        :   $('#sandi_lama').val(),
        	sandi_baru        :   $('#sandi_baru').val(),
      	}
    }).done(function(data){

    	if(data.status == 'OK'){

    		swal({
    			title: "Sukses",
    			text: "Kata Sandi {{Auth::user()->nama}} berhasil diubah",
    			type: "success",
    			timer: 3000,
    			showConfirmButton: true
    		},
    		function(){
    			$('input[type="password"]').val('')
    			$('#pesan').html('')
    			$('#modal_ubah_sandi').modal('hide')
    		})

    	} else {
    		swal("Kesalahan", data.message, "error")
    	}

    })


  })

</script>
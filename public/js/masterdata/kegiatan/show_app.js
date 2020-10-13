$(function () {

	$('#btn_ubah').on('click', function(){
		$("#btn_hidden").attr("hidden","false").removeAttr("hidden")
		$("input:disabled").removeAttr("disabled")
		$('#hidden_ubah').prop('hidden', 'true')
	})
    
	$('#btn_simpan').click(function(){

        if ($('#jenis_kegiatan').val() == '') {
            swal( "Kesalahan", "Nama jenis kegiatan tidak boleh kosong", "error" )
            return
        } else if ($('#kode_jenis').val() == '') {
            swal( "Kesalahan", "Kode jenis tidak boleh kosong", "error" )
            return
        }

        var uploadfile = new FormData($("#form_pengguna")[0])
        uploadfile.append('id', id)
        
        $.ajax({
            type: "POST",
            url: url_api,
            data: uploadfile,
            processData: false,
            contentType: false,
            success: function(data) {
                if(data.status == 'OK'){
                    swal({
                        title: "Sukses",
                        text: "Data telah disimpan",
                        type: "success",
                        timer: 3000,
                        showConfirmButton: true
                    },
                    function(){
                        location.href = url_kegiatan
                    })
                } else if(data.status == 'Failed' && data.message == 'Duplicate') {
                    swal("Kesalahan", "Gagal update data", "error")
                }
            }
        })
    })

})
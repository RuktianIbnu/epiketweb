$(function () {

    var niplama = "{{$result->nip}}";

	$('#photo').fileinput({
        showUpload: false,
        allowedFileExtensions: ['jpg', 'png']
    })

    $('#btn_batal').click(function() {
            location.reload();
        });

	$('#btn_ubah').click(function(){

        $('#kode_subdirektorat').removeAttr('disabled')
        $('#kode_seksi').removeAttr('disabled')
        $('#level_pengguna').removeAttr('disabled')

		$("#btn_hidden").attr("hidden","false").removeAttr("hidden")
		$("input:disabled").removeAttr("disabled")
        $('#photo').fileinput('enable')
		$('#hidden_ubah').prop('hidden', 'true')
	})
    
	$('#btn_simpan').click(function(){

        if ($('#nama').val() == '') {
            swal( "Kesalahan", "Nama tidak boleh kosong", "error" )
            return
        } else if ($('#nip').val() == '') {
            swal( "Kesalahan", "NIP tidak boleh kosong", "error" )
            return
        } else if ($('#nip').val().length < 18) {
            swal( "Kesalahan", "Silahkan Masukkan NIP 18 Karakter", "error" )
            return
        } else if ($('#password').val() == '') {
            swal( "Kesalahan", "Password tidak boleh kosong", "error" )
            return
        } else if ($('#level_pengguna')[0].selectedIndex <= 0) {
            swal( "Kesalahan", "Silahkan pilih Level Pengguna terlebih dahulu", "error" )
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
                        location.href = url_petugas
                    })
                } else if(data.status == 'Failed' && data.message == 'Duplicate') {
                    swal("Kesalahan", "Petugas dengan NIP: " + $('#nip').val() + " telah ada", "error")
                }
            }
        })
    })

})
$(function () {

	var kode_tpilama = "{{$result->kode_tpi}}";

	$('#btn_ubah').on('click', function(){
		$("#btn_hidden").attr("hidden","false").removeAttr("hidden")
		$("input:disabled").removeAttr("disabled")
        $("textarea:disabled").removeAttr("disabled")
		$('#hidden_ubah').prop('hidden', 'true')
	})

    $('#btn_batal').click(function() {
        location.reload();
    });
    
	$('#btn_simpan').click(function(){

        if ($('#kode_kantor')[0].selectedIndex <= 0) {
            swal( "Kesalahan", "Silahkan pilih Kantor terlebih dahulu", "error" )
            return
        } else if ($('#kode_tpi').val() == '') {
            swal( "Kesalahan", "Kode TPI tidak boleh kosong", "error" )
            return
        }  else if ($('#nama_tpi').val() == '') {
            swal( "Kesalahan", "Nama TPI tidak boleh kosong", "error" )
            return
        } else if ($('#alamat_tpi').val() == '') {
            swal( "Kesalahan", "Alamat TPI tidak boleh kosong", "error" )
            return
        }

        var uploadfile = new FormData($("#form_tpi")[0])
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
                        location.href = url_tpi
                    })
                } else if(data.status == 'Failed' && data.message == 'Duplicate') {
                    swal("Kesalahan", "TPI dengan kode: " + $('#kode_tpi').val() + " telah ada", "error")
                }
            }
        })
    })

})
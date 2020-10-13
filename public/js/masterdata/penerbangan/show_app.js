$(function () {

	var kode_tpilama = "{{$result->kode_tpi}}";

	$('#btn_ubah').on('click', function(){
		$("#btn_hidden").attr("hidden","false").removeAttr("hidden")
		$("input:disabled").removeAttr("disabled")
        $("textarea:disabled").removeAttr("disabled")
		$('#hidden_ubah').prop('hidden', 'true')
        $("#rute2").attr("hidden","true")
        $("#rute").attr("hidden","false").removeAttr("hidden")
	})

    $('#rute_asal').on('keyup', function(){

        if ($(this).val() != '') {
            $('#rute_tujuan').removeAttr("disabled");
            $('#rute_penerbangan').val($('#rute_asal').val() + ' - ' + $('#rute_tujuan').val() ) 
        }

    })

    $('#rute_tujuan').on('keyup', function(){

        if ($(this).val() != '') {
            $('#rute_penerbangan').val($('#rute_asal').val() + ' - ' + $('#rute_tujuan').val() ) 
        }

    })

    $('#btn_batal').click(function() {
        location.reload();
    });
    
	$('#btn_simpan').click(function(){

        if ($('#kode_penerbangan').val() == '') {
            swal( "Kesalahan", "Kode Penerbangan tidak boleh kosong", "error" )
            return
        }  else if ($('#nama_penerbangan').val() == '') {
            swal( "Kesalahan", "Nama Penerbangan tidak boleh kosong", "error" )
            return
        }  else if ($('#rute_asal').val() == '') {
            swal( "Kesalahan", "Rute Penerbangan Asal tidak boleh kosong", "error" )
            return
        }  else if ($('#rute_tujuan').val() == '') {
            swal( "Kesalahan", "Rute Penerbangan Tujuan tidak boleh kosong", "error" )
            return
        }  else if ($('#rute_penerbangan').val() == '') {
            swal( "Kesalahan", "Rute Penerbangan tidak boleh kosong", "error" )
            return
        }  else if ($('#jenis_penerbangan')[0].selectedIndex <= 0) {
            swal( "Kesalahan", "Silahkan pilih Jenis Penerbangan terlebih dahulu", "error" )
            return
        }  else if ($('#kode_kantor')[0].selectedIndex <= 0) {
            swal( "Kesalahan", "Silahkan pilih Kantor terlebih dahulu", "error" )
            return
        } else if ($('#kode_tpi').val() == null) {
            swal( "Kesalahan", "TPI harus dipilih", "error" )
            return
        }

        objtpi=[];
        $('#kode_tpi :selected').each(function(){
            var tpi = $(this).val();
            obj = {
                kode_tpi : tpi 
            };

            objtpi.push(obj);
        });

        var uploadfile = new FormData($("#form_penerbangan")[0])
        uploadfile.append('tpi', JSON.stringify(objtpi))
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
                        location.href = url_penerbangan
                    })
                } else if(data.status == 'Failed' && data.message == 'Duplicate') {
                    swal("Kesalahan", "Penerbangan dengan kode: " + $('#kode_penerbangan').val() + " telah ada", "error")
                }
            }
        })
    })

})
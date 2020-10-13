$(function () {
    
    $('#btn_batal').click(function(){
        $('#kode_kantor').val('pilih').change()
        $('#kode_tpi').val('')
        $('#nama_tpi').val('')
        $('#alamat_tpi').val('')
    })

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
                        $('#kode_kantor').val('pilih').change()
                        $('#kode_tpi').val('')
                        $('#nama_tpi').val('')
                        $('#alamat_tpi').val('')
                    })
                } else if(data.status == 'Failed' && data.message == 'Duplicate') {
                    swal("Error", "TPI sudah ada", "error")
                }
            }
        })
    })

})

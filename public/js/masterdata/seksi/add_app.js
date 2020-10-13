$(function () {
    $('#btn_batal').click(function(){
        $('#nama_seksi').val('')
        $('#kode_seksi').val('')
    })

    $('#btn_simpan').click(function(){
        if ($('#nama_seksi').val() == '') {
            swal( "Kesalahan", "Nama tidak boleh kosong", "error" )
            return
        } else if ($('#kode_seksi').val() == '') {
            swal( "Kesalahan", "Kode tidak boleh kosong", "error" )
            return
        }
        var uploadfile = new FormData($("#form_pengguna")[0])
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
                        $('#kode_seksi').val('')
                        $('#nama_seksi').val('')
                    })
                } else if(data.status == 'Failed' && data.message == 'Duplicate') {
                    swal("Error", "Petugas sudah ada", "error")
                }
            }
        })
    })
})

function randomPassword() {
    return Math.random().toString(36).substr(2, 8)
}
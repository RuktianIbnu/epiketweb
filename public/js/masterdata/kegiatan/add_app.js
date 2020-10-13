$(function () {
    $('#btn_batal').click(function(){
        $('#kode_jenis').val('')
        $('#jenis_kegiatan').val('')
    })

    $('#btn_simpan').click(function(){
        if ($('#kode_jenis').val() == '') {
            swal( "Kesalahan", "Nama tidak boleh kosong", "error" )
            return
        } else if ($('#jenis_kegiatan').val() == '') {
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
                        $('#kode_jenis').val('')
                        $('#jenis_kegiatan').val('')
                    })
                } else if(data.status == 'Failed' && data.message == 'Duplicate') {
                    swal("Error", "kode kegiatan sudah ada", "error")
                }
            }
        })
    })
})

function randomPassword() {
    return Math.random().toString(36).substr(2, 8)
}
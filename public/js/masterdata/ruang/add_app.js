$(function () {
    $('#btn_batal').click(function(){
        $('#nama_ruang').val('')
        $('#deskripsi').val('')
    })

    $('#btn_simpan').click(function(){
        if ($('#nama_ruang').val() == '') {
            swal( "Kesalahan", "Nama tidak boleh kosong", "error" )
            return
        } else if ($('#deskripsi').val() == '') {
            swal( "Kesalahan", "deskripsi tidak boleh kosong", "error" )
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
                        $('#nama_ruang').val('')
                        $('#deskripsi').val('')
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
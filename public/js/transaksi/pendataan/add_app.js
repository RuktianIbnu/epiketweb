$(function () {


    /*$('#photo').fileinput({
        showUpload: false,
        allowedFileExtensions: ['jpg', 'png', 'docx', 'pdf', 'doc']
    })*/
    
    $('#btn_batal').click(function(){
        $('#nama').val('')
        $('#departement').val('')
        $('#jumlah').val('')
        $('input[type="file"]').fileinput('clear')
    })
    
    $('#btn_simpan').click(function(){
        if ($('#nama').val() == '') {
            swal( "Kesalahan", "Nama tidak boleh kosong", "error" )
            return
        } else if ($('#departement').val() == '') {
            swal( "Kesalahan", "Departement tidak boleh kosong", "error" )
            return
        } else if ($('#jumlah').val() < '') {
            swal( "Kesalahan", "Jumlah tidak boleh kosong", "error" )
            return
        } else if ($('#lokasi')[0].selectedIndex <= 0) {
            swal( "Kesalahan", "Silahkan pilih lokasi", "error" )
            return
        } else if ($('#ruang')[0].selectedIndex <= 0) {
            swal( "Kesalahan", "Silahkan pilih detail lokasi", "error" )
            return
        } else if ($('#kegiatan')[0].selectedIndex <= 0) {
            swal( "Kesalahan", "Silahkan pilih kegiatan", "error" )
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
                        $('#nama').val('')
                        $('#departement').val('')
                        $('#jumlah').val('')
                        $('#lokasi').val('pilih').change()
                        $('#tanggal').val('')
                        $('#waktu_mulai').val('')
                        $('#waktu_akhir').val('')
                        $('#kategori').val('pilih').change()
                        $('#deskripsi').val('')
                        $('#efek').val('')
                        $('#resiko').val('')
                        $('input[type="file"]').fileinput('clear')
                    })
                } else if(data.status == 'Failed' && data.message == 'Duplicate') {
                    swal("Error", "gagal", "error")
                }else if(data.status == 'Format tidak sesuai' && data.message == 'wrong'){
                    swal("Kesalahan", "Format tidak sesuai", "error")
                }
            }
        })
    })

})
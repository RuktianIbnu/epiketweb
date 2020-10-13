$(function () {


    /*$('#photo').fileinput({
        showUpload: false,
        allowedFileExtensions: ['jpg', 'png', 'docx', 'pdf', 'doc']
    })*/
    
    $('#btn_batal').click(function(){
        $('#petugas_2').val('pilih').change()
        $('#tanggal').val('')
        $('#waktu').val('')
        $('#suhu_ruangan').val('')
        $('#ac_backup_1').val('')
        $('#ac_backup_2').val('')
        $('#ups_redudancy').val('')
        $('#ups_load').val('pilih').change()
        $('#ups_runtime').val('')
        $('#ups_temp').val('')
        $('#ac_1').val('')
        $('#ac_2').val('')
        $('#ac_3').val('')
        $('input[type="file"]').fileinput('clear')
    })
    
    $('#btn_simpan').click(function(){
        alert('masuk')

        if ($('#petugas_2')[0].selectedIndex <= 0) {
            swal( "Kesalahan", "Partner piket tidak boleh kosong", "error" )
            return
        } else if ($('#tanggal').val() == '') {
            swal( "Kesalahan", "tanggal tidak boleh kosong", "error" )
            return
        } else if ($('#waktu').val() < '') {
            swal( "Kesalahan", "waktu tidak boleh kosong", "error" )
            return
        } else if ($('#suhu_ruangan').val() == '') {
            swal( "Kesalahan", "Tanggal tidak boleh kosong", "error" )
            return
        } else if ($('#ac_backup_1').val() == '') {
            swal( "Kesalahan", "AC backup 1 tidak boleh kosong", "error" )
            return
        } else if ($('#ac_backup_2').val() == '') {
            swal( "Kesalahan", "AC backup 2 tidak boleh kosong", "error" )
            return
        } else if ($('#ups_redudancy').val() == '') {
            swal( "Kesalahan", "ups redudancy mulai tidak boleh kosong", "error" )
            return
        }else if ($('#ups_load').val() == '') {
            swal( "Kesalahan", "ups load akhir tidak boleh kosong", "error" )
            return
        }else if ($('#ups_runtime').val() == '') {
            swal( "Kesalahan", "ups runtime tidak boleh kosong", "error" )
            return
        }else if ($('#ups_temp').val() == '') {
            swal( "Kesalahan", "ups temp tidak boleh kosong", "error" )
            return
        }else if ($('#ac_1').val() == '') {
            swal( "Kesalahan", "ac 1 tidak boleh kosong", "error" )
            return
        }else if ($('#ac_2').val() == '') {
            swal( "Kesalahan", "ac 2 tidak boleh kosong", "error" )
            return
        }else if ($('#ac_3').val() == '') {
            swal( "Kesalahan", "ac 3 tidak boleh kosong", "error" )
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
                        $('#petugas_2').val('pilih').change()
                        $('#tanggal').val('')
                        $('#waktu').val('')
                        $('#suhu_ruangan').val('')
                        $('#ac_backup_1').val('')
                        $('#ac_backup_2').val('')
                        $('#ups_redudancy').val('')
                        $('#ups_load').val('pilih').change()
                        $('#ups_runtime').val('')
                        $('#ups_temp').val('')
                        $('#ac_1').val('')
                        $('#ac_2').val('')
                        $('#ac_3').val('')
                        $('input[type="file"]').fileinput('clear')
                    })
                } else {
                    swal("Error", "gagal", "error")
                }
            }
        })
    })

})
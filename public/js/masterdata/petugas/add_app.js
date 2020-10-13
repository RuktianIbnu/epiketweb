$(function () {

    $('#password').val('12345678')
    $('#password').focus()

    $('#photo').fileinput({
        showUpload: false,
        allowedFileExtensions: ['jpg', 'png']
    })

    $('#level_pengguna').change(function() {
        var nip = $(this).data('id')
        if ($('#level_pengguna').val() == "2") {
            $('#kode_subdirektorat').attr( "disabled", true )
            $('#kode_seksi').attr( "disabled", true )

            $('#kode_seksi').val('pilih').change()
            $('#kode_subdirektorat').val('pilih').change()
        } else if ($('#level_pengguna').val() == "3") {       
            $('#kode_subdirektorat').attr( "disabled", false )
            $('#kode_seksi').attr( "disabled", true ) 
            
            $('#kode_seksi').val('')
        } else if ($('#level_pengguna').val() == "4") {       
            $('#kode_subdirektorat').attr( "disabled", false )
            $('#kode_seksi').attr( "disabled", false )
        } else {
            $('#kode_subdirektorat').attr( "disabled", false )
            $('#kode_seksi').attr( "disabled", false )
        }
    })
    
    $('#btn_batal').click(function(){
        $('#nama').val('')
        $('#nip').val('')
        $('#password').val(randomPassword())
        $('input[name=""]').prop('checked', false)
        $('#level_pengguna').val('pilih').change()
        $('input[type="file"]').fileinput('clear')
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
        else if ($('#from_admin').val() == '') {
            swal( "Kesalahan", "Salah", "error" )
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
                        $('#nip').val('')
                        $('#no_hp').val('')
                        $('#password').val(randomPassword())
                        $('input[name=""]').prop('checked', false)
                        $('#level_pengguna').val('pilih').change()
                        $('input[type="file"]').fileinput('clear')
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
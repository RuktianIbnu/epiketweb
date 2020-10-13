$(function () {
    
    $('#btn_batal').click(function(){
        $('#kode_penerbangan').val('')
        $('#nama_penerbangan').val('')
        $('#rute_asal').val('')
        $('#rute_tujuan').val('')
        $('#rute_penerbangan').val('')
        $('#jenis_penerbangan').val('pilih').change()
        $('#kode_kantor').val('pilih').change()
        $('#kode_tpi').val('pilih').change()
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
                        $('#kode_penerbangan').val('')
                        $('#nama_penerbangan').val('')
                        $('#rute_asal').val('')
                        $('#rute_tujuan').val('')
                        $('#rute_penerbangan').val('')
                        $('#jenis_penerbangan').val('pilih').change()
                        $('#kode_kantor').val('pilih').change()
                        $('#kode_tpi').val('pilih').change()
                    })
                } else if(data.status == 'Failed' && data.message == 'Duplicate') {
                    swal("Error", "Kode Penerbangan sudah ada", "error")
                }
            }
        })
    })

})

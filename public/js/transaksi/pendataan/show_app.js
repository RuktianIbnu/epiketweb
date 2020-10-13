$(function () {

	$('#photo').fileinput({
        /*showUpload: false,
        allowedFileExtensions: ['jpg', 'png']*/
    });

     $('#btn_batal').click(function() {
            location.reload();
        });

	$('#btn_ubah').on('click', function(){
		$("#btn_hidden").attr("hidden","false").removeAttr("hidden")
        $("#deskripsi").removeAttr("disabled")
        $("#efek").removeAttr("disabled")
        $("#resiko").removeAttr("disabled")
        var kat = ($('#kategori').val())
        $('#kategori').change(function() {
            if(kat == "lain-lain") {
                $('#lain_lain').prop( "disabled", false );
            } else {       
                $('#lain_lain').prop( "disabled", true );
                $('#lain_lain').val('');
            }
        })
        
        $('#photo').fileinput('enable')
		$('#hidden_ubah').prop('hidden', 'true')

        $("#deskripsi").removeAttr("disabled")
        $("#resiko").removeAttr("disabled")
        $("#efek").removeAttr("disabled")

        $("#hide_pemberitahuan").prop('hidden','true')
        $("#hide_perintah").prop("hidden","true")
        $("#hide_kegiatan").prop("hidden","true")

        $("#kegiatan").attr("hidden","false").removeAttr("hidden")
        $("#pemberitahuan").attr("hidden","false").removeAttr("hidden")
        $("#perintah").attr("hidden","false").removeAttr("hidden")
	})

    $('#btn_download_pemberitahuan').on('click', function(){
        var www = "../../../"+url_filepemberitahuan;
        var filepemberitahuan = url_filepemberitahuan; 
        if(filepemberitahuan == ''){
            alert('tidak ada file');
        }else{
            window.open(www, '_blank');
        }
    });

    $('#btn_download_perintah').on('click', function(){
        var www = "../../../"+url_perintah;
        var fileperintah = url_perintah;
        if(fileperintah == ''){
            alert('tidak ada file');
        }else{
            window.open(www, '_blank');
        }
    });

    $('#btn_download_kegiatan').on('click', function(){
        var www = "../../../"+url_kegiatan;
        var filekegiatan = url_kegiatan;
        if(filekegiatan == ''){
            alert('tidak ada file');
        }else{
            window.open(www, '_blank');
        }
    });

    $('#btn_print').click(function(){
        window.open('/transaksi/pendataan/cetak_pdf/'+id);
    });
    
	$('#btn_simpan').click(function(){

        if ($('#deskripsi').val() == '') {
            swal( "Kesalahan", "Deskripsi tidak boleh kosong", "error" )
            return
        }else if ($('#efek').val() == '') {
            swal( "Kesalahan", "Efek tidak boleh kosong", "error" )
            return
        }else if ($('#resiko').val() == '') {
            swal( "Kesalahan", "Resiko tidak boleh kosong", "error" )
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
                        location.href = url_pendataan
                    })
                } else if(data.status == 'Failed' && data.message == 'not_access') {
                    swal("Kesalahan", "Petugas dengan NIP yang sama saat input data yang boleh mengedit", "error")
                }else if(data.status == 'Format tidak sesuai' && data.message == 'wrong'){
                    swal("Kesalahan", "Format tidak sesuai", "error")
                }else if(data.status == 'kena di extends' && data.message == 'wrong'){
                    swal("Kesalahan", "kena di extends", "error")
                }
            }
        })
    })

})
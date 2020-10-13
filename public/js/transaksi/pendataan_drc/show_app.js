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
		$("input:disabled").removeAttr("disabled")
        $('#lokasi').selectpicker('destroy')
        $("#lokasi").removeAttr("disabled")

        $('#kategori').selectpicker('destroy')
        $("#kategori").removeAttr("disabled")
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
        window.open('/transaksi/PendataanDrcBali/cetak_pdf/'+id);
    });
    
	$('#btn_simpan').click(function(){

        if ($('#petugas_2')[0].selectedIndex <= 0) {
            swal( "Kesalahan", "Partner piket tidak boleh kosong", "error" )
            return
        } else if ($('#tanggal').val() == '') {
            swal( "Kesalahan", "tanggal tidak boleh kosong", "error" )
            return
        } else if ($('#waktu').val() == '') {
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
                        location.href = url_pendataan
                    })
                } else if(data.status == 'Failed' && data.message == 'not_access') {
                    swal("Kesalahan", "Petugas dengan NIP yang sama saat input data yang boleh mengedit", "error")
                }
            }
        })
    })

})
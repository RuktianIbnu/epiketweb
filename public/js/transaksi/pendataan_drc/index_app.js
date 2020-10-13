$(function () {

    $('#tb_user tbody').on('click', '#btn_hapus', function(){

        var id = $(this).closest('tr').attr('id')

        swal({
            title: "Apakah anda yakin?",
            text: "Data kegiatan akan dihapus?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#ef0f3e",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        },
        function(){
            $.ajax({
                type: "post",
                url: url_api + '/' + id,
                success: function(data) {
                    if(data.status == 'OK'){
                        swal({
                            title: "Sukses",
                            text: "Data telah dihapus",
                            type: "success",
                            timer: 3000,
                            showConfirmButton: true
                        },
                         function(){
                            location.href = url_pendataan
                        });
                    }
                    else if(data.status=='ERROR'){
                        swal("Kesalahan", "Permintaan tidak dapat diproses", "error");
                    }
                }
            });
        });
    })

})
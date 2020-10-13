$(function () {

    $('#tb_regis tbody').on('click', '#btn_acc', function(){
        var id = $(this).closest('tr').attr('id')
        var nama = $(this).data('nama')
        var nip = $(this).data('nip')
        swal({
            title: "Apakah anda yakin?",
            text: "Data register dengan nama " +nama+ " dan nip " +nip+ " akan diterima?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#ef0f3e",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        },
        function(){
            $.ajax({
                type: "post",
                url: url_api_acc + '/' + id,
                success: function(data){
                    if(data.status == 'OK'){
                        swal({
                            title: "Sukses",
                            text: "Pendaftar selesai diterima",
                            type: "success",
                            timer: 3000,
                            showConfirmButton: true
                        },
                         function(){
                            location.href = url_register
                        });
                    }
                    else if(data.status=='ERROR'){
                        swal("Kesalahan", "Permintaan tidak dapat diproses", "error");
                    }
                }
            });
        });
    })

    $('#tb_regis tbody').on('click', '#btn_hapus', function(){

        var id = $(this).closest('tr').attr('id')
        var nama = $(this).data('nama')
        var nip = $(this).data('nip')

        swal({
            title: "Apakah anda yakin?",
            text: "Data register dengan nama " +nama+ " dan nip " +nip+ " akan ditolak?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#ef0f3e",
            cancelButtonText: "Batal",
            closeOnConfirm: false
        },
        function(){
            $.ajax({
                type: "post",
                url: url_api_tolak + '/' + id,
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
                            location.href = url_register
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
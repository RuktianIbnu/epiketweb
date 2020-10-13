$(function () {

    $('#tb_penerbangan').DataTable({
        "language": {
            "emptyTable":     "Tidak ada data yang tersedia",
            "info":           "menampilkan _START_ hingga _END_ dari _TOTAL_ data",
            "infoEmpty":      "Menampilkan 0 hingga 0 dari 0 data",
            "infoFiltered":   "(tersaring dari _MAX_ total data)",
            "lengthMenu":     "Tampilkan _MENU_ data",
            "search":         "Pencarian:",
            "zeroRecords":    "Pencarian tidak ditemukan",
            "paginate": {
                "first":      "Awal",
                "last":       "Akhir",
                "next":       "Selanjutnya",
                "previous":   "Sebelumnya"
            },
        },
        "lengthMenu"  : [[10, 25, 50, -1], [10, 25, 50, "Semua"]],
    })

    $('#tb_penerbangan tbody').on('click', '#btn_hapus', function(){

        var id = $(this).closest('tr').attr('id')
        var kode_penerbangan = $(this).data('kodepenerbangan')

        swal({
            title: "Apakah anda yakin?",
            text: "Penerbangan dengan kode: "+kode_penerbangan+" akan dihapus?",
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
                            location.href = url_penerbangan
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
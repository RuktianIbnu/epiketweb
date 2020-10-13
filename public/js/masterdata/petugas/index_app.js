$(function () {

    $('#tb_user').DataTable({
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

    $('#tb_user tbody').on('click', '#btn_hapus', function(){

        var id = $(this).closest('tr').attr('id')
        var nip = $(this).data('nip')
        var text_status = $(this).closest('td').prev().text().trim() == 'AKTIF' ? 'dinonaktifkan' : 'diaktifkan' 
        var btn_status = $(this).closest('td').prev().text().trim() == 'AKTIF' ? 'Non-Aktifkan' : 'Aktifkan'
        var span_status = $(this).closest('td').prev().text().trim() == 'AKTIF' ? '<span class="badge bg-red">TIDAK AKTIF</span>' : '<span class="badge bg-green">AKTIF</span>'
        
        swal({
            title: "Apakah anda yakin?",
            text: "Pengguna dengan NIP: "+nip+" akan di hapus?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#ef0f3e",
            confirmButtonText: btn_status,
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
                            text:  "Pengguna dengan NIP: "+nip+" telah " + text_status,
                            type: "success",
                            timer: 3000,
                            showConfirmButton: true
                        },
                        function(){
                            $('#td_status_'+id).html(span_status)
                        })
                    }
                }
            })
        })
    })

})
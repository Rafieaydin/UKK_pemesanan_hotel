$(document).ready( function () {
    root = window.location.protocol + '//' + window.location.host;
    // var filter = $('#search').val();
    // console.log('filter');
    var table = $('#table1').DataTable({
        dom:
        "<'row'<'ol-sm-12 col-md-6 btn-table'><'col-sm-12 col-md-6  pdf-button'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        bLengthChange: false,
        ordering:false,
        info: true,
        filtering:false,
        searching: true,
        serverside: true,
        processing: true,
        serverSide: true,
        "responsive": true,
        "autoWidth": false,
        ajax:{
        url: root + "/api/admin/fasilitas_kamar/ajax/",
        type: "get",
        },
        columns:[
        { data: 'DT_RowIndex', name: 'DT_RowIndex'},
        // { data: 'jumlah_kamar', name:'jumlah_kamar'},
        { data: 'nama_fasilitas', name:'nama_fasilitas'},
        { data: 'icon_fasilitas', name:'icon_fasilitas'},
        { data: 'action',name:'action'}
        ],
    });
    var detailtable = $('#table2').DataTable({
        dom:
        "<'row'<'ol-sm-12 col-md-6 btn-back'><'col-sm-12 col-md-6  pdf-button'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        bLengthChange: false,
        ordering:false,
        info: true,
        filtering:false,
        searching: true,
    });
    $('.btn-table').append(
        '<a href="'+root+'/admin/fasilitas_kamar/create"class="btn btn-primary "> Tambah Data <i class="fas fa-plus"></i></button></a>' +
        '<a href="' + root + '/admin/pdf/fkamar"class="btn btn-danger ml-3"> Export PDF <i class="fas fa-file-pdf"></i></button></a>'+
        '<a href="' + root + '/admin/excel/fkamar"class="btn btn-success ml-3"> Export Excel <i class="fas fa-file-excel"></i></a>'
    );
    $('.btn-back').append(
        '<a href="'+root+'/admin/fasilitas_kamar"class="btn btn-primary "> <i class="fas fa-arrow-left"></i> kembali</i></button></a>'
    );

// search engine
$("#search").keyup(function () {
    table.search( this.value ).draw();
})

    // hapus data
$('body').on('click','#hapus', function () {
// sweet alert
    Swal.fire({
    title: 'Apa anda yakin?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Iya',
    cancelButtonText: 'Tidak'
    }).then((result) => {
        if (result.value) {
            id = $(this).data('id');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                    url: root+"/api/admin/fasilitas_kamar/delete/"+ id,
                    type: "DELETE",

                    data:'',
                    success: function (data) {
                        console.log(data);
                        table.draw();
                        Swal.fire(
                            'success',
                            'Data anda berhasil di hapus.',
                            'success'
                        )
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
            });
        } else if (result.dismiss === Swal.DismissReason.cancel) {}
    })
});
});

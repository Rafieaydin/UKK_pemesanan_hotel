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
        url: root + "/api/admin/tipe_kamar/ajax/",
        type: "get",
        },
        columns:[
        { data: 'DT_RowIndex', name: 'DT_RowIndex'},
        { data: 'nama_tipe', name:'nama_tipe'},
        { data: 'kapasitas_orang', name:'kapasitas_orang'},
        { data: 'harga', name:'harga'},
        { data: 'total_jumlah_kamar_tersedia', name:'total_jumlah_kamar_tersedia'},
        { data: 'total_jumlah_kamar_booking', name:'total_jumlah_kamar_booking'},
        { data: 'gambar', name:'gambar'},
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
    var detailtable = $('#table3').DataTable({
    });

    $('.btn-table').append(
        '<a href="'+root+'/admin/tipe_kamar/create"class="btn btn-primary "> Tambah Data <i class="fas fa-plus"></i></button></a>'+
        '<a href="' + root + '/admin/pdf/tipekamar"class="btn btn-danger ml-3"> Export PDF <i class="fas fa-file-pdf"></i></button></a>'+
        '<a href="' + root + '/admin/excel/tipekamar"class="btn btn-success ml-3"> Export Excel <i class="fas fa-file-excel"></i></a>'
    );
    $('.btn-back').append(
        '<a href="'+root+'/admin/tipe_kamar"class="btn btn-primary "><i class="fas fa-arrow-left"></i> kembali</button></a>'
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
                    url: root+"/api/admin/tipe_kamar/delete/"+ id,
                    type: "DELETE",
                    data:'',
                    success: function (data) {
                        console.log('halo');
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

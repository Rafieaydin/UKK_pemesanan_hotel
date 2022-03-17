$(document).ready(function () {
    root = window.location.protocol + '//' + window.location.host;
    // var filter = $('#search').val();
    // console.log('filter');

    $(document).on('change','.check-in',function () {
        table.draw();
    });

    $(document).on('change','.check-out',function () {
        table.draw();
    });

    function dates(date) {
        if (isNaN(date)) {
            return null;
        }
        var day = date.getDate();
        var month = date.getMonth() + 1;
        var year = date.getFullYear();
        return year + "-" + month + "-" + day;
    }


    var table = $('#table1').DataTable({
        dom: "<'row'<'ol-sm-12 col-md-8 btn-table'><'col-sm-12 mt-3 col-md-4  pdf-button'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        bLengthChange: false,
        ordering: false,
        info: true,
        filtering: false,
        searching: true,
        serverside: true,
        processing: true,
        serverSide: true,
        "responsive": true,
        "autoWidth": false,
        ajax: {
            url: root + "/admin/reservasilog/ajax/",
            type: "post",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: function (e) {
                e.check_in = dates(new Date($('.check-in').val()));
                e.check_out = dates(new Date($('.check-out').val()));
                return e;
            }
        },
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex'
            },
            {
                data: 'tipe',
                name: 'tipe'
            },
            {
                data: 'nama_pemesan',
                name: 'nama_pemesan'
            },
            {
                data: 'nama_tamu',
                name: 'nama_tamu'
            },
            {
                data: 'tanggal_checkin',
                name: 'tanggal_checkin'
            },
            {
                data: 'tanggal_checkout',
                name: 'tanggal_checkout'
            },
            {
                data: 'jumlah_kamar',
                name: 'jumlah_kamar'
            },
            {
                data: 'harga',
                name: 'harga'
            },
            {
                data: 'total_harga',
                name: 'total_harga'
            },
            {
                data: 'action',
                name: 'action'
            },
        ],
    });



    $('.btn-table').append(
        '<div class="row">' +
        '<div class="col-md-4">' +
        '<label for="" class="d-inline">Filter Check-in</label>' +
        '<input type="date" class="form-control form-control-sm check-in">' +
        '</div>' +
        '<div class="col-md-4">' +
        '<label for="" class="d-inline">Filter Check-out</label>' +
        '<input type="date" class="form-control form-control-sm check-out">' +
        '</div>' +
        '</div>'
    );

    // hapus data
    $('body').on('click', '#hapus', function () {
        // sweet alert
        Swal.fire({
            title: 'Apa anda yakin?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.value) {
                id = $(this).data('id');
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: root + "/admin/reservasilog/" + id,
                    type: "DELETE",
                    data: '',
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

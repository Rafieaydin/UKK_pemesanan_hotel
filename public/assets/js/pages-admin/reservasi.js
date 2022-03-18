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
                dom:"<'row'<'ol-sm-12 col-md-8 btn-table-add'>>" +
                    "<'row'<'ol-sm-12 col-md-8 btn-table'><'col-sm-12 mt-3 col-md-4  pdf-button'f>>" +
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
                    url: root + "/admin/reservasi/ajax/",
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
                        data: 'fasilitas',
                        name: 'fasilitas'
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
                    }
                ],
            });
            var detailtable = $('#table2').DataTable({
                dom:"<'row'<'ol-sm-12 col-md-8 btn-back'><'col-sm-12 col-md-4 mt-5 pdf-button'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                bLengthChange: false,
                ordering: false,
                info: true,
                filtering: false,
                searching: true,
            });

            $('.btn-back').append(
                '<a href="' + root + '/admin/reservasi"class="btn btn-primary "><i class="fas fa-arrow-left"></i> Kembali </button></a>'
            );
            
            $('.btn-table-add').append(
                '<div class="row">' +
                '<div class="col-md-6 mt-2">' +
                '<a href="' + root + '/admin/reservasi/create"class="btn btn-primary"> Tambah Data <i class="fas fa-plus"></i></button></a>'+
                '</div>' +
                '</div>'
            );

            $('.btn-table').append(
                '<div class="row">' +
                '<div class="col-md-6 mt-2">' +
                '<a href="' + root + '/admin/pdf/reservasi"class="btn btn-danger"> Export PDF <i class="fas fa-file-pdf"></i></button></a>'+
                '<a href="' + root + '/admin/excel/reservasi"class="btn btn-success ml-3"> Export Excel <i class="fas fa-file-excel"></i></button></a>'+
                '</div>' +
                '<div class="col-md-3">' +
                '<label for="" class="d-inline">Filter Check-in</label>' +
                '<input type="date" class="form-control form-control-sm check-in">' +
                '</div>' +
                '<div class="col-md-3">' +
                '<label for="" class="d-inline">Filter Check-out</label>' +
                '<input type="date" class="form-control form-control-sm check-out">' +
                '</div>' +
                '</div>'
            );

            // search engine
            $("#search").keyup(function () {
                table.search(this.value).draw();
            })

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
                            url: root + "/admin/reservasi/delete/" + id,
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

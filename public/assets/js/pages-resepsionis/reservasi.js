$(document).ready(function () {
            root = window.location.protocol + '//' + window.location.host;
            
            function dates(date) {
                if (isNaN(date)) {
                    return null;
                }
                var day = date.getDate();
                var month = date.getMonth() + 1;
                var year = date.getFullYear();
                return year + "-" + month + "-" + day;
            }

            $('#table1 thead tr .filterhead').each( function (i) {
                var title = $('#table1 thead tr .filterhead').eq( $(this).index() ).text();
                if(i == 7 || i == 0){
                    $(this).html( '<input type="text" disabled placeholder="'+title+'" data-index="'+i+'" />' );
                }else if(i == 5 || i == 6){
                    $(this).html( '<input type="date" placeholder="'+title+'" style="width:130px;" data-index="'+i+'" />' );
                }else{
                    $(this).html( '<input type="text" placeholder="'+title+'" data-index="'+i+'" />' );
                }
               
            } );

            var table = $('#table1').DataTable({
                dom:"<'row'<'ol-sm-12 col-md-8 btn-table'><'col-sm-12 mt-3 col-md-4  pdf-button'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                orderCellsTop: true,
                fixedHeader: true,
                bLengthChange: false,
                ordering: true,
                info: true, 
                filtering: false,
                searching: true,
                serverside: true,
                processing: true,
                serverSide: true,
                "responsive": true,
                "autoWidth": false,
                ajax: {
                    url: root + "/resepsionis/reservasi/ajax/",
                    type: "post",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: function (e) {
                        return e;
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'kode_booking',
                        name: 'kode_booking'
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
                    // {
                    //     data: 'status',
                    //     name: 'status'
                    // },
                    {
                        data: 'action',
                        name: 'action'
                    }
                ],
            });

            $( table.table().container() ).on( 'keyup', 'thead input', function () {
                table
                    .column( $(this).data('index') )
                    .search( this.value )
                    .draw();
            } );
            $( table.table().container() ).on( 'change', 'thead input', function () {
                ;
                var date = new Date(this.value);
                var day =  date.getDate();
                var month = ((date.getMonth() + 1) >= 10) ? date.getMonth() + 1  : '0' + date.getMonth() + 1 ;
                var year = date.getFullYear();
                var fd = day + "-" + (((date.getMonth() + 1) >= 10) ? date.getMonth() + 1  : '0' + (date.getMonth() + 1)) + "-" + year;
                console.log(fd);
                table
                    .column( $(this).data('index') )
                    .search( fd )
                    .draw();
            } );
            var detailtable = $('#table2').DataTable({
                dom: "<'row'<'ol-sm-12 col-md-6 btn-back'><'col-sm-12 col-md-6  pdf-button'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                bLengthChange: false,
                ordering: false,
                info: true,
                filtering: false,
                searching: true,
            });

            $('.btn-back').append(
                '<a href="' + root + '/resepsionis/reservasi"class="btn btn-primary "><i class="fas fa-arrow-left"></i> Kembali </button></a>'
            );

            $('.btn-table').append(

                '<div class="row">' +
                '<div class="col-md-6 mt-2">' +
                '<a href="' + root + '/resepsionis/pdf/reservasi"class="btn btn-danger"> Export PDF <i class="fas fa-file-pdf"></i></button></a>'+
                '<a href="' + root + '/resepsionis/excel/reservasi"class="btn btn-success ml-3"> Export Excel <i class="fas fa-file-excel"></i></button></a>'+
                '</div>' +
                // '<div class="col-md-3">' +
                // '<label for="" class="d-inline">Filter Check-in</label>' +
                // '<input type="date" class="form-control form-control-sm check-in">' +
                // '</div>' +
                // '<div class="col-md-3">' +
                // '<label for="" class="d-inline">Filter Check-out</label>' +
                // '<input type="date" class="form-control form-control-sm check-out">' +
                // '</div>' +
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
                    confirmButtonText: 'Iya',
                    cancelButtonText: 'Tidak'
                }).then((result) => {
                    if (result.value) {
                        id = $(this).data('id');
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: root + "/resepsionis/reservasi/delete/" + id,
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

  

              // detail 2 table
              var detailtable = $('#table3').DataTable({
                searching: true,
                serverside: true,
                processing: true,
                serverSide: true,
                "responsive": true,
                "autoWidth": false,
                ajax: {
                    url: root + "/resepsionis/reservasi/ajax/detailresevasi?reservasi_id=" + $('#reservasi_id').val(),
                    type: "get",
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'tipe_kamar',
                        name: 'tipe_kamar'
                    },
                    {
                        data: 'kode_kamar',
                        name: 'kode_kamar'
                    },
                    {
                        data: 'harga',
                        name: 'harga'
                    },
                    {
                        data: 'checkin',
                        name: 'checkin'
                    },
                    {
                        data: 'checkout',
                        name: 'checkout'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },
                ],
            });

              // checkout
              $('body').on('click', '#button-action', function () {
                // sweet alert
                Swal.fire({
                    title: 'Apa anda yakin untuk checkout?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yakin?',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.value) {
                        id = $(this).data('id');
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: root + "/resepsionis/reservasi/" +  $(this).data('id') + "/status",
                            type: "patch",
                            data: {
                                status: $(this).data('status'),
                                reservasi_id: $(this).data('id'),
                            },
                            success: function (data) {
                                detailtable.draw();
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


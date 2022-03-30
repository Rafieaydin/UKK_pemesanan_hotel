function formatRupiah(angka, prefix ){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    rupiah     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    if(ribuan){
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return rupiah ? 'Rp. ' + rupiah : '';
}


function validation($name, $id, $error = null){
    if($error && $($id).val()){
        console.log(true);
        $($id).addClass('is-invalid');
        $($id).closest('.col-md-6').find('.invalid-feedback').empty();
        $($id).closest('.col-md-6').append(
            '<div class="invalid-feedback">'+
                $error +
            '</div>'
        );
    }else if(!$($id).val()){
        $($id).addClass('is-invalid');
        $($id).closest('.col-md-6').find('.invalid-feedback').empty();
        $($id).closest('.col-md-6').append(
            '<div class="invalid-feedback">'+
                $name + ' tidak boleh kosong'+
            '</div>'
        );
        // console.log(true);
        return 1;
    }else{
        $($id).removeClass('is-invalid');
        return 0;
    }
}




// section data diri
$('#data-button').click(function () {
    var nama_pemesan = validation('Nama Pemesan','#nama_pemesan');
    var nama_tamu = validation('Nama Tamu','#nama_tamu') ;
    var email_pemesanan = validation('Email Pemesan','#email_pemesan');
    var no_hp = validation('Nomor Hp','#nomor_hp_pemesan');

    if(nama_pemesan == 0 &&
    nama_tamu == 0 &&
    email_pemesanan == 0 &&
    no_hp == 0){
        $('.seaction-reservasi').removeClass('d-none');
        $('.seaction-diri').addClass('d-none');
    }
});

$('#backs-button').click(function () {
    $('.seaction-diri').removeClass('d-none');
    $('.seaction-reservasi').addClass('d-none');
});

$('#tipe_id').change(function(e){
    axios.get('api/tipe/harga/' + $(this).val()).then(response=>{
        $('#harga').val(formatRupiah(response.data.tipe.harga));
        $('#kamar_tersedia').val(response.data.tipe.total_jumlah_kamar_tersedia);
        $('#kamar_terisi').val(response.data.tipe.total_jumlah_kamar_booking);
        $('#kapasitas_orang').val(response.data.tipe.kapasitas_orang);
        $('.fasilitas').empty();
        response.data.tipe.fasilitas.forEach(e => {
            $('.fasilitas').append('<div class="col-md-3">'+
            '<ul style="list-style-type: none;">'+
                '<li ><i class="'+e.icon_fasilitas+'"></i> '+e.nama_fasilitas+'</li>'+
            '</ul>'+
            '</div>')
        });

    }).catch(err =>{

    });
});

$('#back-button').click(function () {
    $('.seaction-reservasi').removeClass('d-none');
    $('.section-booking').addClass('d-none');
});

$('#reservasi-button').click(function () {
    var tipe_id = validation('Tipe','#tipe_id');
    var tanggal_checkin = validation('Tanggal Checkiin','#tanggal_checkin');
    var tanggal_checkout = validation('Tanggal checkout','#tanggal_checkout');

    if(tipe_id == 0 &&
    tanggal_checkin == 0 &&
    tanggal_checkout == 0 ){
        $('.seaction-reservasi').addClass('d-none');
        $('.section-booking').removeClass('d-none');
    }

    // booking
    var tipe_id = $('#tipe_id :selected').val();
    // get data booking
    axios.post('/api/admin/kamar/', {tipe_id:tipe_id,reservasi_id:'0'},{
        "X-Requested-With": "XMLHttpRequest",
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }).then(response => {
        console.log(response);
        $('.booking-space').find('.kode_kamar').remove();
        response.data.kamar.forEach(e => {
            if (e.status == 1) {
                $('.booking-space').append(
                    // '<div class="swiper-slide">' +
                    // '<div class="row swiper-slide">' +
                    // '<div class="col-md-2">' +
                    '<div class="mb-2 text-center text-white d-inline-block me-2 mb-3 kode_kamar book-active" data-id="' + e.id + '" >' +
                    e.kode_kamar +
                    '</div>'
                    // '</div>'
                    // '</div>'
                    // '</div>'
                )
            } else {
                $('.booking-space').append(
                    // '<div class="swiper-slide">' +
                    // '<div class="row swiper-slide">' +
                    // '<div class="col-md-2">' +
                    '<div class="mb-2 text-center text-white d-inline-block me-2 mb-3 kode_kamar green-active" data-id="' + e.id + '" >' +
                    e.kode_kamar +
                    '</div>'
                    // '</div>'
                    // '</div>'
                    // '</div>'
                )
            }

        });
    }).catch(error => {
        console.log(error);
    });

    // active class booking kamar
    $(document).on('click', '.kode_kamar', function () {
        if (!$(this).hasClass('book-active')) {
            if ($(this).hasClass('green-active')) {
                $(this).removeClass('green-active');
                $(this).addClass('red-active');
            } else {
                $(this).removeClass('red-active');
                $(this).addClass('green-active');
            }
        }
    });

    //post data booking
    $('#booking-button').click(function () {
        // var form = $('.form-reservasi').serialize();
        var form = $('#form-reservasi')[0]; //htmlformelement
        console.log(form);
        var kode_kamars = [];
        var kode_kamar = $('.red-active');
        for (i = 0; i < kode_kamar.length; i++) {
            kode_kamars.push(kode_kamar[i].dataset.id);
        }
        console.log(kode_kamars.length);
        if (kode_kamars.length == 0) {
            $('.alert-booking').removeClass('d-none');
            $('.alert-booking').html('Silahkan pilih nomor kamar yang ingin di reservasi');
        }else{
            var formdata = new FormData(form)
            formdata.append('kode_kamar', JSON.stringify(kode_kamars))
            console.log(formdata);
            axios.post('/api/admin/booking', formdata, {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }).then(response => {
                window.location.href = '/resevarsi/detail/' + response.data.reservasi.uuid +'?berhasil=true';
            }).catch(res => {
                $('.seaction-reservasi').removeClass('d-none');
                $('.section-booking').addClass('d-none');
                    $.each(res.response.data.errors, function (key,value) {
                        console.log(key,value);
                        validation(key, '#'+key,value);
                    })
            })

        }
    })

});








// section
$('#back-button').click(function () {
    $('.seaction-reservasi').removeClass('d-none');
    $('.section-booking').addClass('d-none');
});

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
        console.log(true);
        return 1;
    }else{
        $($id).removeClass('is-invalid');
        return 0;
    }
}

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



$('#reservasi-button').click(function () {
    var tipe_id = validation('tipe_id','#tipe_id');
    var nama_pemesan = validation('nama_pemesan','#nama_pemesan');
    var tanggal_checkin = validation('tanggal_checkin','#tanggal_checkin');
    var tanggal_checkout = validation('tanggal_checkout','#tanggal_checkout');
    var nama_tamu = validation('nama_tamu','#nama_tamu') ;
    var email_pemesanan = validation('email_pemesan','#email_pemesan');
    var no_hp = validation('nomor_hp_pemesan','#nomor_hp_pemesan');

    if(tipe_id == 0 &&
    nama_pemesan == 0 &&
    tanggal_checkin == 0 &&
    tanggal_checkout == 0 &&
    nama_tamu == 0 &&
    email_pemesanan == 0 &&
    no_hp == 0){
        $('.seaction-reservasi').addClass('d-none');
        $('.section-booking').removeClass('d-none');
    }

    // booking
    var tipe_id = $('#tipe_id :selected').val();
    // get data booking
    axios.get('/api/admin/kamar/'+tipe_id, {
        "X-Requested-With": "XMLHttpRequest"
    }).then(response => {
        $('.booking-space').find('.kode_kamar').remove();
        response.data.forEach(e => {
            if (e.status == 1) {
                $('.booking-space').prepend(
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
                $('.booking-space').prepend(
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
    //post data booking
    $('#booking-button').click(function () {
        // var form = $('.form-reservasi').serialize();
        var form = $('#form-reservasi')[0]; //htmlformelement
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
                window.location.href = '/resevarsi/detail/' + response.data.reservasi.uuid;
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








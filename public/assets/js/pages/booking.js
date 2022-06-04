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


function validation($name, $id, $error = null) {
    if ($error && $($id).val()) {
        console.log(true);
        $($id).addClass('is-invalid');
        $($id).closest('.col-md-6').find('.invalid-feedback').empty();
        $($id).closest('.col-md-6').append(
            '<div class="invalid-feedback">' +
            $error +
            '</div>'
        );
    } else if (!$($id).val()) {
        $($id).addClass('is-invalid');
        $($id).closest('.col-md-6').find('.invalid-feedback').empty();
        $($id).closest('.col-md-6').append(
            '<div class="invalid-feedback">' +
            $name + ' tidak boleh kosong' +
            '</div>'
        );
        // console.log(true);
        return 1;
    } else if ($name == "Nomor Hp") {
        if ($($id).val().toString().length == 0) {
            $error = "No HP tidak boleh kosong";
        } else if ($($id).val().toString().length < 10) {
            $error = "No HP minimal 10 digit";
        }
        if ($error) {
            $($id).addClass('is-invalid');
            $($id).closest('.col-md-6').find('.invalid-feedback').empty();
            $($id).closest('.col-md-6').append(
                '<div class="invalid-feedback">' +
                $error +
                '</div>'
            );
        } else {
            $($id).removeClass('is-invalid')
            return 0;
        }
    } else if ($name == "Email Pemesan") {
        var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        console.log(Array.isArray($($id).val().match(validRegex)));
        if (Array.isArray($($id).val().match(validRegex))) {
            $($id).removeClass('is-invalid')
            return 0;
        } else {
            $($id).addClass('is-invalid');
            $($id).closest('.col-md-6').find('.invalid-feedback').empty();
            $($id).closest('.col-md-6').append(
                '<div class="invalid-feedback">' +
                'Silahkan Masukan Format Email yang benar' +
                '</div>'
            );
        }
    } else if ($id == "#tanggal_checkin") {
        var checkin = $($id).val();
        var t_checkin = new Date(checkin);
        var t_now = new Date();
        var t_now_iso = t_now.toISOString().slice(0, 10);

        if (t_checkin.getTime() < t_now.getTime() && checkin !== t_now_iso) {
            var erorr = "tanggal checkin tidak boleh kurang hari ini"
            $($id).addClass('is-invalid');
            $($id).closest('.col-md-6').find('.invalid-feedback').empty();
            $($id).closest('.col-md-6').append(
                '<div class="invalid-feedback">' +
                erorr +
                '</div>'
            );
            return 1;
        } else {
            $($id).removeClass('is-invalid');
            return 0;
        }
    } else if($id == "#tanggal_checkout"){
        var checkin = $('#tanggal_checkin').val();
        var checkout = $($id).val();
        var t_checkin = new Date(checkin);
        var t_checkout = new Date(checkout);
        if (t_checkout <= t_checkin) {
            var erorr = "Tanggal checkout harus lebih dari tanggal checkin"
            $($id).addClass('is-invalid');
            $($id).closest('.col-md-6').find('.invalid-feedback').empty();
            $($id).closest('.col-md-6').append(
                '<div class="invalid-feedback">' +
                erorr +
                '</div>'
            );
            return 1;
        } else {
            $($id).removeClass('is-invalid');
            return 0;
        }
    } else {
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

var tipekamar = [];
$('#tipe_id').change(function(e){
    axios.get('api/tipe/harga/' + $(this).val()).then(response=>{
        tipekamar.splice(0, tipekamar.length);
        tipekamar.push(response.data.tipe);
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
        console.log(tipekamar);
    }).catch(err =>{

    });
});




function days_between(date1, date2) {
    console.log(date1,date2);
    // The number of milliseconds in one day
    const ONE_DAY = 1000 * 60 * 60 * 24;

    // Calculate the difference in milliseconds
    const differenceMs = Math.abs(date1 - date2);

    // Convert back to days and return
    return Math.round(differenceMs / ONE_DAY);

}



$('#reservasi-button').click(function () {
    var tipe_id = validation('Tipe','#tipe_id');
    var tanggal_checkin = validation('Tanggal Checkiin','#tanggal_checkin');
    var tanggal_checkout = validation('Tanggal checkout','#tanggal_checkout');  
    var checkin = new Date($('#tanggal_checkin').val());
    var checkout = new Date($('#tanggal_checkout').val());
    $('#harga_malam').html(formatRupiah(tipekamar[0].harga));
    $('#jumlah_malam').html(days_between(checkin,checkout) + ' malam');

    if(tipe_id == 0 &&
    tanggal_checkin == 0 &&
    tanggal_checkout == 0 ){
        $('.seaction-reservasi').addClass('d-none');
        $('.section-booking').removeClass('d-none');
    }
    var total_harga = $('#harga').val();
    
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
});

var counting = [];
// active class booking kamar
$(document).on('click', '.kode_kamar', function () {
    if (!$(this).hasClass('book-active')) {
        if ($(this).hasClass('green-active')) {
            counting.push(parseInt(tipekamar[0].harga));
            $(this).removeClass('green-active');
            $(this).addClass('red-active');
        } else {
            counting.pop();
            $(this).removeClass('red-active');
            $(this).addClass('green-active');
        }
    }
    var total = counting.reduce((a, b) => a + b, 0);
    // $('#total_harga').html('');  
    var checkin = new Date($('#tanggal_checkin').val());
    var checkout = new Date($('#tanggal_checkout').val());
    var total_harga = total * days_between(checkin,checkout);
    $('#total_harga').html(formatRupiah(total_harga.toString()));  
});


$('#back-button').click(function () {
    counting.splice(0, counting.length);
    $('.seaction-reservasi').removeClass('d-none');
    $('.section-booking').addClass('d-none');
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








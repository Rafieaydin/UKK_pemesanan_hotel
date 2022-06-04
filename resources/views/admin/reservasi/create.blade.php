@extends('template.master')
@push('link')
<link rel="stylesheet" href="{{ asset('template/') }}/node_modules/select2/dist/css/select2.min.css">
<style>
    .card-body .input i {
        width: 50px;
        font-size: medium;
        padding-top: 11px;
    }

    .invalid-feedback {
        display: block;
    }

    h5 {
        color: rgb(82, 82, 255);
    }
    .book-active{
        background-color: red;
        border-radius:5px;
        padding: 5px;
    }
    .display-book-active{
        background-color: red;
        border-radius:5px;
        padding: 2px;
        width: 60px;
        color:red;
    }
    .red-active{
        background-color: orange;
        border-radius:5px;
        padding: 5px;
    }
    .display-red-active{
        background-color: orange;
        border-radius:5px;
        padding: 2px;
        width: 60px;
        color:orange;
    }
    .green-active{
        background-color: green;
        border-radius:5px;
        padding: 5px;
    }
    .display-green-active{
        background-color: green;
        border-radius:5px;
        padding: 2px;
        width: 60px;
        color:green;
    }
    .booking-header{
        color: #30336b;
        text-transform: uppercase;
        font-weight: 900;
    }
</style>


@endpush
@section('judul','Tambah Data Reservasi')
@section('breadcrump')
<div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i>
        DASBOARD</a></div>
<div class="breadcrumb-item"><i class="fas fa-bed"></i>> DATA RESERVASI</div>
@endsection
@section('content')
<div class="card">

  <div class="card-body seaction-reservasi" class="mt-5">
        <form action="{{ route('resepsionis.reservasi.store') }}" method="POST" enctype="multipart/form-data" id="form-reservasi">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <label for="">Tipe Kamar</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-bed"></i></div>
                        </div>

                        <select name="tipe_id" value="{{ old('tipe_id') }}" class="mb-2 form-control @error('tipe_id')
                                is-invalid
                            @enderror" id="tipe_id">
                            @foreach ($tipe as $value)
                            <option value="{{ $value->id }}" @if (old('tipe_id') == $value->id)
                                selected
                            @endif @if($value->total_jumlah_kamar_tersedia <= 0) disabled
                            @endif>
                            {{ ($value->total_jumlah_kamar_tersedia <= 0) ? $value->nama_tipe.' | Kosong' : $value->nama_tipe }}
                            @endforeach
                        </select>
                        @error('tipe_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="">Harga / malaem</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-user"></i></div>
                        </div>
                        <input type="text" disabled  id="harga" name="harga" value="{{ old('harga') }}" class="mb-2 form-control @error('harga')
                            is-invalid
                        @enderror" id="harga" placeholder="">
                        @error('nama_pemesan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="" class="label-input">jumlah Kamar tersedia</label>
                    <input type="input" class="form-control mb-2 @error('kamar_tersedia')
                    is-invalid
                @enderror" name="kamar_tersedia" placeholder="" @disabled(true) id="kamar_tersedia">
                    @error('kamar_tersedia')
                    <div class="invalid-feedback mb-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="" class="label-input">Jumlah Kamar Terisi</label>
                    <input type="input" class="form-control mb-2 @error('kamar_terisi')
                    is-invalid
                @enderror" name="kamar_terisi" placeholder="" @disabled(true) id="kamar_terisi">
                    @error('kamar_terisi')
                    <div class="invalid-feedback mb-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="">Nama pemesan</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-user"></i></div>
                        </div>
                        <input type="text" name="nama_pemesan" value="{{ old('nama_pemesan') }}" class="form-control @error('nama_pemesan')
                            is-invalid
                        @enderror" id="nama_pemesan" placeholder="Nama Pemesan">
                        @error('nama_pemesan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="">Nama Tamu</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-user"></i></div>
                        </div>
                        <input type="text" name="nama_tamu" value="{{ old('nama_tamu') }}" class="form-control @error('nama_tamu')
                            is-invalid
                        @enderror" id="nama_tamu" placeholder="Nama Pemesan">
                        @error('nama_tamu')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="">Email pemesan</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-envelope"></i></div>
                        </div>
                        <input type="email" name="email_pemesan" value="{{ old('email_pemesan') }}" class="form-control @error('email_pemesan')
                            is-invalid
                        @enderror" id="email_pemesan" placeholder="Email Pemesan">
                        @error('email_pemesan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="">No hp pemesan</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-phone"></i></div>
                        </div>
                        <input type="number" name="nomor_hp_pemesan" value="{{ old('nomor_hp_pemesan') }}" class="form-control @error('nomor_hp_pemesan')
                            is-invalid
                        @enderror" id="nomor_hp_pemesan" placeholder="No Hp pemesan">
                        @error('nomor_hp_pemesan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="">Tanggal Check-in</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-hotel"></i></div>
                        </div>
                        <input type="date" name="tanggal_checkin" value="{{ old('tanggal_checkin') }}" class="form-control @error('tanggal_checkin')
                            is-invalid
                        @enderror" id="tanggal_checkin" placeholder="No Hp pemesan">
                        @error('tanggal_checkin')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="">Tanggal Check-out</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-hotel"></i></div>
                        </div>
                        <input type="date" name="tanggal_checkout" value="{{ old('tanggal_checkout') }}" class="form-control @error('tanggal_checkout')
                            is-invalid
                        @enderror" id="tanggal_checkout" placeholder="No Hp pemesan">
                        @error('tanggal_checkout')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>



            </div>
            <div class="row">
                <a href="{{ route('admin.reservasi.index') }}" class="btn btn-danger mt-2 mb-3 ml-auto mr-2 mt-3 " type="submit">Kembali</a>
                <button type="button" class="btn btn-success mt-2 mb-3 mr-3 mt-3 "id="next-button">Selanjutnya</button>
            </div>
        </form>
    </div>
    <div class="card-body section-booking d-none" class="mt-5">
        <form action="{{ route('resepsionis.reservasi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <h1 class="booking-header">Pilih kamar tersedia</h1>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-2 text-center  display-green-active d-inline" >
                        Tersedia
                    </div>
                    <div class="d-inline ml-3">
                        Tersedia
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-2 text-center  display-book-active d-inline" >
                        Kosong
                    </div>
                    <div class="d-inline ml-3">
                        Kosong
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-2 text-center  display-red-active d-inline" >
                        Memilih
                    </div>
                    <div class="d-inline ml-3">
                        Pilihanmu
                    </div>
                </div>
            </div>
            <hr>
            <div class="alert alert-danger alert-dismissible fade show alert-booking d-none" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <div class="row booking-space">
            {{-- @for ($j = 0 ; $j <= 30 ; $j++)
                    <div class="col-md-2">
                    <div class="mb-2 text-center text-white kode_kamar green-active" >
                            A0{{ $j }}
                    </div>
                    </div>
            @endfor --}}
            </div>
            <div class="row">
                <button class="btn btn-danger mt-2 mb-3 ml-auto mr-2 mt-3 " type="button" id="back-button">Kembali</button>
                <button class="btn btn-success mt-2 mb-3 mr-3 mt-3 " type="button" id="booking-button">submit</button>
            </div>
        </form>
    </div>
</div>





@endsection
@push('js')
<script>

    function validation($name, $id, $error = null){
    if($error && $($id).val()){
        console.log(true);
        $($id).addClass('is-invalid');
        $($id).closest('.input-group').find('.invalid-feedback').remove();
        $($id).closest('.input-group').append(
            '<div class="invalid-feedback">'+
                $error +
            '</div>'
        );
    }else if(!$($id).val()){
        $($id).addClass('is-invalid');
        $($id).closest('.input-group').find('.invalid-feedback').remove();
        $($id).closest('.input-group').append(
            '<div class="invalid-feedback">'+
                $name + ' tidak boleh kosong'+
            '</div>'
        );
        console.log(true);
        return 1;
    }else if ($name == "Nomor Hp") {
        if ($($id).val().toString().length == 0) {
            $error = "No HP tidak boleh kosong";
        } else if ($($id).val().toString().length < 10) {
            $error = "No HP minimal 10 digit";
        }
        if ($error) {
            $($id).addClass('is-invalid');
            $($id).closest('.input-group').find('.invalid-feedback').remove();
            $($id).closest('.input-group').append(
            '<div class="invalid-feedback">'+
                  $error +
            '</div>'
        );
        } else {
            $($id).removeClass('is-invalid');
            $($id).closest('.input-group').find('.invalid-feedback').remove();
            return 0;
        }
    } else if ($name == "Email Pemesan") {
        var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        console.log(Array.isArray($($id).val().match(validRegex)));
        if (Array.isArray($($id).val().match(validRegex))) {
            $($id).removeClass('is-invalid');
              $($id).closest('.input-group').find('.invalid-feedback').remove();
            return 0;
        } else {
            $($id).addClass('is-invalid');
             $($id).closest('.input-group').find('.invalid-feedback').remove();
            $($id).closest('.input-group').append(
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
             $($id).closest('.input-group').find('.invalid-feedback').remove();
            $($id).closest('.input-group').append(
                '<div class="invalid-feedback">' +
                erorr +
                '</div>'
            );
            return 1;
        } else {
            $($id).removeClass('is-invalid');
             $($id).closest('.input-group').find('.invalid-feedback').remove();
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
            $($id).closest('.input-group').find('.invalid-feedback').remove();
            $($id).closest('.input-group').append(
                '<div class="invalid-feedback">' +
                erorr +
                '</div>'
            );
            return 1;
        } else {
            $($id).removeClass('is-invalid');
            $($id).closest('.input-group').find('.invalid-feedback').remove();
            return 0;
        }
    }else{
        $($id).removeClass('is-invalid');
        $($id).closest('.input-group').find('.invalid-feedback').remove();
        return 0;
    }
    }

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

$('#tipe_id').change(function(e){
    console.log('halo');
    axios.get('/api/tipe/harga/' + $(this).val()).then(response=>{
        $('#harga').val(formatRupiah(response.data.tipe.harga));
        $('#kamar_tersedia').val(response.data.tipe.total_jumlah_kamar_tersedia);
        $('#kamar_terisi').val(response.data.tipe.total_jumlah_kamar_booking);
    }).catch(err =>{

    });
});
$('#next-button').click(function (e) {
    e.preventDefault();
    var tipe_id = validation('Tipe','#tipe_id');
    var nama_pemesan = validation('Nama Pemesan','#nama_pemesan');
    var tanggal_checkin = validation('Tanggal Checkiin','#tanggal_checkin');
    var tanggal_checkout = validation('Tanggal checkout','#tanggal_checkout');
    var nama_tamu = validation('Nama Tamu','#nama_tamu') ;
    var email_pemesanan = validation('Email Pemesan','#email_pemesan');
    var no_hp = validation('Nomor Hp','#nomor_hp_pemesan');

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

    // get data booking
    var tipe_id = $('#tipe_id :selected').val();
    // get data booking
    axios.post('/api/admin/kamar', {tipe_id:tipe_id,reservasi_id:'0'},{
        "X-Requested-With": "XMLHttpRequest",
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }).then(response => {
        $('.booking-space').find('.col-md-2').remove();
        response.data.kamar.forEach(e => {
            if (e.status == 1) {
                $('.booking-space').append(
                    // '<div class="swiper-slide">' +
                    // '<div class="row swiper-slide">' +
                    '<div class="col-md-2">' +
                    '<div class="mb-2 text-center text-white kode_kamar book-active" data-id="' + e.id + '" >' +
                    e.kode_kamar +
                    '</div>' +
                    '</div>'
                    // '</div>'
                    // '</div>'
                )
            } else {
                $('.booking-space').append(
                    // '<div class="swiper-slide">' +
                    // '<div class="row swiper-slide">' +
                    '<div class="col-md-2">' +
                    '<div class="mb-2 text-center text-white kode_kamar green-active" data-id="' + e.id + '" >' +
                    e.kode_kamar +
                    '</div>' +
                    '</div>'
                    // '</div>'
                    // '</div>'
                )
            }

        });
    }).catch(error => {
        console.log(error);
    });
    //post data booking
    $('#booking-button').click(function (e) {
        e.preventDefault();
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
            axios.post('/admin/reservasi', formdata, {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }).then(response => {
                window.location.href = '/admin/reservasi?create=true';
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
$('#back-button').click(function () {
    $('.seaction-reservasi').removeClass('d-none');
    $('.section-booking').addClass('d-none');
});

</script>
@endpush

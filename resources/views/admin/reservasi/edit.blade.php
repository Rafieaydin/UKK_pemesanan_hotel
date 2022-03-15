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
    .red-active{
        background-color: orange;
        border-radius:5px;
        padding: 5px;
    }
    .green-active{
        background-color: green;
        border-radius:5px;
        padding: 5px;
    }
    .booking-header{
        color: #30336b;
        text-transform: uppercase;
        font-weight: 900;
    }
</style>
@endpush
@section('judul','Edit Data Resevarsi')
@section('breadcrump')
<div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i>
        DASBOARD</a></div>
<div class="breadcrumb-item"><i class="fas fa-bed"></i> DATA RESERVASI</div>
@endsection
@section('content')
<div class="card">
    <div class="card-body seaction-reservasi" class="mt-5">
        <form  action="{{ route('resepsionis.reservasi.store') }}" method="POST" enctype="multipart/form-data" id="form-reservasi-edit">
            @method('PUT')
            @csrf
            <div class="row">
                <input type="text" hidden name="" id="reservasi_id" value="{{ $reservasi->uuid }}">
                <div class="col-md-6">
                    <label for="">Tipe Kamar</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-bed"></i></div>
                        </div>

                        <select name="tipe_id" value="{{ old('tipe_id') }}" class="form-control @error('tipe_id')
                                is-invalid
                            @enderror" id="tipe_id">
                            @foreach ($tipe as $value)
                            <option value="{{ $value->id }}" @if (old('tipe_id',$reservasi->tipekamar->id) == $value->id)
                                selected
                            @endif>{{ $value->nama_tipe }}</option>
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
                    <label for="">Nama pemesan</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-user"></i></div>
                        </div>
                        <input type="text" name="nama_pemesan" value="{{ old('nama_pemesan',$reservasi->nama_pemesan) }}" class="form-control @error('nama_pemesan')
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
                        <input type="text" name="nama_tamu" value="{{ old('nama_tamu',$reservasi->nama_tamu) }}" class="form-control @error('nama_tamu')
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
                        <input type="email" name="email_pemesan" value="{{ old('email_pemesan',$reservasi->email_pemesan) }}" class="form-control @error('email_pemesan')
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
                        <input type="number" name="nomor_hp_pemesan" value="{{ old('nomor_hp_pemesan',$reservasi->nomor_hp_pemesan) }}" class="form-control @error('nomor_hp_pemesan')
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
                        <input type="date" name="tanggal_checkin" value="{{ old('tanggal_checkin',$reservasi->tanggal_checkin->format('Y-m-d')) }}" class="form-control @error('tanggal_checkin')
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
                        <input type="date" name="tanggal_checkout" value="{{ old('tanggal_checkout',$reservasi->tanggal_checkout->format('Y-m-d')) }}" class="form-control @error('tanggal_checkout')
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
            <h1 class="booking-header">Pilih kamar tersedia</h1>
            <ul style="color: red">
                <li>hijau kosong</li>
                <li>oren memilih pesanan</li>
                <li>merah terisi</li>
            </ul>
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
    }else{
        $($id).removeClass('is-invalid');
        $($id).closest('.input-group').find('.invalid-feedback').remove();
        return 0;
    }
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

$('#next-button').click(function (e) {
    e.preventDefault();
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
    var reservasi_id = $('#reservasi_id').val();
    // get data booking
    axios.get('/api/admin/kamar/'+tipe_id, {
        "X-Requested-With": "XMLHttpRequest"
    }).then(response => {
        console.log(response);
        $('.booking-space').find('.col-md-2').remove();
        response.data.forEach(e => {
            if(reservasi_id == e.reservasi_id && e.status == 1){
                $('.booking-space').prepend(
                    // '<div class="swiper-slide">' +
                    // '<div class="row swiper-slide">' +
                    '<div class="col-md-2">' +
                    '<div class="mb-2 text-center text-white kode_kamar red-active" data-id="' + e.id + '" >' +
                    e.kode_kamar +
                    '</div>' +
                    '</div>'
                    // '</div>'
                    // '</div>'
                )
            }else if (e.status == 1) {
                $('.booking-space').prepend(
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
                $('.booking-space').prepend(
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
            var form = $('#form-reservasi-edit')[0]; //htmlformelement
            var formdata = new FormData(form)
            formdata.append('kode_kamar', JSON.stringify(kode_kamars))
            console.log(kode_kamars);
            axios.post('/admin/reservasi/'+reservasi_id, formdata, {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }).then(response => {
                window.location.href = '/admin/reservasi?update=true';
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

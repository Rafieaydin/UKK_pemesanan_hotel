@extends('template.main')
@section('content')
<section class="py-5 section-1 bg-img mh-100">
    <div class="container">
        <div class="form-input">
            <div class="row">
                <div class="col-md-5">
                    <img src="{{ asset('assets/images/hotel.jfif') }}" alt=""
                        style="width: 100%; height:400px;border-radius:15px; background-size: cover;">
                        <a href="/" class="btn btn-primary pesan-button mt-3" ><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>
                </div>
                <div class="col-md-7">
                    <h1 class="label-color label-header">Detail resevarsi kamar</h1>
                    <div class="row pt-3">
                        <div class="col-md-6">
                            <label for="" class="label-input">Tipe kamar</label>
                            <select name="" class="form-control  " id="" placeholder="Tipe Kamar" disabled>
                                <option value="" selected>{{ $resevarsi->tipekamar->nama_tipe }}</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="label-input">Jumlah Kamar</label>
                            <input type="number" class="form-control" placeholder="Jumlah kamar" value="{{ $resevarsi->jumlah_kamar }}" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="label-input mt-4">check-in</label>
                            <input type="date" class="form-control" value="{{ $resevarsi->tanggal_checkin->format('Y-m-d') }}" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="label-input mt-4">check-out</label>
                            <input type="date" class="form-control" value="{{ $resevarsi->tanggal_checkout->format('Y-m-d') }}" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="label-input mt-4">Nama Pemesan</label>
                            <input type="input" class="form-control" placeholder="Nama Pemesan" value="{{ $resevarsi->nama_pemesan }}" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="label-input mt-4">Nama Tamu</label>
                            <input type="input" class="form-control" placeholder="Nama Tamu" value="{{ $resevarsi->nama_tamu }}" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="label-input mt-4">email Pemesan</label>
                            <input type="input" class="form-control" placeholder="Email Pemesan" value="{{ $resevarsi->email_pemesan }}" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="label-input mt-4">no hp pemesan</label>
                            <input type="input" class="form-control" placeholder="No hp Pemesan" value="{{ $resevarsi->nomor_hp_pemesan }}" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="label-input mt-3">Bukti Resevarsi Kamar</label>
                            <a href="{{ route('pdfresevarsi',$resevarsi->uuid) }}" class="btn btn-primary pesan-button" >Download PDF</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
</section>
@endsection

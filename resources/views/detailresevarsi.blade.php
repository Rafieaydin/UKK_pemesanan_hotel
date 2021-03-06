@extends('template.main')
@section('content')
<section class="py-5 section-1 bg-img mh-100">
    <div class="container">
        <div class="form-input">
            <div class="row">
                <div class="col-md-5">
                    <img src="{{ asset('assets/images/hotel.jfif') }}" alt=""
                        style="width: 100%; height:400px;border-radius:15px; background-size: cover;">
                        <a href="/resevarsi" class="btn btn-primary pesan-button mt-3" ><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>
                </div>
                <div class="col-md-7">
                    <h1 class="label-color label-header">Detail resevarsi kamar</h1>
                    <div class="row pt-3">
                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                        @endif
                        <div class="col-md-6">
                            <label for="" class="label-input">Tipe kamar</label>
                            <select name="" class="form-control  " id="" placeholder="Tipe Kamar" disabled>
                                <option value="" selected>{{ $resevarsi->tipekamar->nama_tipe }}</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="label-input">Kode Booking</label>
                            <input type="text" class="form-control" placeholder="Jumlah kamar" value="{{ $resevarsi->kode_booking }}" disabled>
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
                            <label for="" class="label-input mt-4">check-in</label>
                            <input type="date" class="form-control" value="{{ $resevarsi->tanggal_checkin->format('Y-m-d') }}" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="label-input mt-4">check-out</label>
                            <input type="date" class="form-control" value="{{ $resevarsi->tanggal_checkout->format('Y-m-d') }}" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="label-input mt-4">Total Hari</label>
                            <input type="input" class="form-control" placeholder="No hp Pemesan" value="{{App\Helpers\Helper::getrangedate($resevarsi->tanggal_checkin->format('Y-m-d'),$resevarsi->tanggal_checkout->format('Y-m-d')); }}" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="label-input mt-4">Harga sewa / hari</label>
                            <input type="input" class="form-control" placeholder="No hp Pemesan" value="{{ App\Helpers\Helper::format_rupiah($resevarsi->tipekamar->harga) }}" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="label-input mt-4">Jumlah Kamar yg di sewa</label>
                            <input type="input" class="form-control" placeholder="No hp Pemesan" value="{{ $resevarsi->KamarBooking->count() }}" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="label-input mt-4">Total harga</label>
                            <input type="input" class="form-control" placeholder="No hp Pemesan" value="{{ App\Helpers\Helper::format_rupiah($resevarsi->total_harga) }}" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="label-input mt-3">Bukti Resevarsi Kamar</label> <br>
                            <a href="{{ route('pdfresevarsi',$resevarsi->uuid) }}" class="btn btn-primary pesan-button" >Download PDF</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
</section>
@endsection

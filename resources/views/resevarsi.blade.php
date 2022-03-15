@extends('template.main')
<style>
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
</style>
@section('content')
<section class="py-5 section-1 bg-img ">
    <div class="container">
        <div class="form-input">
            <div class="row">
                <div class="col-md-5">
                    <img src="{{ asset('assets/images/hotel.jfif') }}" alt=""
                        style="width: 100%; height:400px;border-radius:15px; background-size: cover;">
                </div>
                <div class="col-md-7 seaction-reservasi">
                    <h1 class="label-color label-header">resevarsi kamar</h1>
                    <form action="{{ route('postresevarsi') }}" method="POST" id="form-reservasi">
                        @csrf
                        @if (session('status'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        <div class="row pt-3 Reservasi">

                            <div class="col-md-6">
                                <label for="" class="label-input">Tipe kamar</label>
                                <select name="tipe_id" id="tipe_id" class="form-control   @error('tipe_id') is-invalid @enderror"
                                    id="tipe_id" placeholder="Tipe Kamar">
                                    <option value="">Pilih Tipe</option>
                                    @foreach ($tipe_kamar as $value)
                                    <option value="{{ $value->id }}" @if($value->total_jumlah_kamar_tersedia <= 0) disabled
                                            @endif>
                                            {{ ($value->total_jumlah_kamar_tersedia <= 0) ? $value->nama_tipe.' | Kosong' : $value->nama_tipe }}
                                    </option>
                                    @endforeach

                                </select>
                                @error('tipe_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="" class="label-input">Nama Pemesan</label>
                                <input type="input" class="form-control @error('nama_pemesan')
                                is-invalid
                            @enderror" name="nama_pemesan" placeholder="Nama Pemesan" id="nama_pemesan">
                            </div>
                            <div class="col-md-6 ">
                                <label for="" class="label-input mt-4">check-in</label>
                                <input type="date" class="form-control @error('tanggal_checkin')
                            is-invalid
                            @enderror" name="tanggal_checkin" id="tanggal_checkin">
                                @error('tanggal_checkin')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="" class="label-input mt-4">check-out</label>
                                <input type="date" class="form-control @error('tanggal_checkout')
                                is-invalid
                            @enderror" name="tanggal_checkout" id="tanggal_checkout">
                                @error('tanggal_checkout')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="" class="label-input mt-4">Nama Tamu</label>
                                <input type="input" class="form-control @error('nama_tamu')
                            is-invalid
                        @enderror" name="nama_tamu" placeholder="Nama Tamu" id="nama_tamu">
                                @error('nama_tamu')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="" class="label-input mt-4">email Pemesan</label>
                                <input type="input" class="form-control @error('email_pemesan')
                            is-invalid
                            @enderror" name="email_pemesan" placeholder="Email Pemesan" id="email_pemesan">
                                @error('email_pemesan')
                                <div class="invalid-feedback" style="position: relative">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="" class="label-input mt-4">no hp pemesan</label>
                                <input type="input" class="form-control @error('nomor_hp_pemesan')
                                is-invalid
                            @enderror" name="nomor_hp_pemesan" placeholder="No hp Pemesan" id="nomor_hp_pemesan">
                                @error('nomor_hp_pemesan')
                                <div class="invalid-feedback mb-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            {{-- <div class="col-md-6 mt-3">

                            </div> --}}
                            <div class="col-md-6 mt-3 mt-5">
                                <button class="btn btn-primary submit-button" type="button" id="reservasi-button"
                                    style="width: 40%">Selanjutnya</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-7 d-none section-booking">
                    <h1 class="label-color label-header">Pilih kamar tersedia</h1>
                    {{-- <form action="{{ route('postresevarsi') }}" method="POST"> --}}
                        @csrf
                        <div class="alert alert-danger alert-dismissible fade show alert-booking d-none" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        {{-- booking space --}}
                        <div class="row pt-2 booking-space">
                                {{-- @for ($j = 0 ; $j <= 30 ; $j++)
                                <div class="col-md-2">
                                    <div class="mb-2 text-center text-white kode_kamar green-active" >
                                        A0{{ $j }}
                                    </div>
                                </div>
                                @endfor --}}
                            </div>
                            <div class="col-md-6 mt-3">
                                <button class="btn btn-primary btn-danger" id="back-button" type="button"
                                style="width: 30%">Kembali</button>
                                <button class="btn btn-primary pesan-button" id="booking-button" type="submit"
                                    style="width: 30%">Pesan</button>
                            </div>
                        </div>

                </div>
            </div>
        </div>
</section>
@endsection
@push('js')
  <script src="{{ asset('assets/js/pages/booking.js') }}"></script>
  <script>
           var swiper = new Swiper(".booking", {
            pagination: {
                el: ".swiper-pagination",
                //   dynamicBullets: true,

            },
            autoplay: {
                    delay: 2500,
                    disableOnInteraction: false,
                },
                breakpoints: {
                400: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 40,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 50,
                },
            },
        });
  </script>
@endpush

@extends('template.main')
<style>
    .book-active {
        background-color: red;
        border-radius: 5px;
        padding: 2px;
        width: 50px;
    }

    .display-book-active {
        background-color: red;
        border-radius: 5px;
        padding: 2px;
        width: 60px;
        color: red;
    }

    .red-active {
        background-color: orange;
        border-radius: 5px;
        padding: 2px;
        width: 50px;
    }

    .display-red-active {
        background-color: orange;
        border-radius: 5px;
        padding: 2px;
        width: 60px;
        color: orange;
    }

    .green-active {
        background-color: green;
        border-radius: 5px;
        padding: 2px;
        width: 50px;
    }

    .display-green-active {
        background-color: green;
        border-radius: 5px;
        padding: 2px;
        width: 60px;
        color: green;
    }

    .back-button {
        background-color: orange !important;
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
                <div class="col-md-7 seaction-diri">
                    <h1 class="label-color label-header">data resevarsi</h1>
                    <form action="{{ route('postresevarsi') }}" method="POST" id="form-reservasi">
                        @csrf
                        @if (session('status'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        <div class="row pt-3 Reservasi">
                            <input type="text" class="d-none" name="tamu_id"
                                value="{{ (Auth::guard('tamu')->check()) ? Auth::guard('tamu')->user()->id : ''  }}">
                            <div class="col-md-6">
                                <label for="" class="label-input ">Nama Pemesan</label>
                                <input type="input" class="form-control @error('nama_pemesan')
                                is-invalid
                            @enderror" name="nama_pemesan" placeholder="Nama Pemesan"
                                    value="{{ old('nama_pemesan', (Auth::guard('tamu')->check()) ? Auth::guard('tamu')->user()->nama_tamu : '') }}"
                                    id="nama_pemesan">
                            </div>
                            <div class="col-md-6">
                                <label for="" class="label-input ">Nama Tamu</label>
                                <input type="input" class="form-control @error('nama_tamu')
                            is-invalid
                        @enderror" name="nama_tamu" placeholder="Nama Tamu"
                                    value="{{ old('nama_tamu', (Auth::guard('tamu')->check()) ? Auth::guard('tamu')->user()->nama_tamu : '') }}"
                                    id="nama_tamu">
                                @error('nama_tamu')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="" class="label-input mt-4">email Pemesan</label>
                                <input type="email" class="form-control @error('email_pemesan')
                            is-invalid
                            @enderror" name="email_pemesan" placeholder="Email Pemesan" id="email_pemesan"
                                    value="{{ old('email_pemesan', (Auth::guard('tamu')->check()) ? Auth::guard('tamu')->user()->email : '') }}">
                                @error('email_pemesan')
                                <div class="invalid-feedback" style="position: relative">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="" class="label-input mt-4">no hp pemesan</label>
                                <input type="number" min="8" max="12" class="form-control @error('nomor_hp_pemesan')
                                is-invalid
                            @enderror" name="nomor_hp_pemesan" placeholder="No hp Pemesan" id="nomor_hp_pemesan"
                                    value="{{ old('nomor_hp_pemesan', (Auth::guard('tamu')->check()) ? Auth::guard('tamu')->user()->no_hp : '') }}">
                                @error('nomor_hp_pemesan')
                                <div class="invalid-feedback mb-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            {{-- <div class="col-md-6 mt-3">

                            </div> --}}

                            <div class="col-md-6 mt-4">

                                <button class="btn btn-primary submit-button" type="button" id="data-button"
                                    style="width: 40%">Selanjutnya</button>
                            </div>
                        </div>

                </div>
                <div class="col-md-7 seaction-reservasi d-none">
                    <h1 class="label-color label-header">resevarsi kamar</h1>

                    @csrf
                    @if (session('status'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="row pt-3 Reservasi">
                        <input type="text" class="d-none" name="tamu_id"
                            value="{{ (Auth::guard('tamu')->check()) ? Auth::guard('tamu')->user()->id : ''  }}">
                        <div class="col-md-6">
                            <label for="" class="label-input">Tipe kamar</label>
                            <select name="tipe_id" id="tipe_id"
                                class="form-control   @error('tipe_id') is-invalid @enderror" id="tipe_id"
                                placeholder="Tipe Kamar">
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
                            <label for="" class="label-input">Harga / malam</label>
                            <input type="input" class="form-control @error('harga')
                                is-invalid
                            @enderror" name="harga" placeholder="" @disabled(true) id="harga">
                            @error('harga')
                            <div class="invalid-feedback mb-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="" class="label-input mt-3">Kapasitas orang</label>
                            <input type="text" class="form-control @error('kapasitas_orang')
                                is-invalid
                            @enderror" name="kapasitas_orang" placeholder="" @disabled(true) id="kapasitas_orang">
                            @error('kapasitas_orang')
                            <div class="invalid-feedback mb-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="" class="label-input mt-4">jumlah Kamar tersedia</label>
                            <input type="input" class="form-control @error('kamar_tersedia')
                                is-invalid
                            @enderror" name="kamar_tersedia" placeholder="" @disabled(true) id="kamar_tersedia">
                            @error('kamar_tersedia')
                            <div class="invalid-feedback mb-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="" class="label-input mt-4">Jumlah Kamar Terisi</label>
                            <input type="input" class="form-control @error('kamar_terisi')
                                is-invalid
                            @enderror" name="kamar_terisi" placeholder="" @disabled(true) id="kamar_terisi">
                            @error('kamar_terisi')
                            <div class="invalid-feedback mb-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label for="" class="label-input mt-4">Fasilitas</label>
                            <div class="card" style="border-radius: 15px;min-height:50px">
                                <div class="row mt-3 fasilitas">

                                </div>
                            </div>
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

                        {{-- <div class="col-md-6 mt-3">

                            </div> --}}
                        <div class="col-md-6 mt-4">
                            <button class="btn backs-button text-white bg-warning" id="backs-button" type="button"
                                style="width: 30%;">Kembali</button>
                            <button class="btn btn-primary  submit-button" type="button" id="reservasi-button"
                                style="width: 40%">Selanjutnya</button>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="col-md-7 d-none section-booking">
                    <h1 class="label-color label-header">Pilih kamar</h1>
                    {{-- <form action="{{ route('postresevarsi') }}" method="POST"> --}}
                    @csrf
                    <div class="alert alert-danger alert-dismissible fade show alert-booking d-none" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    {{-- <hr> --}}
                    <div class="row">

                        <hr>
                        <div class="col-md-4">
                            <div class="mb-2 text-center  display-green-active d-inline">
                                Tersedia
                            </div>
                            <div class="d-inline ms-3">
                                Tersedia
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-2 text-center  display-book-active d-inline">
                                Kosong
                            </div>
                            <div class="d-inline ms-3">
                                Kosong
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-2 text-center  display-red-active d-inline">
                                Memilih
                            </div>
                            <div class="d-inline ms-3">
                                Pilihanmu
                            </div>
                        </div>
                    </div>
                    {{-- booking space --}}
                    <hr>

                    <div class=" booking-space">
                        {{-- @for ($j = 0 ; $j <= 30 ; $j++)
                                <div class="col-md-2">
                                    <div class="mb-2 text-center text-white kode_kamar green-active" >
                                        A0{{ $j }}
                    </div>
                </div>
                @endfor --}}
            </div>
            <div class="row">
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <p style="color: #30336b;font-size:20px;font-weight: bold"><i
                                class="fa-solid fa-cloud-moon"></i> <span id="jumlah_malam"></span></p>
                    </div>
                    <div class="col-md-6">
                        <p style="color: #30336b;font-size:15px;font-weight: bold "> Harga / malam : <span
                                id="harga_malam"></span></p>
                    </div>
                </div>
                <hr>
            </div>
            <div class="col-md-12" style="color: #30336b;font-size:15px;font-weight: bold ">
                Total harga : <span id="total_harga">Rp. 0</span>
            </div>
            <hr>
            <div class="col-md-6 mt-3">
                <button class="btn back-button text-white" id="back-button" type="button"
                    style="width: 30%;">Kembali</button>
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
{{-- moment js --}}
<script src="{{ asset('assets/js/lib/moment.js') }}"></script>
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

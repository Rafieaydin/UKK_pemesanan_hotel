@extends('template.main')
@section('content')
<section class="py-5 section-1 bg-img mh-100">
    <div class="container-fluid py-3 text-center">
        <div class="row">

            <div class="col-lg-6 col-md-6 col-sm-0 mx-auto my-5 ps-5 pt-3 text-start">
                {{-- <div class="card"> --}}
                <h2 class="pt-2 fw-bold" style="color: #30336b;font-size:40px">Selamat Datang <br> di Hotel Aston
                    Bogor,</h2>
                {{-- <h2 class="text-white">Kami akan menyediakan yang terbaik untuk anda</h2> --}}
                <p class="text-dark my-4"> Hanya berjarak 30 menit dari Station Kereta Api Bogor dan 50 menit
                    berkendaraan
                    dari Jakarta melalui Jalan Toll Jagorawi, Hotel ASTON Bogor bertempat di lokasi strategis di
                    Pusat
                    Pengembangan Bogor Nirwana Residence Area. </p>
                {{-- </div> --}}
                <a href="{{ route('resevarsi') }}" class="btn btn-primary login-bottom">BOOK NOW</a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-0 mx-auto text-left">
                <img src="{{ asset('assets/images/hotel.jfif') }}" alt=""
                    style="width: 80%; height:400px;border-radius:15px; background-size: cover;">
            </div>
</section>

<section class="py-5 section-1 bg-img" id="kamar">
    <div class="container py-3 ">
        <div class="row">
            <div class="col-9 col-md-10 col-lg-11">
                <p class="room-title text-left judul-section">Best Room For You</p>
            </div>
            <div class="col-3 col-md-2 col-lg-1" style="position: relative;">
                <div class="swiper-button-next" style="color: #130f40;font-size:5px;"></div>
                <div class="swiper-button-prev" style="color: #130f40;"></div>
            </div>

        </div>
        <div class="swiper mySwiper mt-4">
            <div class="swiper-wrapper">
                @foreach ($fasilitas_kamar as $value) <div class="swiper-slide" style="hight:auto">
                    <div class="card h-100" style="border-radius: 20px;">
                        <img class="pt-3 ps-3 pe-3" style="border-radius: 25px;height:150px"
                            src='{{ asset("assets/images/$value->gambar") }}'>
                        <div class="card-body">
                            <h5 class="card-title fw-bold " style="color: #130f40;font-size:18px">
                                {{ $value->nama_tipe }}</h5>
                            <p class="card-text pb-0 mb-3" style="padding: 0px;margin:0px;height:80px">{!!
                                substr($value->keterangan, 0, 70) !!}</p>
                            <p class="card-text fw-bold mb-2" style="margin: 0px;color:#130f40;font-size:25px;height">
                                {{ !$value->harga ? '$0' : $value->harga }}
                            </p>
                            <p class="card-text d-inline fw-bold">Fasilitas :</p> <br>
                            @foreach ($value->fasilitas as $val) <span class="badge p-2 mb-2"
                                style="background-color: #30336b;"> <i class="{{ $val->incon_fasilitas }}"
                                    aria-hidden="true"></i>
                                {{ $val->nama_fasilitas }}</span>
                            @endforeach
                            {{-- <br> --}}
                            {{-- <p class="card-text d-inline ">Some quick example text to build on the card title and make up the
                                  bulk of the card's content.</p> --}}
                            {{-- <a href="#" class="btn btn-primary mt-3">Go somewhere</a> --}}
                        </div>
                    </div>
                </div>

                @endforeach

            </div>
        </div>
</section>


<section class="py-5 section-1 bg-img" style="background: #F0F0f0" id="fasilitas">
    <div class="container py-3 ">
        <div class="row">
            <div class="col-9 col-md-10 col-lg-11">
                <p class="room-title text-left judul-section">Fasilitas Hotel</p>
            </div>
            <div class="col-3 col-md-2 col-lg-1" style="position: relative;">

            </div>
            <div class="row">
                <div class="swiper  mt-4 fasilitas">
                    <div class="swiper-wrapper">
                        @foreach ($fasilitas_hotel as $value)
                        <div class="swiper-slide">
                            <div class="row">
                                <div class="col-md-12">
                                    {{-- <div class="card"> --}}
                                    <div class="row">
                                        <img src='{{ asset("assets/images/$value->gambar") }}' alt="" class="img-fluid"
                                            style="border-radius:15px;height:180px;background-size:cover;">
                                        <div class="text-left mt-2"
                                            style="color: #130f40;font-weight:bold;font-size:25px;">
                                            {{ $value->nama_fasilitas }}</div>
                                        <div class="text-left">
                                            {!! substr($value->keterangan, 0, 100) !!}</div>
                                    </div>
                                    {{-- </div> --}}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    {{-- <div class="swiper-pagination"></div> --}}
                </div>

            </div>

        </div>
    </div>
    </div>
</section>

<section class="py-5 section-1 bg-img">
    <div class="container py-3 ">
        <div class="row">
            <div class="col-9 col-md-10 col-lg-11">
                <p class="room-title text-left judul-section">Lokasi Hotel</p>
            </div>
            <div class="col-3 col-md-2 col-lg-1" style="position: relative;">

            </div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.084413388774!2d106.79330851431425!3d-6.6364386667199655!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5ee5f871091%3A0xc58549234bdf7d7c!2sASTON%20Bogor%20Hotel%20%26%20Resort!5e0!3m2!1sid!2sid!4v1646971730759!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
    </div>
</section>
<section class="py-5 section-1 bg-img" >
    <div class="container py-3 ">
        <div class="row justify-content-center">
            <div class="col-md-12 col-md-10 col-lg-11">
                <p class="text-left  text-center" style="color: #30336b;font-size:30px;font-weight:bold">Jelajahi brand kami yang lainnya</p>
            </div>
            <div class="col-md-12">
                <div class="row justify-content-center">
                    <div class="col-md-2 col-6 mt-5">
                        <img src="{{ asset('assets/images/collection.svg') }}" style="width: 130px" alt="">
                    </div>
                    <div class="col-md-2 col-6 mt-5">
                        <img src="{{ asset('assets/images/huxey.svg') }}" style="width: 130px" alt="">
                    </div>
                    <div class="col-md-2 col-6 mt-5">
                        <img src="{{ asset('assets/images/alano.svg') }}" style="width: 130px" alt="">
                    </div>
                    <div class="col-md-2 col-6 mt-5">
                        <img src="{{ asset('assets/images/villas.svg') }}" style="width: 130px" alt="">
                    </div>
                    <div class="col-md-2 col-6 mt-5">
                        <img src="{{ asset('assets/images/harper.svg') }}" style="width: 130px" alt="">
                    </div>
                    <div class="col-md-2 col-6 mt-5">
                        <img src="{{ asset('assets/images/quest.svg') }}" style="width: 130px" alt="">
                    </div>
                    <div class="col-md-2 col-6 mt-5">
                        <img src="{{ asset('assets/images/neo.svg') }}" style="width: 130px" alt="">
                    </div>
                    <div class="col-md-2 col-6 mt-5">
                        <img src="{{ asset('assets/images/favehotel.svg') }}" style="width: 130px" alt="">
                    </div>
                    <div class="col-md-2 col-6 mt-5">
                        <img src="{{ asset('assets/images/nordic.svg') }}" style="width: 130px" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection

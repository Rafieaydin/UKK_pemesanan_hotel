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
                        <img class="pt-3 ps-3 pe-3" style="border-radius: 25px;"
                            src="{{ asset('assets/images/hotel.jfif') }}">
                        <div class="card-body">
                            <h5 class="card-title fw-bold " style="color: #130f40;font-size:18px">{{ $value->nama_tipe }}</h5>
                            <p class="card-text pb-0 mb-3" style="padding: 0px;margin:0px;height:80px">{{ substr($value->keterangan, 0, 70) }}</p>
                            <p class="card-text fw-bold mb-2" style="margin: 0px;color:#130f40;font-size:25px;height">{{ !$value->harga ? '$0' : $value->harga }}
                            </p>
                            <p class="card-text d-inline fw-bold">Fasilitas :</p> <br>
                            @foreach ($value->fasilitas as $val) <span class="badge p-2 mb-2"
                                style="background-color: #30336b;"> <i class="{{ $val->incon_fasilitas }}" aria-hidden="true"></i>
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

        {{-- <div class="swiper-slide">Slide 2</div>
                  <div class="swiper-slide">Slide 3</div>
                  <div class="swiper-slide">Slide 4</div>
                  <div class="swiper-slide">Slide 5</div>
                  <div class="swiper-slide">Slide 6</div>
                  <div class="swiper-slide">Slide 7</div>
                  <div class="swiper-slide">Slide 8</div>
                  <div class="swiper-slide">Slide 9</div> --}}
    </div>
</section>


<section class="py-5 section-1 bg-img" style="background: #F0F0f0"  id="fasilitas" >
    <div class="container py-3 " >
        <div class="row">
            <div class="col-9 col-md-10 col-lg-11">
                <p class="room-title text-left judul-section">Fasilitas Hotel</p>
            </div>
            <div class="col-3 col-md-2 col-lg-1" style="position: relative;">

            </div>
            <div class="row">
                <div class="swiper  mt-4 fasilitas">
                    <div class="swiper-wrapper">
                        @foreach ($fasilitas_hotel as $value) <div class="swiper-slide">
                            <div class="row">
                                <div class="col-md-12">
                                    {{-- <div class="card"> --}}
                                    <div class="row">
                                        <img src='{{ asset("assets/images/$value->gambar") }}' alt="" class="img-fluid"
                                            style="border-radius:15px;height:140px;background-size:cover">
                                        <p class="text-center"
                                            style="color: #130f40;font-weight:bold;font-size:15px;text-transform:uppercase;">
                                            {{ $value->nama_fasilitas }}</p>
                                    </div>
                                    {{-- </div> --}}
                                </div>
                            </div>
                    </div>
                    @endforeach

                    {{-- <div class="swiper-slide">Slide 2</div>
                            <div class="swiper-slide">Slide 3</div>
                            <div class="swiper-slide">Slide 4</div>
                            <div class="swiper-slide">Slide 5</div>
                            <div class="swiper-slide">Slide 6</div>
                            <div class="swiper-slide">Slide 7</div>
                            <div class="swiper-slide">Slide 8</div>
                            <div class="swiper-slide">Slide 9</div> --}}
                </div>
                {{-- <div class="swiper-pagination"></div> --}}
            </div>

        </div>

    </div>
    </div>
    </div>
</section>
@endsection

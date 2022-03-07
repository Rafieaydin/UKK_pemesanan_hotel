@extends('template.main')
@push('css')
<style>
    /*
*
* ==========================================
* FOR DEMO PURPOSES
* ==========================================
*
*/
.text-small {
    font-size: 0.9rem !important;
}

/* .header {
    background-color: #00d2ff;
    background-image: linear-gradient(to right, #00d2ff 0%, #3a7bd5 100%);
} */

.section-1 {
    /* background: linear-gradient(to right, #649173, #dbd5a4); */
    /* background-image: url('{{ asset('assets/images/cccc.jpg')}}'); */
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    /* height: 90vh; */
}

.section-2 {
    background: #F1F1F1;
}

.section-3 {
    background: #EAEAEA;
}

.section-4 {
    background: #E5E5E5;
}
footer {
  background: #212529;
}

</style>
@endpush
@section('content')






<!-- Demo content-->
<section class="py-5 section-1 bg-img mh-100">
    <div class="container-fluid py-3 text-center">
        <div class="row">

            <div class="col-lg-5 mx-auto text-left">
                {{-- <div class="card"> --}}
                    <h2 class="text-dark">Selamat Datang di hotel-O,</h2>
                    <h2 class="text-dark">Kami akan menyediakan yang terbaik untuk anda</h2>
                    <p class="text-dark"> Hanya berjarak 30 menit dari Station Kereta Api Bogor dan 50 menit berkendaraan dari Jakarta melalui Jalan Toll Jagorawi, Hotel ASTON Bogor bertempat di lokasi strategis di Pusat Pengembangan Bogor Nirwana Residence Area. </p>
                {{-- </div> --}}

            </div>
            <div class="col-lg-5 mx-auto text-left">
                {{-- <h2>Image here</h2>
                <p class="text-muted lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate.</p> --}}
                    <div class="card rounded">

                        <div class="container-fluid mt-3 mb-3">
                            <h3 class="header">
                                Booking Room?
                            </h3>
                            <hr>
                            <form>
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Tipe Kamar</label>
                                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Check-in</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                          </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Check-out</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                          </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputPassword1">Jumlah Kamar</label>
                                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                </div>

                                <button type="submit" class="btn btn-primary">Book now</button>
                              </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 section-2">
    <div class="container py-5 text-center">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h1 class="fw-bold text-dark pb-5">Tentang Kami</h2>
                <p class="text-dark lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate.</p>
            </div>
        </div>
    </div>
</section>

<section class="py-5 section-3">
    <div class="container-fluid py-5 text-center">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h1 class="fw-bold text-dark pb-5">Fasilitas Hotel</h2>
                    <div class="row">
                        @foreach ($fasilitas_hotel as $value)
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" height="200px" src='{{ asset("assets/images/$value->gambar") }}' alt="Card image cap">
                                <div class="card-body">
                                  <h5 class="card-title">{{ $value->nama_fasilitas }}</h5>
                                  <p class="card-text">{{ $value->keterangan }}</p>
                                  <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                              </div>
                            </div>
                        @endforeach
                        </div>
            </div>
               
        </div>
    </div>
</section>

<section class="py-5 section-4">
    <div class="container-fluid py-5 text-center">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h1 class="fw-bold text-dark pb-5">Fasilitas Kamar</h2>
                    <div class="row">
                        @foreach ($fasilitas_kamar as $item)
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" height="200px"
                                    src='{{ asset("assets/images/$item->gambar") }}' alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->nama_tipe }}</h5>
                                    <div class="text-left">
                                        <div class="card-text"> fasilitas :</div>
                                    <ul>
                                        @foreach ($item->fasilitas as $value)
                                       
                                            <li>{{ $value->nama_fasilitas }}</li>
                                    
                                        @endforeach
                                    </ul>
                                    </div>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
            </div>
        </div>
    </div>
</section>


@endsection

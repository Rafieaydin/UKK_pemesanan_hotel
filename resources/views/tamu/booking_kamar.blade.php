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
    background-image: url('{{ asset('assets/images/bg-08.jpg')}}');
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    filter: grayscale(100%);

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





{{-- <div>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" hei>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="{{ asset('assets/images/hotel-1.jpeg') }}" alt="First slide" height="400px">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('assets/images/hotel-1.jpeg') }}" alt="Second slide" height="400px">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('assets/images/hotel-1.jpeg') }}" alt="Third slide" height="400px">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
    </div>
</div> --}}
<!-- Demo content-->
<section class="py-5 section-1 bg-img mh-100">
    <div class="container-fluid py-3 text-center">
        <div class="row">

            <div class="col-lg-5 mx-auto my-5 pt-5 text-left">
                {{-- <div class="card"> --}}
                    <h2 class="text-white">Selamat Datang di HOTEL-O,</h2>
                    <h2 class="text-white">Kami akan menyediakan yang terbaik untuk anda</h2>
                    <p class="text-white"> Hanya berjarak 30 menit dari Station Kereta Api Bogor dan 50 menit berkendaraan dari Jakarta melalui Jalan Toll Jagorawi, Hotel ASTON Bogor bertempat di lokasi strategis di Pusat Pengembangan Bogor Nirwana Residence Area. </p>
                {{-- </div> --}}

            </div>
            <div class="col-lg-5 mx-auto text-left">
                {{-- <h2>Image here</h2>
                <p class="text-muted lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate.</p> --}}
                    <div class="card" style="border-radius: 15px"> 

                        <div class="container-fluid mt-3 mb-3">
                            <h3 class="header">
                             Data Pemesanan
                            </h3>
                            <hr>
                            <form>
                                <div class="form-group">
                                  <label for="">Nama Pemesan</label>
                                  <input name="nama_pemesan" id="" class="form-control" value="{{ old('nama_pemesan') }}">
                                  {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                                </div>
                                <div class="form-group">
                                    <label for="">Email Pemesan</label>
                                    <input name="email_pemesan" value="{{ old('email_pemesanan') }}" id="" class="form-control">
                                    {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                                  </div>
                                  <div class="form-group">
                                    <label for="">no telp</label>
                                    <input name="nomor_hp_pemesanan" id="" class="form-control">
                                    {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                                  </div>
                                <a href="" class="btn btn-primary text-wite">Kembali</a>
                                <button type="submit" class="btn btn-primary">Book now</button>
                              </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</section>


@endsection

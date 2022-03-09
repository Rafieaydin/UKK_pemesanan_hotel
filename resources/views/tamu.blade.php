@extends('template.main')
@push('css')

@endpush
@section('content')
<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-transparant">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Dropdown
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Disabled</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>
  <section class="py-5 section-3">
    <div class="container-fluid py-5 text-center">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h1 class="fw-bold text-dark pb-5">Fasilitas Hotel</h2>
                    <div class="row">
                        @foreach ($fasilitas_hotel as $value)
                        <div class="col-md-4">
                            <img class="card-img-top" height="200px" src='{{ asset("assets/images/$value->gambar") }}'
                                alt="Card image cap" style="border-radius: 15px">
                            <div class="row">
                                <label for="" class="text-dark mr-auto ml-3"
                                    style="font-size:20px;font-weight:bold">{{ $value->nama_fasilitas }}</label>
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
@push('js')

@endpush

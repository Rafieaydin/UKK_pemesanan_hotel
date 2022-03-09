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
<section class="py-5 section-4">
    <div class="container-fluid py-3 text-center">
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
                                    <a href="#" class="btn btn-primary">view</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        {{-- <div class="col-md-4">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" height="200px" src="{{ asset('assets/images/kamar_supperior.jpg') }}"
                        alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Supperior Room</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div> --}}
            </div>
            {{-- <div class="col-md-4">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" height="200px" src="{{ asset('assets/images/kamar_deluxe.jpg') }}"
            alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Deluve title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" height="200px" src="{{ asset('assets/images/kamar_one_bedroom.jpg') }}"
                alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">One Contended bedroom</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div> --}}
    </div>
    </div>
    </div>
    </div>
</section>

@endsection

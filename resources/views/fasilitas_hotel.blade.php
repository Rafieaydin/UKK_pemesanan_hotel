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
<section class="py-5 section-3">
    <div class="container-fluid py-3 text-center">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h1 class="fw-bold text-dark pb-5">Fasilitas Hotel</h2>
                    <div class="row">
                        @foreach ($fasilitas_hotel as $value)
                        <div class="col-md-4">
                            <img class="card-img-top" height="200px" src='{{ asset("assets/images/$value->gambar") }}' alt="Card image cap" style="border-radius: 15px">
                            <div class="row">
                                <label for="" class="text-dark mr-auto ml-3" style="font-size:20px;font-weight:bold">{{ $value->nama_fasilitas }}</label>
                            </div>

                            </div>
                        @endforeach
                        </div>
            </div>

        </div>
    </div>
</section>


@endsection

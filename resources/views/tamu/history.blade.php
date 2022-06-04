@extends('template.main')
@section('content')
<section class="py-3 section-1 bg-img mh-100">
    <div class="container py-3 " >
        <div class="row">
            <p class="room-title text-center judul-section text-center">History Reservasi</p>
            <div class="card mt-4 mb-4">
                <div class="container-fluid  mt-3 mb-3">
                    <input type="text" id="tamu_id" class="d-none" value="{{ Auth()->id() }}">
                    <table class="table table-hover able-bordered" id="table1">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Kode Booking</th>
                                <th scope="col">Tipe Kamar</th>
                                <th scope="col">Nama Pemesan</th>
                                <th scope="col">Nama Tamu</th>
                                <th scope="col">Check-in</th>
                                <th scope="col">Check-out</th>
                                {{-- <th scope="col">Status</th> --}}
                                {{-- <th scope="col">Jumlah</th>
                                <th scope="col">Total harga</th> --}}
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@push('js')
<script src="{{ asset('assets/js/pages-tamu/reservasi.js') }}"></script>
@endpush

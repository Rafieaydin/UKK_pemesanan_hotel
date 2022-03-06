@extends('template.master')
@section('judul','Detail Fasilitas Hotel')
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"> <i class="fas fa-hotel"></i> FASILITAS HOTEL</div>
@endsection
@section('content')
<div class="card">
    <div class="container  mt-5">
        <table class="table" id="table2">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Fasilitas Hotel</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Gambar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>{{ $fasilitas_hotel->nama_fasilitas }}</td>
                    <td>keterangan</td>
                    <td><img src='{{ asset("assets/images/".$fasilitas_hotel->gambar) }}' width="200px" alt=""></td>
                </tr>               
            </tbody>
        </table>
    </div>
</div>

@endsection
@push('js')
<script src="{{ asset('assets/js/pages-admin/fasilitas-hotel.js') }}"></script>
@endpush

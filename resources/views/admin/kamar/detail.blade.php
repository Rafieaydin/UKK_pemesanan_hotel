@extends('template.master')
@section('judul','Detail Fasilitas Kamar')
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"> <i class="fas fa-hotel"></i> FASiliTAS KAMAR</div>
@endsection
@section('content')
<div class="card">
    <div class="container  mt-5">
        <table class="table" id="table2">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tipe</th>
                    <th scope="col">Nama Fasilitas</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>{{ $kamar->tipekamar->nama_tipe }}</td>
                    <td>{{ $kamar->jumlah_kamar }}</td>
                </tr>               
            </tbody>
        </table>
    </div>
</div>

@endsection
@push('js')
<script src="{{ asset('assets/js/pages-admin/kamar.js') }}"></script>
@endpush

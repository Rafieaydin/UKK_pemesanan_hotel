@extends('template.master')
@section('judul','Log Resevarsi Hotel')
@push('css')
    <style>
        .table1_filter label{
            margin-top: 100px;
        }
    </style>
@endpush
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"> <i class="fas fa-bed"></i> LOG RESERVASI HOTEL</div>
@endsection
@section('content')
<div class="card">
    <div class="container-fluid  mt-3 mb-3">
        <table class="table table-responsive" id="table1">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tipe Kamar</th>
                    <th scope="col">Nama Pemesan</th>
                    <th scope="col">Nama Tamu</th>
                    <th scope="col">Tanggal Check-in</th>
                    <th scope="col">Tanggal Check-out</th>
                    <th scope="col">jumlah kamar</th>
                    <th scope="col">harga / malam</th>
                    <th scope="col">Total harga</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>

@endsection
@push('js')
<script src="{{ asset('assets/js/pages-resepsionis/reservasilog.js') }}"></script>
@endpush

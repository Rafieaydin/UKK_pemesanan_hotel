@extends('template.master')
@section('judul','Resevarsi Hotel')
@push('css')
    <style>
        .table1_filter label{
            margin-top: 100px;
        }
        thead input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }
    </style>
@endpush
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"> <i class="fas fa-bed"></i> RESERVASI HOTEL</div>
@endsection
@section('content')
<div class="card">
    <div class="container-fluid  mt-3 mb-3">
        @if (session('success'))
        <div class="alert alert-success
        alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
    @endif
        @if (session('fail'))
        <div class="alert alert-danger
        alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
    @endif
        <table class="table " id="table1">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Kode Booking</th>
                    <th scope="col">Tipe Kamar</th>
                    <th scope="col">Nama Pemesan</th>
                    <th scope="col">Nama Tamu</th>
                    <th scope="col">Check-in</th>
                    <th scope="col">Check-out</th>
                    {{-- <th scope="col">Status</th>
                    <th scope="col"></th> --}}
                    {{-- <th scope="col">jumlah kamar</th>
                    <th scope="col">harga / malam</th>
                    <th scope="col">Total harga</th> --}}
                    <th scope="col">Action</th>
                </tr>
                <tr style="background-color: white">
                    <th scope="col" class="filterhead">#</th>
                    <th scope="col"  class="filterhead">Kode Booking</th>
                    <th scope="col" class="filterhead">Tipe Kamar</th>
                    <th scope="col" class="filterhead">Nama Pemesan</th>
                    <th scope="col" class="filterhead">Nama Tamu</th>
                    <th scope="col" class="filterhead">Check-in</th>
                    <th scope="col" class="filterhead">Check-out</th>
                    {{-- <th scope="col">Status</th>
                    <th scope="col"></th> --}}
                    {{-- <th scope="col">jumlah kamar</th>
                    <th scope="col">harga / malam</th>
                    <th scope="col">Total harga</th> --}}
                    <th scope="col" class="filterhead"></th>
                </tr>
            </thead>
            <tbody>

            </tbody>
           
        </table>
    </div>
</div>

@endsection
@push('js')
<script src="{{ asset('assets/js/pages-resepsionis/reservasi.js') }}"></script>
@endpush

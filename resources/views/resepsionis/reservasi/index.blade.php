@extends('template.master')
@section('judul','Resevarsi Hotel')
@push('css')
    <style>
        .table1_filter label{
            margin-top: 100px;
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
        @if (request()->update)
            <div class="alert alert-success
            alert-dismissible fade show" role="alert">
                Data reservasi berhasil di update
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
        @endif
        @if (request()->create)
        <div class="alert alert-success
        alert-dismissible fade show" role="alert">
            Data reservasi berhasil di tambahkan
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
    {{-- <div class="row mb-2">
        <div class="col-md-3">
            <label for="">Filter Check-in</label>
            <input type="date" class="form-control check-in">
        </div>
        <div class="col-md-3">
            <label for="">Filter Check-out</label>
            <input type="date" class="form-control check-out">
        </div>
    </div> --}}

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
<script src="{{ asset('assets/js/pages-resepsionis/reservasi.js') }}"></script>
@endpush

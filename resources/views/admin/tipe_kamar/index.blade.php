@extends('template.master')
@section('judul','Table Tipe Kamar')
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"> <i class="fas fa-bed"></i>TIPE KAMAR</div>
@endsection
@section('content')
<div class="card">
    <div class="container-fluid  mt-3">
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
        <table class="table" id="table1">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tipe Kamar</th>
                    <th scope="col">Kapasitas orang</th>
                    <th scope="col">harga</th>
                    <th scope="col">Total kamar tersedia</th>
                    <th scope="col">Total kamar terpesan</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>

@endsection
@push('js')
<script src="{{ asset('assets/js/pages-admin/tipe_kamar.js') }}"></script>
@endpush

@extends('template.master')
@section('judul','Data Kamar')
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"> <i class="fas fa-bed"></i> KAMAR</div>
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
        <table class="table" id="tabletipe">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tipe</th>
                    <th scope="col">Total kamar tersedia</th>
                    <th scope="col">Total kamar terpesan</th>
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
<script src="{{ asset('assets/js/pages-admin/kamar.js') }}"></script>
@endpush

@extends('template.master')
@section('judul','Detail Tipe Kamar')
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"> <i class="fas fa-bed"></i> TIPE KAMR</div>
@endsection
@section('content')
<div class="card">
    <div class="container  mt-5">
        <table class="table" id="table2">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tipe Kamar</th>
                    <th scope="col">Gambar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>{{ $tipe_kamar->nama_tipe }}</td>
                    <td><img src='{{ asset("assets/images/".$tipe_kamar->gambar) }}' width="200px" alt=""></td>
                </tr>               
            </tbody>
        </table>
    </div>
</div>

@endsection
@push('js')
<script src="{{ asset('assets/js/pages-admin/tipe_kamar.js') }}"></script>
@endpush

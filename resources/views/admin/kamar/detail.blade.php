@extends('template.master')
@section('judul','Detail Fasilitas Kamar')
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"> <i class="fas fa-hotel"></i> FASiliTAS KAMAR</div>
@endsection
@section('content')
<div class="card">
    <div class="container-fluid  mt-3">
        <table class="table" id="table2">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tipe</th>
                    <th scope="col">kode kamar</th>
                    <th scope="col">Status</th>
                    @if ($kamar->status == 1)
                    <th scope="col">Pemesan</th>
                    @endif

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>{{ $kamar->tipekamar->nama_tipe }}</td>
                    <td>{{ $kamar->kode_kamar }}</td>
                    <td>{!! $kamar->status == 0 ? '<span class="badge badge-success">Tersedia</span>' : '<span class="badge badge-danger">Tidak Tersedia</span>' !!}</td>
                    @if ($kamar->status == 1)
                    <td>{{ $kamar->reservasi->nama_pemesan }}</td>
                    @endif

                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
@push('js')
<script src="{{ asset('assets/js/pages-admin/kamar.js') }}"></script>
@endpush

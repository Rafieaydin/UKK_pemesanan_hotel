@extends('template.master')
@section('judul','Detail Reservasi')
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"><i class="fas fa-bed"></i> DATA RESERVASI</div>
@endsection
@section('content')
<div class="card">
    <div class="container-fluid   mt-5">
        <table class="table" id="table2">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Fasilitas Kamar</th>
                    <th scope="col">Nama Pemesan</th>
                    <th scope="col">Email Pemesan</th>
                    <th scope="col">No Hp Pemesan</th>
                    <th scope="col">Tanggal Check-in</th>
                    <th scope="col">Tanggal Check-out</th>
                    <th scope="col">jumlah kamar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td scope="col">{{ $res->tipekamar->nama_tipe }}</td>
                    <td scope="col">{{ $res->nama_pemesan }}</td>
                    <td scope="col">{{ $res->email_pemesan }}</td>
                    <td scope="col">{{ $res->nomor_hp_pemesan }}</td>
                    <td scope="col">{{ $res->tanggal_checkin->format('d-m-Y') }}</td>
                    <td scope="col">{{ $res->tanggal_checkout->format('d-m-Y') }}</td>
                    <td scope="col">{{ $res->jumlah_kamar }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
@push('js')
<script src="{{ asset('assets/js/pages-resepsionis/reservasi.js') }}"></script>
@endpush

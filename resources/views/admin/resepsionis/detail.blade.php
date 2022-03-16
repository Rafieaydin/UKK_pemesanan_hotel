@extends('template.master')
@section('judul','Detail Fasilitas Kamar')
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"> <i class="fas fa-user"></i> ADMIN</div>
@endsection
@section('content')
<div class="card">
    <div class="container-fluid  mt-3">
        <table class="table" id="table2">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">username</th>
                    <th scope="col">nama resepsioni</th>
                    <th scope="col">Email</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">No telp</th>
                    <th scope="col">Alamat</th>


                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>{{ $resepsionis->username }}</td>
                    <td>{{ $resepsionis->nama_resepsionis }}</td>
                    <td>{{ $resepsionis->email }}</td>
                    <td>{{ $resepsionis->jk }}</td>
                    <td>{{ $resepsionis->no_hp }}</td>
                    <td>{{ $resepsionis->alamat }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
@push('js')
<script src="{{ asset('assets/js/pages-admin/resepsionis-user.js') }}"></script>
@endpush

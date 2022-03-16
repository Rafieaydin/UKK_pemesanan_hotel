@extends('template.master')
@section('judul','Detail Admin')
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"> <i class="fas fa-user"></i> ADMIN</div>
@endsection
@section('content')
<div class="card">
    <div class="container-fluid  mt-5">
        <table class="table" id="table2">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>{{ $admin->username }}</td>
                    <td>{{ $admin->email }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
@push('js')
<script src="{{ asset('assets/js/pages-admin/admin-user.js') }}"></script>
@endpush

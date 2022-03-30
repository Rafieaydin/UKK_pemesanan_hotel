@extends('template.master')
@section('judul','Detail Resepsionis')
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"> <i class="fas fa-user"></i> ADMIN</div>
@endsection
@section('content')
<a href="{{ route('admin.resepsionis.index') }}" class="btn btn-primary mb-2"><i class="fas fa-arrow-left"></i> Kembali</a>
<div class="card">
    <div class="container-fluid   mt-3">
        <h4>Data Resepsionis</h4>
        <hr>
        <div class="row justify-content-center">
   
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label text-center">Username</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" disabled value="{{ $resepsionis->username }}">
                    </div>
                  </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label text-center">Nama</label>
                    <div class="col-sm-9">
                      <input type="text"  class="form-control" disabled value="{{ $resepsionis->nama_resepsionis }}" >
                    </div>
                  </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label text-center">Email</label>
                    <div class="col-sm-9">
                      <input type="text"  class="form-control" disabled value="{{ $resepsionis->email }}" >
                    </div>
                  </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label text-center">Jenis Kelamin</label>
                    <div class="col-sm-9">
                      <input type="text"  class="form-control" disabled value="{{ $resepsionis->jk }}" >
                    </div>
                  </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label text-center">Nomor Hp</label>
                    <div class="col-sm-9">
                      <input type="text"  class="form-control" disabled value="{{ $resepsionis->no_hp }}" >
                    </div>
                  </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label text-center">Alamat</label>
                    <div class="col-sm-9">
                      <input type="text"  class="form-control" disabled value="{{ $resepsionis->alamat }}" >
                    </div>
                  </div>
            </div>
        </div>
       
        </div>
        
    </div>
</div>
@endsection
@push('js')
<script src="{{ asset('assets/js/pages-admin/resepsionis-user.js') }}"></script>
@endpush

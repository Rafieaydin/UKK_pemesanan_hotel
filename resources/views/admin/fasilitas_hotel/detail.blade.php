@extends('template.master')
@section('judul','Detail Fasilitas Hotel')
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"> <i class="fas fa-hotel"></i> FASILITAS HOTEL</div>
@endsection
@section('content')
<a href="{{ route('admin.user.index') }}" class="btn btn-primary mb-2"><i class="fas fa-arrow-left"></i> Kembali</a>
<div class="card">
    <div class="container-fluid   mt-3">
        <h4>Data Fasiliatas Hotel</h4>
        <hr>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label text-center">Gambar</label>
                    <div class="col-sm-9">
                        <img src='{{ asset("assets/images/".$fasilitas_hotel->gambar) }}' width="200px" alt="">
                    </div>
                  </div>
            </div>
            <div class="col-md-12">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label text-center">Nama Fasilitas</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" disabled value="{{ $fasilitas_hotel->nama_fasilitas }}">
                    </div>
                  </div>
            </div>
            <div class="col-md-12">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label text-center">Keterangan</label>
                    <div class="col-sm-9">
                      <textarea type="text" class="form-control" disabled value="" >{{ $fasilitas_hotel->keterangan }}</textarea>
                    </div>
                  </div>
            </div>
        </div>
       
        </div>
        
    </div>
</div>


@endsection
@push('js')
<script src="{{ asset('assets/js/pages-admin/fasilitas-hotel.js') }}"></script>
@endpush

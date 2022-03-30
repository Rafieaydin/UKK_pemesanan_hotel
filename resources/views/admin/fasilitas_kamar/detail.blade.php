@extends('template.master')
@section('judul','Detail Fasilitas Kamar')
@section('breadcrump')
<div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i>
        DASBOARD</a></div>
<div class="breadcrumb-item"> <i class="fas fa-hotel"></i> FASiliTAS KAMAR</div>
@endsection
@section('content')
<a href="{{ route('admin.fasilitas_kamar.index') }}" class="btn btn-primary mb-2"><i class="fas fa-arrow-left"></i>
    Kembali</a>
<div class="card">
    <div class="container-fluid   mt-3">
        <h4>Data Fasilitas Kakamr</h4>
        <hr>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label text-center">Icon Fasilias</label>
                    <div class="col-sm-9">
                        <i class="{{ $fasilitasKamar->icon_fasilitas }} mt-2"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label text-center">Nama Fasilitas</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" disabled value="{{ $fasilitasKamar->nama_fasilitas }}">
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
</div>


@endsection
@push('js')
<script src="{{ asset('assets/js/pages-admin/fasilitas-kamar.js') }}"></script>
@endpush

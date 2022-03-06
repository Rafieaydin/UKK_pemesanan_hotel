@extends('template.master')
@push('link')
<link rel="stylesheet" href="{{ asset('template/') }}/node_modules/select2/dist/css/select2.min.css">
<style>
    .card-body .input i {
        width: 50px;
        font-size: medium;
        padding-top: 11px;
    }

    .invalid-feedback {
        display: block;
    }

    h5 {
        color: rgb(82, 82, 255);
    }

</style>
@endpush
@section('judul','Tambah Fasilitas Hotel')
@section('breadcrump')
<div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i>
        DASBOARD</a></div>
<div class="breadcrumb-item"> <i class="far fa-hotel"></i> FASILITAS HOTEL</div>
@endsection
@section('content')
<div class="card">

    <div class="card-body" class="mt-5">
        <form action="{{ route('admin.fasilitas_hotel.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
               
                <div class="col-md-6">
                    <label for="">Nama Tamu</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-user"></i></div>
                        </div>
                        <input type="text" name="nama_tipe" value="{{ old('nama_tipe') }}" class="form-control @error('nama_tipe')
                            is-invalid
                        @enderror"
                            id="inlineFormInputGroup" placeholder="Nama Tamu">
                            @error('nama_tipe')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="">Gambar</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-file"></i></div>
                        </div>
                        <input type="file" class="form-control @error('gambar')
                        is-invalid
                    @enderror" id="inlineFormInputGroup" name="gambar" value="{{ old('gambar') }}" placeholder="Masukan image">
                    @error('gambar')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                    </div>
                 
                </div>
                    <div class="col-md-12">
                        <label for="">Keterangan</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fa fa-user"></i></div>
                            </div>
                            <textarea type="text" name="nama_tipe" value="{{ old('nama_tipe') }}" class="form-control @error('nama_tipe')
                                is-invalid
                            @enderror"
                                id="inlineFormInputGroup" placeholder="Nama Tamu"> </textarea>
                                @error('nama_tipe')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                        </div>
                    </div>
            </div>
            <div class="row">
                <a href="{{ route('admin.fasilitas_hotel.index') }}" class="btn btn-danger mt-2 mb-3 ml-auto mr-2 mt-3 " type="submit">Kembali</a>
                <button class="btn btn-success mt-2 mb-3 mr-3 mt-3 " type="submit">submit</button>
            </div>
        </form>
    </div>

</div>





@endsection
@push('script')
<script src="{{ asset('template/') }}/node_modules/select2/dist/js/select2.full.min.js"></script>
@endpush

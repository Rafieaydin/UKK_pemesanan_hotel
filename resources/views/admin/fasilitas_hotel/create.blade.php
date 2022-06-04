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
                    <label for="">Nama Fasilitas</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-user"></i></div>
                        </div>
                        <input type="text" name="nama_fasilitas" value="{{ old('nama_fasilitas') }}" class="form-control @error('nama_fasilitas')
                            is-invalid
                        @enderror"
                            id="inlineFormInputGroup" placeholder="Nama Fasilitas">
                            @error('nama_fasilitas')
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
                         {{-- <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fa fa-user"></i></div>
                            </div> --}}
                            <textarea id="cke" type="text" name="keterangan" value="{{ old('keterangan') }}" class="form-control @error('keterangan')
                                is-invalid
                            @enderror"
                                id="inlineFormInputGroup" placeholder="Nama Tamu"> </textarea>
                                @error('keterangan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
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
@push('js')
<script>
    CKEDITOR.replace('cke');
    </script>
@endpush

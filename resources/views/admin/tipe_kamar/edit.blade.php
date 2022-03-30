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

    .select2-selection__choice__display{
        color:black;
    }

</style>
@endpush
@section('judul','Edit Tipe Kamar')
@section('breadcrump')
<div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i>
        DASBOARD</a></div>
<div class="breadcrumb-item"> <i class="fas fa-bed"></i> TIPE KAMAR</div>
@endsection
@section('content')
<div class="card">

    <div class="card-body" class="mt-5">
        <form method="POST" action="{{ route('admin.tipe_kamar.update',$tipe->id) }}"  enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col-md-6">
                    <label for="">Nama Tipe</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-bed"></i></div>
                        </div>
                        <input type="text" name="nama_tipe" value="{{ old('nama_tipe',$tipe->nama_tipe) }}" class="form-control @error('nama_tipe')
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
                <div class="col-md-6">
                    <label for="">Pilih Fasilitas</label>
                    <div class="input-group mb-2">
                        <input type="text" value="{{ $val_fasilitas }}" name="val_fasilitas[]" class="d-none val_fasilitas" id="val_fasilitas" >
                        <select name="fasilitas_id[]" value="{{ old('fasilitas_id') }}" class="form-control fasilitas_id @error('fasilitas_id')
                        is-invalid
                    @enderror" multiple="multiple" >
                    <option value="">select2</option>
                            @foreach ($fasilitas as $value)
                            <option value="{{ $value->id }}" @if (old('fasilitas_id')==$value->id)
                                selected
                                @endif>{{ $value->nama_fasilitas }}</option>
                            @endforeach
                        </select>
                        @error('fasilitas_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="">harga</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-dollar" aria-hidden="true"></i></div>
                        </div>
                        <input type="number" name="harga" value="{{ old('harga',$tipe->harga) }}" class="form-control @error('harga')
                            is-invalid
                        @enderror"
                            id="inlineFormInputGroup" placeholder="Nama Tamu">
                            @error('harga')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="">Kapasitas jumlah orang</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-users" aria-hidden="true"></i></div>
                        </div>
                        <input type="text" name="kapasitas_orang" value="{{ old('kapasitas_orang',$tipe->kapasitas_orang) }}" class="form-control @error('kapasitas_orang')
                            is-invalid
                        @enderror" id="inlineFormInputGroup" placeholder="Masukan Kapasitas orang">
                        @error('kapasitas_orang')
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
                        <textarea id="cke" type="text" name="keterangan" class="form-control @error('keterangan')
                            is-invalid
                        @enderror"
                            id="inlineFormInputGroup" placeholder="Nama Tamu">{{ old('keterangan',$tipe->keterangan) }}</textarea>
                            @error('keterangan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                </div>
            </div>
            <div class="row">
                <a href="{{ route('admin.tipe_kamar.index') }}" class="btn btn-danger mt-2 mb-3 ml-auto mr-2 mt-3 " type="submit">Kembali</a>
                <button class="btn btn-success mt-2 mb-3 mr-3 mt-3 " type="submit">submit</button>
            </div>
        </form>
    </div>

</div>





@endsection
@push('js')
<script>
     $(document).ready(function() {
        var val = $('.val_fasilitas').val();
        $('.fasilitas_id').select2({
            multiple: true,
        });
        // Array.from(val) = mengubah string menjadi array
        $('.fasilitas_id').val(Array.from(val)).trigger('change'); // trigger option
    });
    CKEDITOR.replace('cke');
    </script>
@endpush

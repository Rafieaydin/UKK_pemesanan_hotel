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
@section('judul','Tambah Data Kamar ')
@section('breadcrump')
<div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i>
        DASBOARD</a></div>
<div class="breadcrumb-item"> <i class="fas fa-bed"></i> KAMAR</div>
@endsection
@section('content')
<div class="card">

    <div class="card-body" class="mt-5">
        <form action="{{ route('admin.kamar.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <label for="">Tipe Kamar</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-bed"></i></div>
                        </div>
                        <select name="tipe_id" value="{{ old('tipe_id') }}" class="form-control @error('tipe_id')
                                is-invalid
                            @enderror" readonly>
                            @foreach ($tipe as $value)
                            <option value="{{ $value->id }}" @if (old('tipe_id') == $value->id)
                                selected
                            @endif>{{ $value->nama_tipe }}</option>
                            @endforeach
                        </select>
                        @error('tipe_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="">Kode Kamar</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-bed"></i></div>
                        </div>
                        <input type="text" name="kode_kamar" value="{{ old('kode_kamar') }}" class="form-control @error('kode_kamar')
                            is-invalid
                        @enderror" id="inlineFormInputGroup" placeholder="Kode Kamar">
                        @error('kode_kamar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

            </div>
            <div class="row">
                <a href="{{ route('admin.kamar.show',$tipe->first()->id) }}" class="btn btn-danger mt-2 mb-3 ml-auto mr-2 mt-3 " type="submit">Kembali</a>
                <button class="btn btn-success mt-2 mb-3 mr-3 mt-3 " type="submit">submit</button>
            </div>
        </form>
    </div>

</div>





@endsection
@push('js')
<script>
    $(document).ready(function() {
    $('.reservasi').hide();
    $( ".status" ).change(function() {
        if($(this).val() == 1){
            $('.reservasi').show();
        }else{
            $('.reservasi').hide();
        }
    });
    });
  
    </script>

@endpush

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
@section('judul','Edit Data Resevarsi')
@section('breadcrump')
<div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i>
        DASBOARD</a></div>
<div class="breadcrumb-item"> <i class="fas fa-hotel"></i> DATA RESEVARSI</div>
@endsection
@section('content')
<div class="card">

    <div class="card-body" class="mt-5">
        <form action="{{ route('resepsionis.resevarsi.update',$reservasi->id) }}" method="POST" enctype="multipart/form-data">
            @method('patch')
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
                            @enderror">
                            @foreach ($tipe as $value)
                            <option value="{{ $value->id }}" @if (old('tipe_id',$reservasi->tipekamar->id) == $value->id)
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
                    <label for="">Nama pemesan</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-user"></i></div>
                        </div>
                        <input type="text" name="nama_pemesan" value="{{ old('nama_pemesan',$reservasi->nama_pemesan) }}" class="form-control @error('nama_pemesan')
                            is-invalid
                        @enderror" id="inlineFormInputGroup" placeholder="Nama Pemesan">
                        @error('nama_pemesan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="">Email pemesan</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-envelope"></i></div>
                        </div>
                        <input type="email" name="email_pemesan" value="{{ old('email_pemesan',$reservasi->email_pemesan) }}" class="form-control @error('email_pemesan')
                            is-invalid
                        @enderror" id="inlineFormInputGroup" placeholder="Email Pemesan">
                        @error('email_pemesan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="">No hp pemesan</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-phone"></i></div>
                        </div>
                        <input type="number" name="nomor_hp_pemesan" value="{{ old('nomor_hp_pemesan',$reservasi->nomor_hp_pemesan) }}" class="form-control @error('nomor_hp_pemesan')
                            is-invalid
                        @enderror" id="inlineFormInputGroup" placeholder="No Hp pemesan">
                        @error('nomor_hp_pemesan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="">Tanggal Check-in</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-hotel"></i></div>
                        </div>
                        <input type="date" name="tanggal_checkin" value="{{ old('tanggal_checkin',$reservasi->tanggal_checkin->format('Y-m-d')) }}" class="form-control @error('tanggal_checkin')
                            is-invalid
                        @enderror" id="inlineFormInputGroup" placeholder="No Hp pemesan">
                        @error('tanggal_checkin')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="">Tanggal Check-out</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-hotel"></i></div>
                        </div>
                        <input type="date" name="tanggal_checkout" value="{{ old('tanggal_checkout',$reservasi->tanggal_checkout->format('Y-m-d')) }}" class="form-control @error('tanggal_checkout')
                            is-invalid
                        @enderror" id="inlineFormInputGroup" placeholder="No Hp pemesan">
                        @error('tanggal_checkout')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="">Jumlah Kamar</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-bed"></i></div>
                        </div>
                        <input type="number" name="jumlah_kamar" value="{{ old('jumlah_kamar',$reservasi->jumlah_kamar) }}" class="form-control @error('jumlah_kamar')
                            is-invalid
                        @enderror" id="inlineFormInputGroup" placeholder="Jumlah kamar">
                        @error('jumlah_kamar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <a href="{{ route('admin.kamar.index') }}" class="btn btn-danger mt-2 mb-3 ml-auto mr-2 mt-3 " type="submit">Kembali</a>
                <button class="btn btn-success mt-2 mb-3 mr-3 mt-3 " type="submit">submit</button>
            </div>
        </form>
    </div>

</div>





@endsection
@push('script')
<script src="{{ asset('template/') }}/node_modules/select2/dist/js/select2.full.min.js"></script>
@endpush

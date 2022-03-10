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
@section('judul','Tambah Resepsionis')
@section('breadcrump')
<div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i>
        DASBOARD</a></div>
<div class="breadcrumb-item"> <i class="fas fa-user"></i> Resepsionis</div>
@endsection
@section('content')
<div class="card">

    <div class="card-body" class="mt-5">
        <form action="{{ route('admin.resepsionis.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <label for="">username</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-user"></i></div>
                        </div>
                        <input type="text" name="username" value="{{ old('username') }}" class="form-control @error('username')
                            is-invalid
                        @enderror" id="inlineFormInputGroup" placeholder="Username">
                        @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="">Nama</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-user"></i></div>
                        </div>
                        <input type="text" name="nama_resepsionis" value="{{ old('nama_resepsionis') }}" class="form-control @error('nama_resepsionis')
                            is-invalid
                        @enderror" id="inlineFormInputGroup" placeholder="nama_resepsionis">
                        @error('nama_resepsionis')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="">Email</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                        </div>
                        <input type="text" name="email" value="{{ old('email') }}" class="form-control @error('email')
                            is-invalid
                        @enderror" id="inlineFormInputGroup" placeholder="Email">
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="">Nomor HP</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-phone"></i></div>
                        </div>
                        <input type="text" name="no_hp" value="{{ old('no_hp') }}" class="form-control @error('no_hp')
                            is-invalid
                        @enderror" id="inlineFormInputGroup" placeholder="no_hp">
                        @error('no_hp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="">Jenis Kelamin</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-user"></i></div>
                        </div>
                        <select name="jk" id="" class="form-control @error('jk') is-invalid @enderror">
                            <option value="L" @if(old('jk')=="L") selected @endif>Laki-Laki</option>
                            <option value="P" @if(old('jk')=="P") selected @endif>Perempuan</option>
                        </select>
                        @error('jk')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="">Alamat</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-phone"></i></div>
                        </div>
                        <input type="text" name="alamat" value="{{ old('alamat') }}" class="form-control @error('alamat')
                            is-invalid
                        @enderror" id="inlineFormInputGroup" placeholder="alamat">
                        @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="">Password</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-key"></i></div>
                        </div>
                        <input type="password" name="password" value="{{ old('password') }}" class="form-control @error('password')
                            is-invalid
                        @enderror" id="inlineFormInputGroup" placeholder="Password">
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="">Konfirmasi Password</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-key"></i></div>
                        </div>
                        <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control @error('password_confirmation')
                            is-invalid
                        @enderror" id="inlineFormInputGroup" placeholder="Konfirmasi Password">
                        @error('password_confirmation')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <a href="{{ route('admin.user.index') }}" class="btn btn-danger mt-2 mb-3 ml-auto mr-2 mt-3 " type="submit">Kembali</a>
                <button class="btn btn-success mt-2 mb-3 mr-3 mt-3 " type="submit">submit</button>
            </div>
        </form>
    </div>

</div>





@endsection
@push('script')
<script src="{{ asset('template/') }}/node_modules/select2/dist/js/select2.full.min.js"></script>
@endpush

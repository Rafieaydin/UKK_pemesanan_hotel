@extends('template.main')
@section('content')
<section class="py-5 section-1 bg-img mh-100">
    <div class="container">
        <div class="form-input">
            <div class="row">
                <div class="col-md-5">
                    <img src="{{ asset('assets/images/hotel.jfif') }}" alt=""
                        style="width: 100%; height:400px;border-radius:15px; background-size: cover;">
                </div>
                <div class="col-md-7">
                    <h1 class="label-color label-header">resevarsi kamar</h1>
                    <form action="{{ route('postresevarsi') }}" method="POST">
                        @csrf
                    <div class="row pt-3">

                        <div class="col-md-6">
                            <label for="" class="label-input">Tipe kamar</label>
                            <select name="tipe_id" class="form-control   @error('tipe_id') is-invalid @enderror" id="" placeholder="Tipe Kamar">
                                <option value="">Pilih Tipe</option>
                                @foreach ($tipe_kamar as $value)
                                <option value="{{ $value->id }}">{{ $value->nama_tipe }}</option>
                                @endforeach

                            </select>
                            @error('tipe_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="" class="label-input">Jumlah Kamar</label>
                            <input type="number" class="form-control @error('jumlah_kamar') is-invalid @enderror" name="jumlah_kamar" placeholder="Jumlah kamar">
                            @error('jumlah_kamar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-6 ">
                            <label for="" class="label-input mt-4">check-in</label>
                            <input type="date" class="form-control @error('tanggal_checkin')
                            is-invalid
                            @enderror"  name="tanggal_checkin">
                            @error('tanggal_checkin')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="" class="label-input mt-4">check-out</label>
                            <input type="date" class="form-control @error('tanggal_checkout')
                                is-invalid
                            @enderror" name="tanggal_checkout">
                            @error('tanggal_checkout')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="" class="label-input mt-4">Nama Pemesan</label>
                            <input type="input" class="form-control @error('nama_pemesan')
                                is-invalid
                            @enderror" name="nama_pemesan" placeholder="Nama Pemesan">
                            @error('nama_pemesan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="" class="label-input mt-4">Nama Tamu</label>
                            <input type="input" class="form-control @error('nama_tamu')
                            is-invalid
                        @enderror" name="nama_tamu"  placeholder="Nama Tamu">
                        @error('nama_tamu')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="" class="label-input mt-4">email Pemesan</label>
                            <input type="input" class="form-control @error('email_pemesan')
                            is-invalid
                            @enderror" name="email_pemesan" placeholder="Email Pemesan">
                            @error('email_pemesan')
                            <div class="invalid-feedback" style="position: relative">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="" class="label-input mt-4">no hp pemesan</label>
                            <input type="input" class="form-control @error('nomor_hp_pemesan')
                                is-invalid
                            @enderror" name="nomor_hp_pemesan" placeholder="No hp Pemesan">
                            @error('nomor_hp_pemesan')
                            <div class="invalid-feedback mb-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mt-3">
                            <button class="btn btn-primary pesan-button" type="submit" style="width: 30%">Pesan</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
</section>
@endsection

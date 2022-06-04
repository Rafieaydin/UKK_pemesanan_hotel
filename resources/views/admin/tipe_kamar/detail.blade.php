@extends('template.master')
@section('judul','Detail Tipe Kamar')
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"> <i class="fas fa-bed"></i> TIPE KAMR</div>
@endsection
@section('content')
<a href="{{ route('admin.tipe_kamar.index') }}" class="btn btn-primary mb-2"><i class="fas fa-arrow-left"></i> Kembali</a>
<div class="card">
    <div class="container   mt-3">
        <h4>Data Tipe Kamar</h4>
        <hr>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label text-left">Gambar</label>
                    <div class="col-sm-9">
                        <img src='{{ asset("assets/images/".$tipe_kamar->gambar) }}' width="150px" alt="">
                    </div>
                  </div>
            </div>
            <div class="col-md-12">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label text-left">Kamar Tersdia</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" disabled value="{{ $tipe_kamar->total_jumlah_kamar_tersedia }}">
                    </div>
                  </div>
            </div>
            <div class="col-md-12">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label text-left">Kamar terisi</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" disabled value="{{ $tipe_kamar->total_jumlah_kamar_booking }}">
                    </div>
                  </div>
            </div>
            <div class="col-md-12">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label text-left">Fasilitas</label>
                    <div class="col-sm-9">
                        @foreach($tipe_kamar->fasilitas as $val)
                        <ul>
                            <li> <i class="{{ $val->icon_fasilitas }}"></i> {{ $val->nama_fasilitas;}}</li>
                        </ul>
                        @endforeach
                    </div>
                  </div>
            </div>
            <div class="col-md-12">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label text-left">Hagra / malam</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" disabled value="{{ App\Helpers\Helper::format_rupiah($tipe_kamar->harga) }}">
                    </div>
                  </div>
            </div>
            <div class="col-md-12">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label text-left">Keterangan</label>
                    <div class="col-sm-9">
                      <textarea type="text" class="form-control" disabled value="" >{{ $tipe_kamar->keterangan }}</textarea>
                    </div>
                  </div>
            </div>
        </div>

        </div>

    </div>
</div>
@endsection
@push('js')
<script src="{{ asset('assets/js/pages-admin/tipe_kamar.js') }}"></script>
@endpush

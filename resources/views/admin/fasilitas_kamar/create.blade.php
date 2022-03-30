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
@section('judul','Tambah Fasilitas Kamar')
@section('breadcrump')
<div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i>
        DASBOARD</a></div>
<div class="breadcrumb-item"> <i class="fas fa-hotel"></i> FASILITAS KAMAR</div>
@endsection
@section('content')
<div class="card">

    <div class="card-body" class="mt-5">
        <form action="{{ route('admin.fasilitas_kamar.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <label for="">Nama Fasilitas</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-bed"></i></div>
                        </div>
                        <input type="text" name="nama_fasilitas" value="{{ old('nama_fasilitas') }}" class="form-control @error('nama_fasilitas')
                            is-invalid
                        @enderror" id="nama_fasilitan" placeholder="Nama Fasilitas">
                        @error('nama_fasilitas')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="">Icon</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <button class="btn btn-secondary btn-iconpicker"  id="btn-iconpicker" ></button>
                        </div>
                        <input type="text" class="form-control @error('icon_fasilitas')
                        is-invalid
                    @enderror" name="icon_fasilitas" value="{{ old('icon_fasilitas') }}"
                            placeholder="fa fa-bars" id="icon_fasilitas">
                        @error('icon_fasilitas')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                </div>
                <div class="col-md-12">
                    <div class="row">
                        <a href="{{ route('admin.fasilitas_kamar.index') }}" class="btn btn-danger mt-2 mb-3 ml-auto mr-2 mt-3 " type="submit">Kembali</a>
                        <button class="btn btn-success mt-2 mb-3 mr-3 mt-3 " type="submit">submit</button>
                    </div>
                </div>
            </div>

        </form>
    </div>

</div>





@endsection
@push('js')
<script>
    $('#btn-iconpicker').iconpicker();
    $('#btn-iconpicker').on('change', function(e) {
        $('#icon_fasilitas').val(e.icon);
    });
</script>
@endpush
{{-- @push('script')
<script src="{{ asset('template/') }}/n ode_modules/select2/dist/js/select2.full.min.js"></script>

@endpush --}}

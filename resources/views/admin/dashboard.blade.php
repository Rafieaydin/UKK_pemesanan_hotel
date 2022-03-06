@extends('template.master')
@section('breadcrump')
<div class="breadcrumb-item "><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
@endsection
@section('judul','Dashboard')
@section('content')
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-primary">
          <i class="fas fa-hotel"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Fasilitas Hotel</h4>
          </div>
          <div class="card-body">
            {{ $f_h }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-danger">
          <i class="fas fa-hotel"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Fasilitas Kamar</h4>
          </div>
          <div class="card-body">
            {{ $f_k }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-warning">
          <i class="fas fa-bed"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Tipe Kamar</h4>
          </div>
          <div class="card-body">
            {{ $t_k }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-success">
          <i class="fas fa-circle"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Kamar</h4>
          </div>
          <div class="card-body">
            {{ $kamar }}
          </div>
        </div>
      </div>
    </div>                  
  </div>
  <div class="card">
    <div class="card-header">
        <h4>Kamar yang tersedia</h4>
      </div>
    <div class="container-fluid mb-3">
        <table class="table" id="table1">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Tipe Kamar</th>
                    <th scope="col">Jumlah</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>
@endsection
@push('js')
<script src="{{ asset('assets/js/pages-admin/dashboard.js') }}"></script>
@endpush
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
            <h4>Total reservasi</h4>
          </div>
          <div class="card-body">
            {{ $total_r }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-danger">
            <i class="fas fa-bed"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Kamar</h4>
          </div>
          <div class="card-body">
            {{ $total_k }}
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
            <h4>Total Kamar tersedia</h4>
          </div>
          <div class="card-body">
            {{ $total_k_tersedia }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-success">
            <i class="fas fa-bed"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Kamar terisi</h4>
          </div>
          <div class="card-body">
            {{ $total_k_terisi }}
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header">
        <h4>Reservasi terkahir</h4>
      </div>
    <div class="container-fluid mb-3">
        <table class="table" id="table1">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Fasilitas Kamar</th>
                    <th scope="col">Nama Pemesan</th>
                    <th scope="col">Email Pemesan</th>
                    <th scope="col">Tanggal Check-in</th>
                    <th scope="col">Tanggal Check-out</th>
                    <th scope="col">jumlah kamar</th>
                    <th scope="col">Harga / malam</th>
                    <th scope="col">Total Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservasi as $item)
                    <tr>
                        <td scope="coll">{{ $loop->iteration }}</td>
                        <td scope="col">{{ $item->tipekamar->nama_tipe }}</td>
                        <td scope="col">{{ $item->nama_pemesan }}</td>
                        <td scope="col">{{ $item->email_pemesan }}</td>
                        <td scope="col">{{ $item->tanggal_checkin->format('d-m-Y') }}</td>
                        <td scope="col">{{ $item->tanggal_checkout->format('d-m-Y') }}</td>
                        <td scope="col">{{ $item->jumlah_kamar }}</td>
                        <td scope="col">{{ App\Helpers\Helper::format_rupiah($item->tipekamar->harga) }}</td>
                        <td scope="col">{{ App\Helpers\Helper::format_rupiah($item->total_harga) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@push('js')
    <script src="{{ asset('assets/js/pages-resepsionis/dashboard.js') }}"></script>
@endpush

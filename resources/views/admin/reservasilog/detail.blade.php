@extends('template.master')
@section('judul','Detail Reservasi')
@section('breadcrump')
        <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item"><i class="fas fa-bed"></i> DATA RESERVASI</div>
@endsection
@section('content')
<a href="{{ route('admin.reservasi.index') }}" class="btn btn-primary mb-2"><i class="fas fa-arrow-left"></i> Kembali</a>
<div class="card">
    <div class="container-fluid   mt-3">
        <h4>Data Reservasi</h4>
        <hr>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label text-center">Kode Booking</label>
                    <div class="col-sm-9">
                      <input type="text"  class="form-control" disabled value="{{ $res->kode_booking }}" >
                    </div>
                  </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label text-center">Tipe Kamar</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" disabled value="{{ $res->tipe }}">
                    </div>
                  </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label text-center">Nama Pemesan</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" disabled value="{{ $res->nama_pemesan }}">
                    </div>
                  </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label text-center">Nama Tamu</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" disabled value="{{ $res->nama_tamu }}">
                    </div>
                  </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label text-center">Email Pmesan </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" disabled value="{{ $res->email_pemesan }}">
                    </div>
                  </div>
            </div>  <div class="col-md-6">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label text-center">No hp pemesan</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" disabled value="{{ $res->nomor_hp_pemesan }}">
                    </div>
                  </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label text-center">Check-in</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" disabled value="{{  $res->tanggal_checkin->format('d-m-Y') }}">
                    </div>
                  </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label text-center">Check-out</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" disabled value="{{  $res->tanggal_checkout->format('d-m-Y') }}">
                    </div>
                  </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label text-center">Jumlah Kamar</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" disabled value="{{ $res->jumlah_kamar }}">
                    </div>
                  </div>
            </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-3 col-form-label text-center">Harga / malam</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" disabled value="{{ App\Helpers\Helper::format_rupiah($res->harga) }}">
                </div>
              </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-3 col-form-label text-center">Total Harga</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" disabled value="{{App\Helpers\Helper::format_rupiah($res->total_harga) }}">
                </div>
              </div>
        </div>
        <div class="col-md-6"></div>
    </div>
        </div>
        
    </div>
</div>
<div class="card">
    <input type="text" class="d-none" id="reservasi_id" value="{{ $res->uuid }}">
    <div class="container-fluid  mt-3">
        <h4>Kamar Yang di booking</h4>
        <hr>
        <input type="text" class="id_kamar d-none" value="">
        <table class="table" id="table3">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tipe</th>
                    <th scope="col">kode kamar</th>
                    <th scope="col">Harga / Malam</th>
                    <th scope="col">checkin</th>
                    <th scope="col">checkout</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach ($res->KamarBooking as $val)
                <tr>
                    <td scope="col">{{ $loop->iteration }}</td>
                    <td scope="col">{{ $res->tipekamar->nama_tipe }}</td>
                    <td scope="col">{{ $val->kamar->kode_kamar }}</td>
                    <td scope="col">{{ $res->jumlah_kamar }}</td>
                    <td scope="col">{{ App\Helpers\Helper::format_rupiah($res->tipekamar->harga) }}</td>
                    <td scope="col">
                        @if($val->status == 'booking')
                        <span class="badge badge-primary">Book</span>
                        @elseif($val->status == 'checkin')
                        <span class="badge badge-success">Check-in</span>
                        @elseif($val->status == 'checkout')
                        <span class="badge badge-danger">Check-out</span>
                        @endif
                    </td>
                    <td scope="col">
                        @if($val->status == 'booking')
                        <button class="btn btn-success">Check-in</button>
                        @elseif($val->status == 'checkin')
                        <button class="btn btn-danger">Check-out</button>
                        @elseif($val->status == 'checkout')
                        <button class="btn btn-danger">Selesai</button>
                        @endif
                    </td>
                </tr>

                @endforeach --}}
            </tbody>
        </table>
    </div>
</div>
@endsection
@push('js')
<script src="{{ asset('assets/js/pages-admin/reservasilog.js') }}"></script>
@endpush

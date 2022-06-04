@extends('template.main')
@section('content')
<section class="py-3 section-1 bg-img mh-100">
    <div class="container py-3 " >
        <p class="room-title text-center judul-section text-center mb-5">Detail Pemesanan</p>
        <a href="{{ route('history') }}" class="btn btn-warning text-white mb-2"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
        <div class="card">
            <div class="container-fluid   mt-3">
                <h4>Data Reservasi</h4>
                <hr>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label text-left">Kode Booking</label>
                            <div class="col-sm-9">
                              <input type="text"  class="form-control" disabled value="{{ $res->kode_booking }}" >
                            </div>
                          </div>
                    </div>
                    <div class="col-md-6 mt-2" >
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label text-left">Tipe Kamar</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" disabled value="{{ $res->tipekamar->nama_tipe }}">
                            </div>
                          </div>
                    </div>
                    <div class="col-md-6 mt-2" >
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label text-left">Nama Pemesan</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" disabled value="{{ $res->nama_pemesan }}">
                            </div>
                          </div>
                    </div>
                    <div class="col-md-6 mt-2" >
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label text-left">Nama Tamu</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" disabled value="{{ $res->nama_tamu }}">
                            </div>
                          </div>
                    </div>
                    <div class="col-md-6 mt-2" >
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label text-left">Email Pmesan </label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" disabled value="{{ $res->email_pemesan }}">
                            </div>
                          </div>
                    </div>  <div class="col-md-6 mt-2" >
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label text-left">No hp pemesan</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" disabled value="{{ $res->nomor_hp_pemesan }}">
                            </div>
                          </div>
                    </div>
                    <div class="col-md-6 mt-2" >
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label text-left">Check-in</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" disabled value="{{  $res->tanggal_checkin->format('d-m-Y') }}">
                            </div>
                          </div>
                    </div>
                    <div class="col-md-6 mt-2" >
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label text-left">Check-out</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" disabled value="{{  $res->tanggal_checkout->format('d-m-Y') }}">
                            </div>
                          </div>
                    </div>
                    <div class="col-md-6 mt-2" >
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label text-left">Jumlah Kamar</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" disabled value="{{ $res->jumlah_kamar }}">
                            </div>
                          </div>
                    </div>
                <div class="col-md-6 mt-2" >
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-left">Harga / malam</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" disabled value="{{ App\Helpers\Helper::format_rupiah($res->tipekamar->harga) }}">
                        </div>
                      </div>
                </div>
                <div class="col-md-6 mt-2" >
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-left">Total Harga</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" disabled value="{{App\Helpers\Helper::format_rupiah($res->total_harga) }}">
                        </div>
                      </div>
                </div>
                <div class="col-md-6 mt-2" ></div>
            </div>
        </div>
        <div class="card mt-4">
            <input type="text" class="d-none" id="reservasi_id" value="{{ $res->uuid }}">
            <div class="container-fluid  mt-3">
                <h4>Kamar Yang di booking</h4>
                <hr>
                <table class="table" id="table3">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tipe</th>
                            <th scope="col">kode kamar</th>
                            {{-- <th scope="col">Jumlah</th> --}}
                            <th scope="col">Harga / kamar</th>
                            <th scope="col">Status</th>
                            {{-- <th scope="col">Action</th> --}}
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
    </div>
</section>

@endsection
@push('js')
<script src="{{ asset('assets/js/pages-tamu/reservasi.js') }}"></script>
@endpush

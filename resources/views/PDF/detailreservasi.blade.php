<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resevarsi Kamar Hotel Aston</title>
    <style>
        .main thead{
            background-color: #30336b;font-weight:bold;color:white;text-align:center
        }

        .main {
            border-collapse: collapse;
        }
        .main td{
            padding: 13px;
            font-size: 13px
        }
    </style>
</head>

<body>
    <div class="invoice" style="width: 100%">
        <table width="500" style="margin-bottom: 15px">
            <tr>
                <td style="color: #130f40;font-weight: bold;font-size:50px">
                    ASTON
                </td>
                <td style="text-align: right">
                    Invoice<br />
                    Tanggal Pembuatan : {{ $reservasi->created_at->isoFormat('DD MMMM YYYY') }}<br />
                </td>
            </tr>
        </table>
        <table width="500" style="margin-bottom: 20px">
            <tr>
                <td>
                    Aston, Inc Aston Inc.<br />
                    Jl. Dreded Mulyaharja, Kec. Bogor<br />
                    Jawa Barat 16132
                </td>
                <td style="text-align: right">
                    Aston.<br />
                    John Doe<br />
                    john@example.com
                </td>
            </tr>
        </table>
        <table width="300" style="margin-bottom: 20px">
            <tr>
                <td>
                    Kode Booking : <br>
                    Nama Pemesan :<br />
                    Nama Tamu :<br />
                    Email Pemesan :<br />
                    No. Telp :<br />
                </td>
                <td>
                    {{ $reservasi->kode_booking }}<br />
                    {{ $reservasi->nama_pemesan }}<br />
                    {{ $reservasi->nama_tamu }}<br />
                    {{ $reservasi->email_pemesan }} <br />
                    {{ $reservasi->nomor_hp_pemesan }}.
                </td>
            </tr>
        </table>
        <table width="100%" class="main">
            <thead>
                <tr >
                    <td style="padding: 10px">
                        Tipe kamar
                    </td>
                    <td>
                        kode kamar
                    </td>
                    <td>
                        check-in
                    </td>
                    <td>
                        check-out
                    </td>
                    <td>
                        Total hari
                    </td>
                    <td>
                        harga / hari
                    </td>
                    <td>
                        Total harga / kamar
                    </td>
                </tr>
            </thead>

            @foreach ($reservasi->KamarBooking as $value)
            @php
                $jumlah_hari = App\Helpers\Helper::getrangedate($reservasi->tanggal_checkin->format('Y-m-d'),$reservasi->tanggal_checkout->format('Y-m-d'));
            @endphp
            <tr style="">
                <td>{{ $reservasi->tipekamar->nama_tipe }}</td>
                <td>{{ $value->kode_kamar  }}</td>
                <td>{{ $reservasi->tanggal_checkin->format('d-m-Y') }}</td>
                <td>{{ $reservasi->tanggal_checkout->format('d-m-Y') }}</td>
                <td>{{ $jumlah_hari }}</td>
                <td>{{ App\Helpers\Helper::format_rupiah($reservasi->tipekamar->harga) }}</td>
                <td>{{ App\Helpers\Helper::format_rupiah(($jumlah_hari*$reservasi->tipekamar->harga)) }}</td>
            </tr>

            @endforeach
            <tr style="background-color: #30336b;font-weight:bold;color:white;text-align:center">
                <td>
                </td>
                <td>
                </td>
                <td>
                </td>
                <td>
                </td>
                <td>
                </td>
                <td>
                </td>
                <td>
                    Total harga
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                </td>
                <td></td>
                <td>{{ App\Helpers\Helper::format_rupiah($reservasi->total_harga) }}</td>
            </tr>

        </table>
        <table width="100%">

        </table>
    </div>
</body>

</html>

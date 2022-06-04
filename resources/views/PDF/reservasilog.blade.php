<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Log Reservasi Hotel aston bogor</title>
    <style>
        th,
        td {
            border: 1px solid black;
            font-size: 13px;
        }

        th {
            background-color: #130f40;
            color: white;
            height: 30px;
        }

    </style>
</head>

<body>
    <div style="text-align: center;font-size:30px;font-weight:bold;color:#130f40;text-transform:uppercase">Laporan Log Reservasi</div>
    <div style="text-align: center;font-size:30px;font-weight:bold;color:#130f40;text-transform:uppercase">Hotel Aston
        Bogor</div>
    <table width="500" style="border-collapse: collapse;margin-top:30px;">
        <thead>
            <tr>
                <th>#</th>
                <th>Tipe kamar</th>
                <th>Nama Pemesan</th>
                <th>Email Pemesan</th>
                <th>No Hp Pemesan</th>
                <th>Tanggal Check-in</th>
                <th>Tanggal Check-out</th>
                <th>jumlah kamar</th>
                <th>Harga / malam</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservasilog as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->tipe }}</td>
                <td>{{ $item->nama_pemesan }}</td>
                <td>{{ $item->email_pemesan }}</td>
                <td>{{ $item->nomor_hp_pemesan }}</td>
                <td>{{ $item->tanggal_checkin->format('d-m-Y') }}</td>
                <td>{{ $item->tanggal_checkout->format('d-m-Y') }}</td>
                <td>{{ $item->jumlah_kamar }}</td>
                <td>{{ App\Helpers\Helper::format_rupiah($item->harga) }}</td>
                <td>{{ App\Helpers\Helper::format_rupiah($item->total_harga) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>

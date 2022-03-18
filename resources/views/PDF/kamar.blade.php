<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan kamar Hotel Aston bogor</title>
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
    <div style="text-align: center;font-size:30px;font-weight:bold;color:#130f40;text-transform:uppercase">Laporan kamar</div>
    <div style="text-align: center;font-size:30px;font-weight:bold;color:#130f40;text-transform:uppercase">Hotel Aston
        Bogor</div>
    <table width="500" style="border-collapse: collapse;margin-top:30px;">
        <thead>
            <tr>
                <th style="width: 30px">#</th>
                <th>Tipe</th>
                <th>kode kamar</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kamar as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->tipekamar->nama_tipe }}</td>
                <td>{{ $item->kode_kamar }}</td>
                <td>{!! $item->status == 0 ? '<span class="badge badge-success">Tersedia</span>' : '<span class="badge badge-danger">Tidak Tersedia</span>' !!}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>

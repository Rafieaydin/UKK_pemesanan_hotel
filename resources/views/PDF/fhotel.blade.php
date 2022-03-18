<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fasilitas Hotel Aston bogor</title>
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
    <div style="text-align: center;font-size:30px;font-weight:bold;color:#130f40;text-transform:uppercase">Fasilitas Hotel</div>
    <div style="text-align: center;font-size:30px;font-weight:bold;color:#130f40;text-transform:uppercase">Hotel Aston
        Bogor</div>
    <table width="500" style="border-collapse: collapse;margin-top:30px;">
        <thead>
            <tr>
                <th style="width: 30px">#</th>
                <th>Fasilitas Hotel</th>
                <th>Keterangan</th>
                <th>gambar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fhotel as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_fasilitas }}</td>
                <td>{{ $item->keterangan }}</td>
                <td><img src='{{ public_path("assets/images/".$item->gambar) }}' style="width: 100px;" alt=""></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>

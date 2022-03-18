<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tipe-tipe Kamar Aston bogor</title>
    <style>
        th,td{
            border: 1px solid black;
            font-size: 15px;
        }
        th{
            background-color: #130f40;
            color: white;
            height: 30px;
        }
    </style>
</head>

<body>
    <div style="text-align: center;font-size:30px;font-weight:bold;color:#130f40;text-transform:uppercase" >Tipe-tipe Kamar</div>
    <div style="text-align: center;font-size:30px;font-weight:bold;color:#130f40;text-transform:uppercase" >Hotel Aston Bogor</div>
    <table width="520" style="border-collapse: collapse;margin-top:30px;">
        <thead>
            <tr>
                <th style="width: 20px">#</th>
                <th>Tipe Kamar</th>
                <th>Gambar</th>
                <th>Kamar tersedia</th>
                <th>Kamar booking</th>
                <th>Harga / malem</th>
                <th>keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tipekamar as $value)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $value->nama_tipe }}</td>
                <td><img src='{{ public_path("assets/images/".$value->gambar) }}' style="width: 100px" alt=""></td>
                <td>{{ $value->total_jumlah_kamar_tersedia }}</td>
                <td>{{ $value->total_jumlah_kamar_booking }}</td>
                <td>{{ App\Helpers\Helper::format_rupiah($value->harga) }}</td>
                <td>{{ $value->keterangan }}</td>
        </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>

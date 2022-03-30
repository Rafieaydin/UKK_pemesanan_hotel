<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Table Data Tamu</title>
    <style>
        th,td{
            border: 1px solid black;
        }
        th{
            background-color: #130f40;
            color: white;
            height: 30px;
        }
    </style>
</head>

<body>
    <div style="text-align: center;font-size:30px;font-weight:bold;color:#130f40;text-transform:uppercase" >Data Tamu</div>
    <div style="text-align: center;font-size:30px;font-weight:bold;color:#130f40;text-transform:uppercase" >Hotel Aston Bogor</div>
    <table width="525" style="border-collapse: collapse;margin-top:30px;">
        <thead>
            <tr>
                <th>#</th>
                <th>username</th>
                <th>nama resepsioni</th>
                <th>Email</th>
                <th>Jenis Kelamin</th>
                <th>No telp</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tamu as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->username }}</td>
                <td>{{ $item->nama_resepsionis }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->jk }}</td>
                <td>{{ $item->no_hp }}</td>
                <td>{{ $item->alamat }}</td>
        </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>

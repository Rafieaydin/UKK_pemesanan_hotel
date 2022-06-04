<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Table Data admin</title>
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
    <div style="text-align: center;font-size:30px;font-weight:bold;color:#130f40;text-transform:uppercase" >Data Admin</div>
    <div style="text-align: center;font-size:30px;font-weight:bold;color:#130f40;text-transform:uppercase" >Hotel Aston Bogor</div>
    <table width="500" style="border-collapse: collapse;margin-top:30px;">
        <thead>
            <tr>
                <th>id</th>
                <th>username</th>
                <th>email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admin as $item)
            <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->username }}</td>
            <td>{{ $item->email }}</td>
        </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>

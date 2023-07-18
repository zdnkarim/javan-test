<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div>
        <div style="margin: 10px">
            <a href="/">Home</a>
            <a href="/add" style="margin-left: 10px">Tambah Keluarga</a>
            <a href="/challange/3" style="margin-left: 10px">Soal no. 3</a>
            <a href="/challange/4" style="margin-left: 10px">Soal no. 4</a>
            <a href="/challange/5" style="margin-left: 10px">Soal no. 5</a>
            <a href="/challange/6" style="margin-left: 10px">Soal no. 6</a>
            <a href="/challange/7" style="margin-left: 10px">Soal no. 7</a>
            <table border="1" style="margin-top: 10px">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Orang Tua</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $data)
                        <tr>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->gender }}</td>
                            <td>{{ $data->child_of }}</td>
                            <td>
                                <a href="/edit/{{ $data->id }}">Edit</a>
                                <a href="/delete/{{ $data->id }}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>

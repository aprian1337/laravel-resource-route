<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<body>
    <div class="container-fluid">
        <table class="table table-hover table-bordered">
            <tr>
                <th>Kode Pembeli</th>
                <th>Nama Pembeli</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Kota</th>
            </tr>
            @foreach($pembeli as $data)
            <tr>
                <td>{{$data->KD_PEMBELI}}</td>
                <td>{{$data->NM_PEMBELI}}</td>
                <td>{{$data->JENIS_KELAMIN}}</td>
                <td>{{$data->ALAMAT}}</td>
                <td>{{$data->KOTA}}</td>
            </tr>
            @endforeach
        </table>
    </div>
</body>

</html>

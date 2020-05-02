<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/data-table/DataTables-1.10.20/css/jquery.dataTables.min.css')}}">
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
        <div class="container">
            <a class="navbar-brand" href="#">Akurapopo's</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Product</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Customer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Transaction</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Account
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <span class="dropdown-header">Hi, {{auth()->user()->name}}</span>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item small" href="logout">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container">
        @if(session('insertData'))
        <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
            <strong>Data berhasil dimasukkan!</strong> Silakan anda cek tabel di bawah ini.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="row mt-4">
            <div class="col-md-6">
                <h1>Table Customer</h1>
            </div>
            <div class="col-md-6">
                <button type="button" class="btn btn-success btn-sm float-right mt-2" data-toggle="modal"
                    data-target="#insertModal"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp; Tambah data
                    baru</button>
            </div>
        </div>
        <div class="row justify-content-center mt-2">
            <div class="col-md">
                <table class="table table-striped table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nama Pembeli</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Kota</th>
                            <th scope="col" class="text-center">Terakhir update</th>
                            <th scope="col" colspan="2" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pembeli as $data)
                        <tr>
                            <td>{{$data->KD_PEMBELI}}</td>
                            <td>{{$data->NM_PEMBELI}}</td>
                            <td>{{$data->JENIS_KELAMIN}}</td>
                            <td>{{$data->ALAMAT}}</td>
                            <td>{{$data->KOTA}}</td>
                            <td class="text-center">{{$data->created_at}}</td>
                            <td>
                                <div class="text-center">
                                    <button type="button" class="btn btn-outline-warning btn-sm" data-toggle="modal"
                                        data-target="#edit-Modal" data-whatever="@edit">Ubah</button>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                    <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal"
                                        data-target="#deleteModal" data-whatever="@delete">Hapus</button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- MODALLLLLLLL -->

    <!-- INSERT MODAL -->

    <div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah data baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="customer/insert" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nama Pembeli :</label>
                            <input type="text" class="form-control" name="NM_PEMBELI" value="">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Jenis Kelamin :</label>
                            <select name="JENIS_KELAMIN" class="form-control">
                                <option selected>Pilih..</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Kota :</label>
                            <input type="text" name="KOTA" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Alamat :</label>
                            <textarea type="text" name="ALAMAT" class="form-control" rows="2"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah data</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary">Tambah data</button>
                </div>
            </div>
        </div>
    </div>

    <!-- EDIT MODAL -->

    <div class="modal fade" id="edit-Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nama Pembeli :</label>
                            <input type="text" class="form-control" name="NM_PEMBELI" id="modal-input-name">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Jenis Kelamin :</label>
                            <select name="JENIS_KELAMIN" class="form-control">
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Alamat :</label>
                            <input type="text" name="ALAMAT" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Kota :</label>
                            <input type="text" name="KOTA" class="form-control">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary">Ubah sekarang</button>
                </div>
            </div>
        </div>
    </div>

    <!-- DELETE MODAL -->

    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Hapus data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah benar anda ingin menghapus data ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger">Ya, hapus</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('vendor/jquery/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/popper.min.js')}}"></script>
    <script type="text/javascript" charset="utf8" src="{{asset('vendor/data-table/DataTables-1.10.20/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript">
       $(document).ready( function(){
           $('#myTable').DataTable();
       });
    </script>

</body>

</html>

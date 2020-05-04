<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- SCRIPT SOURCE -->
    <script src="{{asset('/vendor/jquery/jquery-3.4.1.min.js')}}"></script>
    <script type="text/javascript" charset="utf8"
        src="{{asset('vendor/data-table/DataTables-1.10.20/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" charset="utf8"
        src="{{asset('vendor/data-table/DataTables-1.10.20/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('/vendor/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('/vendor/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- CSS SOURCE -->
    <link rel="stylesheet" href="{{asset('/vendor/bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/data-table/DataTables-1.10.20/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/font-awesome/css/all.css')}}">
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
                        <a class="nav-link @yield('home-active')" href="/">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('product-active')" href="/product">Product</a>
                    </li>
                    <li class="nav-item @yield('customer-active')">
                        <a class="nav-link" href="/customer">Customer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('transaction-active')" href="/transaction">Transaction</a>
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
    <div class="container mb-5">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
            {!!@session('success')!!}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        <div class="mt-4"></div>
        <div class="row mb-2">
            <div class="col-6">
                <h1>Table @yield('header-tabel')</h1>
            </div>
            <div class="col-6">
                <button type="button" class="btn btn-info btn-sm float-right mt-2" data-toggle="modal"
                    data-target="#insertModal"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp; Tambah data
                    baru</button>
            </div>
        </div>

        @yield('tabel')


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
                    <form action="customer" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nama Pembeli :</label>
                            <input type="text" class="form-control" name="nm_pembeli" value="">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Jenis Kelamin :</label>
                            <select name="jenis_kelamin" class="form-control">
                                <option selected>Pilih..</option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Alamat :</label>
                            <textarea type="text" name="alamat" class="form-control" rows="2"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Kota :</label>
                            <input type="text" name="kota" class="form-control">
                        </div>

                        <!-- <button type="submit" class="btn btn-primary">Tambah data</button> -->

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah data</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- EDIT MODAL -->

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                    <form action="/customer" method="POST" id="editForm">
                        @csrf
                        @method('put')

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nama Pembeli :</label>
                            <input type="text" class="form-control" name="nm_pembeli" id="modal-input-nama">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Jenis Kelamin :</label>
                            <select name="jenis_kelamin" class="form-control" id="modal-input-gender">
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Alamat :</label>
                            <input type="text" name="alamat" class="form-control" id="modal-input-alamat">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Kota :</label>
                            <input type="text" name="kota" class="form-control" id="modal-input-kota">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Ubah sekarang</button>
                </div>
                </form>
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

                <form action="/customer" method="POST" id="deleteForm">
                    <div class="modal-body">
                        @csrf
                        @method('delete')
                        <p>Apakah benar anda ingin menghapus data ini?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Ya, hapus</button>
                    </div>
                </form>

            </div>
        </div>
    </div>


    <!-- SCRIPT DATA TABLES -->
    <script type="text/javascript">
        $(document).ready(function () {
            var table = $('.myTable').DataTable();
            // EDIT DATA
            table.on('click', '.edit', function () {
                $tr = $(this).closest('tr');
                if ($($tr).hasClass('child')) {
                    $tr = $tr.prev('.parent');
                }

                var data = table.row($tr).data();
                console.log(data);

                $('#modal-input-nama').val(data[1]);
                $('#modal-input-gender').val(data[2]);
                $('#modal-input-alamat').val(data[3]);
                $('#modal-input-kota').val(data[4]);

                $('#editForm').attr('action', '/customer/' + data[0]);
                $('#editModal').modal('show');
            });

            // DELETE DATA
            table.on('click', '.delete', function () {
                $tr = $(this).closest('tr');
                if ($($tr).hasClass('child')) {
                    $tr = $tr.prev('.parent');
                }

                var data = table.row($tr).data();
                console.log(data);

                $('#deleteForm').attr('action', '/customer/' + data[0]);
                $('#deleteModal').modal('show');
            });


        });

    </script>

</body>

</html>
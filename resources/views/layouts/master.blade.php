<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('type') | Akurapopo's</title>

    <!-- SCRIPT SOURCE -->
    <script src="vendor/jquery/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" charset="utf8"
        src="vendor/data-table/DataTables-1.10.20/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8"
        src="vendor/data-table/DataTables-1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="vendor/bootstrap/js/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>

    <!-- CSS SOURCE -->
    <link rel="stylesheet" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="vendor/data-table/DataTables-1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="vendor/font-awesome/css/all.css">
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/custom.css">
</head>
<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
        <div class="container">
            <a class="navbar-brand" href="/">Akurapopo's</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item">
                        <a class="nav-link @yield('home-active')" href="/dashboard">Dashboard
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
                <h1>Table @yield('type')</h1>
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
                    <form action="@yield('url')" method="POST">
                        @csrf
                        @yield('modalFormInsert')
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Tambah data</button>
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

                    <form action="@yield('url')" method="POST" id="editForm">
                        @csrf
                        @method('put')

                        @yield('modalFormEdit')
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Ubah sekarang</button>
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

                <form action="@yield('url')" method="POST" id="deleteForm">
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


       <!-- START FOOTER -->
       <footer class="page-footer font-small indigo">

        <!-- Footer Links -->
        <div class="container">

            <!-- Grid row-->
            <div class="row text-center d-flex justify-content-center pt-5 mb-3">

                <!-- Grid column -->
                <!-- Grid column -->
            </div>
            <!-- Grid row-->
            <hr class="rgba-white-light" style="margin: 0 15%;">

            <!-- Grid row-->
            <div class="row d-flex text-center justify-content-center mb-md-0 mb-4">

                <!-- Grid column -->

                <!-- Grid column -->

            </div>
            <!-- Grid row-->
            <hr class="clearfix d-md-none rgba-white-light" style="margin: 10% 15% 5%;">

            <!-- Grid row-->
            <div class="row pb-3">

                <!-- Grid column -->
                <div class="col-md-12">

                    <div class="mb-5 flex-center">

                    </div>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row-->

        </div>
        <!-- Footer Links -->

        <!-- Copyright -->
        <footer class="footer-distributed">

            <div class="footer-left">
                <h3>Aku<span>Rapopo's</span></h3>

                <p class="footer-links">
                    <a href="#">Product</a>
                    |
                    <a href="#">Customer</a>
                    |
                    <a href="#">Transaction</a>
                </p>

                <p class="footer-company-name">&copy; 2020 Akurapopo's</p>
            </div>

            <div class="footer-center">
                <div>
                    <i class="fa fa-map-marker"></i>
                    <p>Kota Malang</p>
                </div>

                <div>
                    <i class="fa fa-phone"></i>
                    <p>+62 857-1209-2239</p>
                </div>
                <div>
                    <i class="fa fa-envelope"></i>
                    <p><a href="#">support@akurapopo.com</a></p>
                </div>
            </div>
            <div class="footer-right">
                <p class="footer-company-about">
                    <span>About the company</span>
                    Akurapopo's menjual berbagai produk dengan harga murah, kualiatas terjamin dan pelayanan ramah.</p>
                <div class="social-icons">
                    <a class="social-icon social-icon--twitter" data-toggle="tooltip" data-placement="bottom"
                        title="Twitter">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a class="social-icon social-icon--instagram" data-toggle="tooltip" data-placement="bottom"
                        title="Instagram">
                        <i class="fa fa-instagram"></i>
                    </a>
                    <a class="social-icon social-icon--facebook" data-toggle="tooltip" data-placement="bottom"
                        title="Facebook">
                        <i class="fa fa-facebook"></i>
                    </a>
                </div>
            </div>
        </footer>
        <!-- Copyright -->

    </footer>
    <!-- END FOOTER -->

    @yield('datatables')

</body>

</html>

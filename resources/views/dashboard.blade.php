<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Akurapopo's</title>

    <!-- SOURCES CSS -->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">

    <!-- SOURCES JAVASCRIPT -->
    <script src="vendor/jquery/jquery-3.4.1.min.js"></script>
    <script src="vendor/bootstrap/js/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

</head>

<body>

    <!-- START NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
        <div class="container">
            <a class="navbar-brand" href="#">Akurapopo's</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="product">Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="customer">Customer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="transaction">Transaction</a>
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
    <!-- END NAVBAR -->

    <!-- START HEADER -->
    <header>
        <div class="container text-center">
            @if(session('login'))
            <div class="alert alert-success" role="alert">
                Selamat anda berhasil login, sebagai {{auth()->user()->name}}
            </div>
            @endif
            <div class="jumbotron" style="height: 400px; padding-top: 150px;">
                <center>
                    <h2>W E L C O M E</h2>
                    {{auth()->user()->name}}
                </center>
            </div>
        </div>

    </header>
    <!-- END HEADER -->

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
                    <a class="social-icon social-icon--twitter" data-toggle="tooltip" data-placement="bottom" title="Twitter">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a class="social-icon social-icon--instagram" data-toggle="tooltip" data-placement="bottom" title="Instagram">
                        <i class="fa fa-instagram"></i>
                    </a>
                    <a class="social-icon social-icon--facebook" data-toggle="tooltip" data-placement="bottom" title="Facebook">
                        <i class="fa fa-facebook"></i>

                    </a>
                </div>
            </div>
        </footer>
        <!-- Copyright -->

    </footer>
    <!-- END FOOTER -->

    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Halaman Masuk | Akurapopo'<s></s></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/font-awesome/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                @if(session('login'))
                <div class="alert alert-danger" role="alert">
                    Username atau password yang anda masukkan kurang benar.
                </div>
                @endif
                <div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
                    <span class="login100-form-title-1">
                        Halaman Masuk
                    </span>
                </div>

                <form class="login100-form validate-form" action="login" method="POST">
                    @csrf
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Username harus diisi!">
                        <span class="label-input100">Username</span>
                        <input class="input100" type="text" name="username" placeholder="Masukkan username">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-18" data-validate="Password harus diisi!">
                        <span class="label-input100">Password</span>
                        <input class="input100" type="password" name="password" placeholder="Masukkan password">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.4.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>
    <!--===============================================================================================-->

</body>

</html>

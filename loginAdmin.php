<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/loginAssets/fonts/icomoon/style.css">
    <link rel="stylesheet" href="./assets/loginAssets/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/loginAssets/css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css" rel="stylesheet">
    </link>
    <title>Login Admin</title>
</head>

<?php
session_start();
$isLogin = $_SESSION['isLogin'] ?? "";
if ($isLogin === "logged") {
    header('location: admin.php');
}
$status = $_SESSION['status'] ?? '';
?>

<body>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="./assets/loginAssets/images/undraw_remotely_2j6y.svg" alt="Image" class="img-bg" style="width: 90%;">
                </div>
                <div class="col-md-6 mt-4 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <h3>Sign In</h3>
                                <p class="mb-4">Login dahulu untuk mengakses halaman administrator.</p>
                            </div>
                            <form action="./auth/proses_login.php?type=login" method="post">
                                <div class="form-group first">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" name="username">
                                </div>
                                <div class="form-group last mb-5">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password">
                                </div>
                                <div class="mt-4"></div>
                                <input type="submit" value="Log In" class="btn btn-block btn-primary">
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <script src="./assets/loginAssets/js/jquery-3.3.1.min.js"></script>
    <script src="./assets/loginAssets/js/popper.min.js"></script>
    <script src="./assets/loginAssets/js/bootstrap.min.js"></script>
    <script src="./assets/loginAssets/js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>

    <?php if ($status == 'gagal') { ?>
        <script>
            swal({
                title: "Login Gagal!",
                type: "error",
                text: 'email/password salah',
                timer: 2000,
                showConfirmButton: false,
                showCancelButton: false
            });
        </script>
    <?php } ?>

    <?php unset($_SESSION['status']); ?>
</body>

</html>
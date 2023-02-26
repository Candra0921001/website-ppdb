<!DOCTYPE html>
<html lang="en">

<head>
    <title>PPDB SMAN 1 SUTOJAYAN</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/landingAssets/css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="assets/landingAssets/css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css" rel="stylesheet">
    </link>
</head>

<?php
session_start();
$isLogin = $_SESSION['isLoginUser'] ?? "";
if ($isLogin === "logged") {
    header('location: user.php');
}
$status = $_SESSION['status'] ?? '';
?>

<body>
    <div class="intro-section">
        <div class="slide-1" style="background-image: url('assets/landingAssets/images/hero_1.jpg');">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 kartu-1">
                        <h1>PPDB SMAN 1 SUTOJAYAN</h1>
                        <p class="mb-4">Isi formulir dengan mendaftarkan akun terlebih dahulu, lalu login dan isikan formulir pendaftaran serta data diri pada halaman dashboard.</p>
                        <p><a href="index.php" class="btn btn-primary py-3 px-5 btn-pill">Registrasi Akun</a></p>
                    </div>
                    <div class="col-lg-5 ml-auto kartu-2">
                        <form action="auth/proses_login.php?type=loginuser" method="post" class="form-box">
                            <h3 class="h4 text-black mb-4">Login Akun</h3>
                            <div class="form-group">
                                <input type="text" class="form-control" name="username" placeholder="Alamat Email" require>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password" require>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-pill" value="Sign In">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
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

</html>
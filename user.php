<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>User Dashboard</title>
    <!-- css -->
    <link rel="stylesheet" href="./assets/css/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="./assets/css/vendors/iconfonts/puse-icons-feather/feather.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/dataTables.bootstrap4.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css" rel="stylesheet">
    </link>
</head>

<?php
session_start();
include "koneksi.php";
include "./services/baseUrl.php";
$status = $_SESSION['status'] ?? '';
$isLogin = $_SESSION['isLoginUser'] ?? "";
if ($isLogin != "logged") {
    header('location: loginUser.php');
}
$id_siswa = $_SESSION['id_siswa'];
$nama = $_SESSION['nama'];
$email = $_SESSION['email'];
?>

<body>
    <div class="container-scroller">
        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
                <a class="navbar-brand brand-logo" style="color: rgb(34, 34, 34)" href="home.html">
                    SMAN 1 SUTOJAYAN
                </a>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="icon-menu" style="color: white;"></span>
                </button>
            </div>

            <div class="navbar-menu-wrapper d-flex align-items-center">
                <button class="navbar-toggler navbar-toggler-right align-self-center d-sm-none d-md-none ml-2" type="button" data-toggle="offcanvas">
                    <div class="row">
                        <span class="icon-menu" style="color: white"></span>
                    </div>
                </button>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item dropdown d-xl-inline-block">
                        <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                            <span class="profile-text">Hello, <?php echo $nama ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                            <a class="dropdown-item" href="auth/proses_login.php?type=logoutuser">
                                <i class="mdi mdi-logout-variant text-danger"></i> Sign Out
                            </a>
                        </div>
                    </li>
                </ul>

            </div>
        </nav>

        <div class="container-fluid page-body-wrapper">
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item nav-profile">
                        <div class="nav-link">
                            <div class="user-wrapper">
                                <div class="profile-image">
                                    <img src="http://sman1sutojayan.sch.id/media_library/posts/post-image-1586927105641.png" alt="profile image">
                                </div>
                                <div class="text-wrapper">
                                    <p class="profile-name"><?php echo $nama ?></p>
                                    <div>
                                        <small class="designation text-muted" style="text-transform: uppercase;letter-spacing: 1px;">User</small>
                                        <span class="status-indicator online"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item" id="homeNav">
                        <a class="nav-link" href="user.php">
                            <i class="menu-icon mdi mdi-television"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user.php?page=form">
                            <i class="menu-icon mdi mdi-account-card-details"></i>
                            <span class="menu-title">Formulir Pendaftaran</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user.php?page=form1">
                            <i class="menu-icon mdi mdi-account-card-details"></i>
                            <span class="menu-title">Formulir Data Orang Tua</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user.php?page=form2">
                            <i class="menu-icon mdi mdi-account-card-details"></i>
                            <span class="menu-title">Formulir Prestasi</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user.php?page=akun">
                            <i class="menu-icon mdi mdi-account-settings-variant"></i>
                            <span class="menu-title">Pengaturan Akun</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <div class="main-panel">
                <div class="content-wrapper">
                    <?php include "./services/userConfig.php"; ?>
                </div>
                <footer class="footer">
                    <div class="container-fluid clearfix">
                        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2020
                            All rights reserved.</span>
                    </div>
                </footer>
            </div>
        </div>
    </div>

    <!-- js -->
    <script src="./assets/css/vendors/js/vendor.bundle.base.js"></script>
    <script src="./assets/js/off-canvas.js"></script>
    <script src="./assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="./assets/js/menu.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
</body>

<?php if ($status == 'sukses') { ?>
    <script>
        swal({
            title: "Berhasil!",
            type: "success",
            text: 'Redirecting...',
            timer: 2000,
            showConfirmButton: false,
            showCancelButton: false
        }).then(function() {
            window.location.reload();
        })
    </script>
<?php } else if ($status == 'gagal') { ?>
    <script>
        swal({
            title: "Gagal!",
            type: "error",
            text: 'Redirecting...',
            timer: 2000,
            showConfirmButton: false,
            showCancelButton: false
        });
    </script>
<?php } ?>

<?php unset($_SESSION['status']); ?>

</html>
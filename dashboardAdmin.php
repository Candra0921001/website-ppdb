<?php

$countSql = "SELECT count(1) FROM siswa";
$countexec = $koneksi->query($countSql);
$count = $countexec->fetch_array();
$totalDaftar = $count[0];

$countV = "SELECT count(1) FROM formulir_pendaftaran WHERE status_siswa = 'sudah isi'";
$countexecV = $koneksi->query($countV);
$countVC = $countexecV->fetch_array();
$totalV = $countVC[0];

$countVe = "SELECT count(1) FROM formulir_pendaftaran WHERE status_siswa = 'verified'";
$countexecVe = $koneksi->query($countVe);
$countVeC = $countexecVe->fetch_array();
$totalVe = $countVeC[0];

?>

<div class="row">
    <!-- awal  -->
    <div class="col-sm-12 grid-margin stretch-card">
        <div class="card" style="
      background-image: url('https://i.ibb.co/HYjgFNc/image-1.jpg')
      ; background-size: 100%">
            <div class="card-body">
                <div class="clearfix">
                    <div class="float-right">
                        <h4 class="mb-0 text-right text-light">Selamat Datang!</h4>
                        <div class="fluid-container">
                            <h3 class="font-weight-medium text-right mt-2 mb-0" style="color: #7bff61">
                                <?php echo $username ?>
                            </h3>
                            <h5 class="mt-3 text-right mb-0 ahref"><a href="admin.php?page=siswa" style="text-decoration:none; color: #c7fffd">lihat pendaftar
                                    &nbsp;<i><span class="mdi mdi-arrow-right-drop-circle-outline"></span></i></a></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- akhir  -->

    <!-- awal  -->
    <div class="col-sm-6 grid-margin stretch-card">
        <div class="card card-statistics">
            <a style="text-decoration:none; color: grey">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <i class="mdi mdi-account-location text-info icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <p class="mb-0 text-right" style="color: black">Jumlah Pendaftar</p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0" style="color: black">
                                    <?php echo $totalDaftar ?>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted mt-3 mb-0">
                        <i class="mdi mdi-account text-info mr-1" aria-hidden="true"></i> Total jumlah pendaftar
                    </p>
                </div>
            </a>
        </div>
    </div>
    <!-- akhir  -->

    <!-- awal  -->
    <div class="col-sm-6 grid-margin stretch-card">
        <div class="card card-statistics">
            <a style="text-decoration:none; color: grey">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <i class="mdi mdi-account-card-details text-danger icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <p class="mb-0 text-right" style="color: black">Jumlah Belum Isi Formulir</p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0" style="color: black">
                                    <?php echo ($totalDaftar - ($totalV + $totalVe)) ?>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted mt-3 mb-0">
                        <i class="mdi mdi-account text-danger mr-1" aria-hidden="true"></i> Total jumlah yang belum isi formulir
                    </p>
                </div>
            </a>
        </div>
    </div>
    <!-- akhir  -->

    <!-- awal  -->
    <div class="col-sm-6 grid-margin stretch-card">
        <div class="card card-statistics">
            <a style="text-decoration:none; color: grey">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <i class="mdi mdi-eye text-warning icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <p class="mb-0 text-right" style="color: black">Jumlah Butuh Verifikasi</p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0" style="color: black">
                                    <?php echo $totalV ?>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted mt-3 mb-0">
                        <i class="mdi mdi-account text-warning mr-1" aria-hidden="true"></i> Total jumlah yang butuh diverifikasi
                    </p>
                </div>
            </a>
        </div>
    </div>
    <!-- akhir  -->

    <!-- awal  -->
    <div class="col-sm-6 grid-margin stretch-card">
        <div class="card card-statistics">
            <a style="text-decoration:none; color: grey">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <i class="mdi mdi-checkbox-marked-circle text-success icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <p class="mb-0 text-right" style="color: black">Jumlah Sudah Terverifikasi</p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0" style="color: black">
                                    <?php echo $totalVe ?>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted mt-3 mb-0">
                        <i class="mdi mdi-account text-success mr-1" aria-hidden="true"></i> Total jumlah yang sudah terverifikasi
                    </p>
                </div>
            </a>
        </div>
    </div>
    <!-- akhir  -->
</div>
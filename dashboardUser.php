<?php

$sql = "SELECT * FROM `formulir_pendaftaran` WHERE `id_siswa` = $id_siswa";
$query = $koneksi->query($sql);
$data = $query->fetch_array();
$statusdata = $data['status_siswa'] ?? "";

$countSql = "SELECT count(1) FROM siswa";
$countexec = $koneksi->query($countSql);
$count = $countexec->fetch_array();
$totalDaftar = $count[0];

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
                                <?php echo $nama ?>
                            </h3>
                            <h5 class="mt-3 text-right mb-0 ahref"><a href="user.php?page=akun" style="text-decoration:none; color: #c7fffd">lihat akun
                                    &nbsp;<i><span class="mdi mdi-arrow-right-drop-circle-outline"></span></i></a></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- akhir  -->

    <!-- awal  -->
    <div class="col-sm-12 grid-margin stretch-card">
        <div class="card card-statistics">
            <a style="text-decoration:none; color: grey">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <i class="mdi mdi-file-document-box text-primary icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0" style="color: black">
                                    Formulir Pendaftaran
                                </h3>
                                <p class="mb-0 mt-2 text-right" style="color: black">formulir PPDB SMAN 1 SUTOJAYAN</p>
                            </div>
                            <p class="text-right">
                                <?php if ($statusdata == "sudah isi") { ?>
                                   <button class="btn btn-success mt-3">
                                    <i class="mdi mdi-checkbox-marked-circle mr-1" aria-hidden="true"></i> sudah isi formulir
                                </button>
                                <?php } else if ($statusdata == "verified") { ?>
                                    <a href="formPrint.php?id=<?php echo $id_siswa ?>" class="btn btn-success mt-3">
                                        <i class="mdi mdi-file-outline mr-1" aria-hidden="true"></i> cetak bukti pendaftaran
                                    </a>
                                <?php } else { ?>
                                    <a class="btn btn-primary mt-3" href="user.php?page=form">
                                        <i class="mdi mdi-lead-pencil mr-1" aria-hidden="true"></i> isi formulir sekarang
                                    </a>
                                <?php } ?>
                            </p>
                        </div>
                    </div>
                    <p class="text-muted" style="margin-top: -35px;">
                        <i class="mdi mdi-pin mr-1 text-danger" aria-hidden="true"></i> isi formulir dengan teliti dan benar
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
                            <i class="mdi mdi-account-location text-info icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <p class="mb-0 text-right" style="color: black">Jumlah Pendaftar</p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0" style="color: black">
                                    <?php echo $totalDaftar?>
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
                            <?php
                            if ($statusdata == "sudah isi") {
                                echo '<i class="mdi mdi-eye text-warning icon-lg"></i>';
                            } else if ($statusdata == "verified") {
                                echo '<i class="mdi mdi-checkbox-marked-circle text-success icon-lg"></i>';
                            } else {
                                echo '<i class="mdi mdi-account-card-details text-danger icon-lg"></i>';
                            }
                            ?>
                        </div>
                        <div class="float-right">
                            <?php
                            if ($statusdata == "sudah isi") {
                                echo '<p class="mb-0 text-right" style="color: black">formulir pendaftaran masih tahap review</p>
                                <div class="fluid-container">
                                    <h3 class="font-weight-medium text-right mb-0" style="color: black">
                                        direview
                                    </h3>
                                </div>';
                            } else if ($statusdata == "verified") {
                                echo '<p class="mb-0 text-right" style="color: black">formulir pendaftaran sudah diverifikasi</p>
                                <div class="fluid-container">
                                    <h3 class="font-weight-medium text-right mb-0" style="color: black">
                                        terverifikasi
                                    </h3>
                                </div>';
                            } else {
                                echo '<p class="mb-0 text-right" style="color: black">formulir pendaftaran belum diisi</p>
                                <div class="fluid-container">
                                    <h3 class="font-weight-medium text-right mb-0" style="color: black">
                                        -
                                    </h3>
                                </div>';
                            }
                            ?>
                        </div>
                    </div>
                    <p class="text-muted mt-3 mb-0">
                        <i class="mdi mdi-checkbox-blank-circle mr-1 text-success" aria-hidden="true"></i> status pendaftaran saat ini
                    </p>
                </div>
            </a>
        </div>
    </div>
    <!-- akhir  -->
</div>
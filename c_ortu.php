<?php
session_start();
include "koneksi.php";
$nama_siswa = $_POST['nama_siswa'];
$nama_ortu = $_POST['nama_ortu'];
$pekerjaan = $_POST['pekerjaan'];
$no_hp_ortu = $_POST['no_hp_ortu'];

$sql = "INSERT INTO orang_tua (nama_siswa,nama_ortu,pekerjaan,no_hp_ortu) 
values ('".$nama_siswa."','".$nama_ortu."', '".$pekerjaan."', '".$no_hp_ortu."' )";
    
    $a=$koneksi->query($sql);

    if ($a == true) {
    $_SESSION["status"] = 'sukses';
    echo "<script>
    window.history.go(-1);
    </script>";
    }else {
    $_SESSION["status"] = 'gagal';
    echo "<script>
        window.history.go(-1);
        </script>";
    }
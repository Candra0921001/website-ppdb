<?php
session_start();
include "koneksi.php";
$nama_siswa = $_POST['nama_siswa'];
$nama_prestasi = $_POST['nama_prestasi'];
$jenis_lomba = $_POST['jenis_lomba'];
$tingkatan = $_POST['tingkatan'];

$sql = "INSERT INTO prestasi (nama_siswa,nama_prestasi,jenis_lomba,tingkatan) 
values ('".$nama_siswa."','".$nama_prestasi."','".$jenis_lomba."','".$tingkatan."')";
    
    $a=$koneksi->query($sql);

    if ($a == true) {
         $_SESSION["status"] = 'sukses';
    echo "<script>
    window.history.go(-1);
    </script>";
    }else {
         $_SESSION["status"] = 'sukses';
    echo "<script>
    window.history.go(-1);
    </script>";
    }
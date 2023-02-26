<?php
session_start();
$isLogin = $_SESSION['isLoginUser'] ?? "";
if ($isLogin != "logged") {
    header('location: loginUser.php');
} else {
    require('assets/lib/fpdf/fpdf.php');
    include('koneksi.php');
    $id_siswa = $_GET['id'];
    $sql = "SELECT * FROM `formulir_pendaftaran` INNER JOIN `siswa` ON `formulir_pendaftaran`.`id_siswa`= `siswa`.`id_siswa` 
    WHERE `formulir_pendaftaran`.`id_siswa` = $id_siswa";
    $query = $koneksi->query($sql);
    $data = $query->fetch_array();

    $nama = $data['nama_lengkap'];
    $nik = $data['NIK'];
    $nisn = $data['NISN'];
    $tempatlahir = $data['tempat_lahir'];
    $tanggallahir = $data['tanggal_lahir'];
    $ttl = $tempatlahir . ", " . $tanggallahir;
    $idgender = $data['kd_jk'];
    $jk = "SELECT * FROM `jenis_kelamin` WHERE `kd_jk` = $idgender";
    $jkq = $koneksi->query($jk);
    $datajk = $jkq->fetch_array();
    $jkres = $datajk['nama_jk'];
    $jumlahsaudara = $data['jumlah_saudara'];
    $anakke = $data['anak_ke'];
    $idagama = $data['kd_agama'];
    $agm = "SELECT * FROM `agama` WHERE `kd_agama` = $idagama";
    $agm2 = $koneksi->query($agm);
    $dataagm = $agm2->fetch_array();
    $agamares = $dataagm['nama_agama'];
    $idhobi = $data['kd_hobi'];
    $hb = "SELECT * FROM `hobi` WHERE `kd_hobi` = $idhobi";
    $hb2 = $koneksi->query($hb);
    $datahb = $hb2->fetch_array();
    $hobires = $datahb['nama_hobi'];
    $idcita = $data['kd_cita_cita'];
    $ct = "SELECT * FROM `cita-cita` WHERE `kd_cita_cita` = $idcita";
    $ct2 = $koneksi->query($ct);
    $datact = $ct2->fetch_array();
    $citacitares = $datact['nama_cita_cita'];
    $alamat = $data['alamat'];
    $kota = $data['kota'];
    $provinsi = $data['provinsi'];
    $kodepos = $data['kodepos'];
    $telepon = $data['telepon'];
    $email = $data['email'];
    $sekolahasal = $data['nama_sekolah_asal'];
    $alamatsekolahasal = $data['alamat_sekolah_asal'];
    $idjas = $data['id_jenis_asal_sekolah'];
    $jas = "SELECT * FROM `jenis_asal_sekolah` WHERE `id_jenis_asal_sekolah` = $idjas";
    $jas2 = $koneksi->query($jas);
    $datajas = $jas2->fetch_array();
    $jenissekolahres = $datajas['nama_asal_sekolah'];
    $npsn = $data['NPSN_sekolah_asal'];
    $tglmasuk = $data['tanggal_masuk'];
    $tahunajaran = $data['tahun_ajaran'];
    $idtk = $data['kd_tingkat_kelas'];
    $tk = "SELECT * FROM `tingkat_kelas` WHERE `kd_tingkat_kelas` = $idtk";
    $tk2 = $koneksi->query($tk);
    $datatk = $tk2->fetch_array();
    $tingkatkelasres = $datatk['nama_tingkat_kelas'];
    $idpr = $data['kd_kelas_paralel'];
    $pr = "SELECT * FROM `kelas_paralel` WHERE `kd_kelas_paralel` = $idpr";
    $pr2 = $koneksi->query($pr);
    $datapr = $pr2->fetch_array();
    $paralelres = $datapr['nama_kelas_paralel'];

    class PDF extends FPDF
    {
        // Page header
        function Header()
        {
            $this->Image('assets/fotosma.png', 10, 8, 25);
            $this->SetFont('Times', 'B', 12);
            $this->Cell(30);
            $this->Cell(30, 7, 'Sekolah Menengah Atas Negeri 1 Sutojayan', 0, 1, 'L');
            $this->Cell(30);
            $this->Cell(30, 7, 'Jalan Diponegoro Nomor 103 Sutojayan', 0, 1, 'L');
            $this->Cell(30);
            $this->Cell(30, 7, 'Membangun Insan Yang Cerdas dan Berketerampilan Tinggi', 0, 1, 'L');
            $this->Ln(2);
            $this->Cell(190, 1, '', 'B', 1, 'L');
            $this->Cell(190, 1, '', 'B', 0, 'L');
            $this->Ln(5);
        }
    }

    //Membuat file PDF
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Times', 'B', 14);
    $pdf->Cell(190, 10, 'BUKTI PENDAFTARAN', 0, 50, 'C'); //190 jarak tulisan dari kiri, 10 jarak atas bawah

    $pdf->Ln(5);

    $pdf->SetFont("Times", "B", 14);
    $pdf->Cell(50, 5, 'DATA DIRI', 0, 0, 'L', 0);

    $pdf->Ln(8);

    $pdf->SetFont("Times", "B", 10); //times = font huruf, B = bold, 10 = font
    $pdf->Cell(50, 5, 'Nama Lengkap', 0, 0, 'L', 0); //50 = panjang, 5 jarak atas bawah, 0 = untuk memulai huruf pertama, L = left
    $pdf->Cell(3, 5, ':', 0, 0, 'L', 0);
    $pdf->SetFont("Times", "", 10);
    $pdf->Cell(50, 5, $nama, 0, 1, 'L', 0);

    $pdf->SetFont("Times", "B", 10);
    $pdf->Cell(50, 5, 'NIK', 0, 0, 'L', 0);
    $pdf->Cell(3, 5, ':', 0, 0, 'L', 0);
    $pdf->SetFont("Times", "", 10);
    $pdf->Cell(50, 5, $nik, 0, 1, 'L', 0);

    $pdf->SetFont("Times", "B", 10);
    $pdf->Cell(50, 5, 'NISN', 0, 0, 'L', 0);
    $pdf->Cell(3, 5, ':', 0, 0, 'L', 0);
    $pdf->SetFont("Times", "", 10);
    $pdf->Cell(50, 5, $nisn, 0, 1, 'L', 0);

    $pdf->SetFont("Times", "B", 10);
    $pdf->Cell(50, 5, 'Tempat & Tanggal Lahir', 0, 0, 'L', 0);
    $pdf->Cell(3, 5, ':', 0, 0, 'L', 0);
    $pdf->SetFont("Times", "", 10);
    $pdf->Cell(50, 5, $ttl, 0, 1, 'L', 0);

    $pdf->SetFont("Times", "B", 10);
    $pdf->Cell(50, 5, 'Jenis Kelamin', 0, 0, 'L', 0);
    $pdf->Cell(3, 5, ':', 0, 0, 'L', 0);
    $pdf->SetFont("Times", "", 10);
    $pdf->Cell(50, 5, $jkres, 0, 1, 'L', 0);

    $pdf->SetFont("Times", "B", 10);
    $pdf->Cell(50, 5, 'Jumlah Saudara', 0, 0, 'L', 0);
    $pdf->Cell(3, 5, ':', 0, 0, 'L', 0);
    $pdf->SetFont("Times", "", 10);
    $pdf->Cell(50, 5, $jumlahsaudara, 0, 1, 'L', 0);

    $pdf->SetFont("Times", "B", 10);
    $pdf->Cell(50, 5, 'Anak Ke', 0, 0, 'L', 0);
    $pdf->Cell(3, 5, ':', 0, 0, 'L', 0);
    $pdf->SetFont("Times", "", 10);
    $pdf->Cell(50, 5, $anakke, 0, 1, 'L', 0);

    $pdf->SetFont("Times", "B", 10);
    $pdf->Cell(50, 5, 'Agama', 0, 0, 'L', 0);
    $pdf->Cell(3, 5, ':', 0, 0, 'L', 0);
    $pdf->SetFont("Times", "", 10);
    $pdf->Cell(50, 5, $agamares, 0, 1, 'L', 0);

    $pdf->SetFont("Times", "B", 10);
    $pdf->Cell(50, 5, 'Hobi', 0, 0, 'L', 0);
    $pdf->Cell(3, 5, ':', 0, 0, 'L', 0);
    $pdf->SetFont("Times", "", 10);
    $pdf->Cell(50, 5, $hobires, 0, 1, 'L', 0);

    $pdf->SetFont("Times", "B", 10);
    $pdf->Cell(50, 5, 'Cita-Cita', 0, 0, 'L', 0);
    $pdf->Cell(3, 5, ':', 0, 0, 'L', 0);
    $pdf->SetFont("Times", "", 10);
    $pdf->Cell(50, 5, $citacitares, 0, 1, 'L', 0);

    $pdf->SetFont("Times", "B", 10);
    $pdf->Cell(50, 5, 'Alamat', 0, 0, 'L', 0);
    $pdf->Cell(3, 5, ':', 0, 0, 'L', 0);
    $pdf->SetFont("Times", "", 10);
    $pdf->Cell(50, 5, $alamat, 0, 1, 'L', 0);

    $pdf->SetFont("Times", "B", 10);
    $pdf->Cell(50, 5, 'Kota', 0, 0, 'L', 0);
    $pdf->Cell(3, 5, ':', 0, 0, 'L', 0);
    $pdf->SetFont("Times", "", 10);
    $pdf->Cell(50, 5, $kota, 0, 1, 'L', 0);

    $pdf->SetFont("Times", "B", 10);
    $pdf->Cell(50, 5, 'Provinsi', 0, 0, 'L', 0);
    $pdf->Cell(3, 5, ':', 0, 0, 'L', 0);
    $pdf->SetFont("Times", "", 10);
    $pdf->Cell(50, 5, $provinsi, 0, 1, 'L', 0);

    $pdf->SetFont("Times", "B", 10);
    $pdf->Cell(50, 5, 'Kode Pos', 0, 0, 'L', 0);
    $pdf->Cell(3, 5, ':', 0, 0, 'L', 0);
    $pdf->SetFont("Times", "", 10);
    $pdf->Cell(50, 5, $kodepos, 0, 1, 'L', 0);

    $pdf->SetFont("Times", "B", 10);
    $pdf->Cell(50, 5, 'No. Telepon', 0, 0, 'L', 0);
    $pdf->Cell(3, 5, ':', 0, 0, 'L', 0);
    $pdf->SetFont("Times", "", 10);
    $pdf->Cell(50, 5, $telepon, 0, 1, 'L', 0);

    $pdf->SetFont("Times", "B", 10);
    $pdf->Cell(50, 5, 'Email', 0, 0, 'L', 0);
    $pdf->Cell(3, 5, ':', 0, 0, 'L', 0);
    $pdf->SetFont("Times", "", 10);
    $pdf->Cell(50, 5, $email, 0, 1, 'L', 0);

    $pdf->Ln(10);

    $pdf->SetFont("Times", "B", 14);
    $pdf->Cell(50, 5, 'DATA SEKOLAH ASAL', 0, 0, 'L', 0);

    $pdf->Ln(8);

    $pdf->SetFont("Times", "B", 10);
    $pdf->Cell(50, 5, 'Nama Asal Sekolah', 0, 0, 'L', 0);
    $pdf->Cell(3, 5, ':', 0, 0, 'L', 0);
    $pdf->SetFont("Times", "", 10);
    $pdf->Cell(50, 5, $sekolahasal, 0, 1, 'L', 0);

    $pdf->SetFont("Times", "B", 10);
    $pdf->Cell(50, 5, 'Alamat Asal Sekolah', 0, 0, 'L', 0);
    $pdf->Cell(3, 5, ':', 0, 0, 'L', 0);
    $pdf->SetFont("Times", "", 10);
    $pdf->Cell(50, 5, $alamatsekolahasal, 0, 1, 'L', 0);

    $pdf->SetFont("Times", "B", 10);
    $pdf->Cell(50, 5, 'Jenis Asal Sekolah', 0, 0, 'L', 0);
    $pdf->Cell(3, 5, ':', 0, 0, 'L', 0);
    $pdf->SetFont("Times", "", 10);
    $pdf->Cell(50, 5, $jenissekolahres, 0, 1, 'L', 0);

    $pdf->SetFont("Times", "B", 10);
    $pdf->Cell(50, 5, 'NPSN', 0, 0, 'L', 0);
    $pdf->Cell(3, 5, ':', 0, 0, 'L', 0);
    $pdf->SetFont("Times", "", 10);
    $pdf->Cell(50, 5, $npsn, 0, 1, 'L', 0);

    $pdf->SetFont("Times", "B", 10);
    $pdf->Cell(50, 5, 'Tanggal Masuk', 0, 0, 'L', 0);
    $pdf->Cell(3, 5, ':', 0, 0, 'L', 0);
    $pdf->SetFont("Times", "", 10);
    $pdf->Cell(50, 5, $tglmasuk, 0, 1, 'L', 0);

    $pdf->SetFont("Times", "B", 10);
    $pdf->Cell(50, 5, 'Tahun Ajaran', 0, 0, 'L', 0);
    $pdf->Cell(3, 5, ':', 0, 0, 'L', 0);
    $pdf->SetFont("Times", "", 10);
    $pdf->Cell(50, 5, $tahunajaran, 0, 1, 'L', 0);


    $pdf->Ln(77);

    $pdf->SetFont("Times", "I", 10);
    $pdf->Cell(50, 5, '*Catatan: harap bukti formulir ini dibawa saat daftar ulang', 0, 0, 'L', 0);

    $pdf->Output();
}

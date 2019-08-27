<?php
  session_start();
  include("../koneksi.php");

  if(isset($_POST['tambah'])){

    $no_kk = $_POST['kk'];
    $nik = $_POST['nik'];
    $nama = $_POST['nama']; 
    $jk = $_POST['jk'];
    $tempat_lahir = $_POST['tempat']; 
    $tgl_lahir = $_POST['tgl'];
    $agama = $_POST['agama'];
    $pekerjaan = $_POST['kerja'];
    $pendidikan = $_POST['pend'];
    $status_kawin = $_POST['kawin'];
    $status_keluarga = $_POST['hubkeluarga'];
    $penghuni = $_POST['penghuni'];

    $tambahWarga = "INSERT INTO tabel_warga(no_kk, nik, nama, jk, tempat_lahir, tgl_lahir, agama, pekerjaan, pendidikan, status_kawin, status_keluarga) VALUE ('$no_kk', '$nik', '$nama', '$jk', '$tempat_lahir', '$tgl_lahir', '$agama', '$pekerjaan', '$pendidikan', '$status_kawin', '$status_keluarga')";
    $query_tambahWarga = mysqli_query($koneksi, $tambahWarga);

    if ($query_tambahWarga){
      header('Location: warga-list.php');
    } else{
      header('Location: warga-formkk.php');
    }

  } else{
    die("Akses Dilarang");
  }
?>
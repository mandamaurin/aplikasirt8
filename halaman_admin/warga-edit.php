<?php
  session_start();
  include("../koneksi.php");

  if(isset($_POST['edit'])){

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
  

    $editWarga = "UPDATE tabel_warga SET nik = '$nik', nama = '$nama', jk = '$jk', tempat_lahir = '$tempat_lahir',tgl_lahir = '$tgl_lahir', agama = '$agama', pekerjaan = '$pekerjaan', pendidikan = '$pendidikan', status_kawin = '$status_kawin',  status_keluarga = '$status_keluarga' WHERE nik = '$nik'";

    $query_editWarga = mysqli_query($koneksi, $editWarga);

    if ($query_editWarga){
      header('Location: warga-list.php');
    } else{
      header('Location: warga-formkk.php');
    }

  } else{
    die("Akses Dilarang");
  }
?>
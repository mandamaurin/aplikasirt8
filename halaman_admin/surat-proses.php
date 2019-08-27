<?php

include("../koneksi.php");

if(isset($_GET['id'])){

    $id = $_GET['id'];
    $sql = mysqli_query($koneksi, "SELECT * FROM tabel_surat WHERE invoice = '$id'");
    $row = mysqli_fetch_assoc($sql);

    if($row['status'] == 'Belum Diproses'){
        $sql1 = mysqli_query($koneksi, "UPDATE tabel_surat SET status='Diproses' WHERE invoice = '$id'");
    }else{
        $sql1 = mysqli_query($koneksi, "UPDATE tabel_surat SET status='Sudah Dapat Diambil' WHERE invoice = '$id'");
    }
    
    if($sql1) {
        header('Location: ajuansurat.php');
    } else {
        die("Gagal menyimpan perubahan...");
    }
    
} else {
    die("Akses dilarang...");
}

?>

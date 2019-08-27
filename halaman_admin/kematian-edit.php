<?php

include("../koneksi.php");

if(isset($_GET['id'])){

	$id = $_GET['id'];
	$sql = mysqli_query($koneksi, "SELECT * FROM tabel_kematian WHERE no_kematian = '$id'");
	$row = mysqli_fetch_assoc($sql);

	if($row['status'] == 'Akte Belum Diurus'){
		$sql1 = mysqli_query($koneksi, "UPDATE tabel_kematian SET status='Akte Sedang Diproses' WHERE no_kematian = '$id'");
	}else{
		$sql1 = mysqli_query($koneksi, "UPDATE tabel_kematian SET status='Akte Sudah Jadi' WHERE no_kematian = '$id'");
	}
	
	if($sql1) {
		header('Location: kematian-list.php');
	} else {
		die("Gagal menyimpan perubahan...");
	}
	
} else {
	die("Akses dilarang...");
}

?>

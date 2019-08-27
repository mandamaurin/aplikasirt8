<?php
	
	include("../koneksi.php");

	if(isset($_GET['id'])){

		$id = $_GET['id'];

		$sql = "DELETE FROM tabel_pemasukan WHERE invoice_iuran = '$id'";
		$query = mysqli_query($koneksi, $sql);

		if($query){
			header('Location: pemasukan.php');
		} else{
			die("Data gagal dihapus");
		}

	} else{
		die ("Akses Dilarang");
	}

?>
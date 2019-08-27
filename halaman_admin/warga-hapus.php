<?php
	
	include("../koneksi.php");

	if(isset($_GET['id'])){

		$id = $_GET['id'];

		$sql = "DELETE FROM tabel_warga WHERE nik = $id";
		$query = mysqli_query($koneksi, $sql);

		if($query){
			header('Location: warga-list.php');
		} else{
			die("Data gagal dihapus");
		}

	} else{
		die ("Akses Dilarang");
	}

?>
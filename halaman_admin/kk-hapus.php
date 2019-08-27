<?php
	
	include("../koneksi.php");

	if(isset($_GET['id'])){

		$id = $_GET['id'];

		$sql = "DELETE FROM tabel_kk WHERE no_kk = $id";
		$query = mysqli_query($koneksi, $sql);

		$sql2 = "DELETE FROM tabel_warga WHERE no_kk = $id";
		$query2 = mysqli_query($koneksi, $sql2);

		$sql3 = "DELETE FROM tabel_kelahiran WHERE no_kk = $id";
		$query3 = mysqli_query($koneksi, $sql3);

		$sql4 = "DELETE FROM tabel_pemasukan WHERE no_kk = $id";
		$query4 = mysqli_query($koneksi, $sql4);


		if($query && $query2){
			header('Location: lihatwarga.php');
		} else{
			die("Data gagal dihapus");
		}

	} else{
		die ("Akses Dilarang");
	}

?>
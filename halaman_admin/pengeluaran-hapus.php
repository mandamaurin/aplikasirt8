<?php
	
	include("../koneksi.php");

	if(isset($_GET['id'])){

		$id = $_GET['id'];

		$sql = "DELETE FROM tabel_pengeluaran WHERE id_pengeluaran = $id";
		$query = mysqli_query($koneksi, $sql);

		if($query){
			header('Location: pengeluaran.php');
		} else{
			die("Data gagal dihapus");
		}

	} else{
		die ("Akses Dilarang");
	}

?>
<?php
	
	include("../koneksi.php");

	if(isset($_GET['id'])){

		$id = $_GET['id'];

		$sql = "DELETE FROM tabel_kelahiran WHERE no_kelahiran = $id";
		$query = mysqli_query($koneksi, $sql);

		if($query){
			header('Location: kelahiran-list.php');
		} else{
			die("Data gagal dihapus");
		}

	} else{
		die ("Akses Dilarang");
	}

?>
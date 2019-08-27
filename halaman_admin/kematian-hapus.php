<?php
	
	include("../koneksi.php");

	if(isset($_GET['id'])){

		$id = $_GET['id'];

		$sql = "DELETE FROM tabel_kematian WHERE no_kematian = $id";
		$query = mysqli_query($koneksi, $sql);

		if($query){
			header('Location: kematian-list.php');
		} else{
			die("Data gagal dihapus");
		}

	} else{
		die ("Akses Dilarang");
	}

?>
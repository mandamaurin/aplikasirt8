<?php
	include("../koneksi.php");

	if(isset($_POST['tambah'])){

		$nomati = $_POST['nomati'];
		$nik = $_POST['nik'];
		$tempat = $_POST['tempat'];
		$tgl = $_POST['tgl'];
		$sebab = $_POST['sebab'];

		$sql = "INSERT INTO tabel_kematian(no_kematian, nik, tempat_mati, tgl_mati, sebab_mati, status) VALUE ('$nomati', '$nik', '$tempat', '$tgl', '$sebab', 'Akte Belum Diurus')";
		$query = mysqli_query($koneksi, $sql);

		if ($query){
			header('Location: kematian-list.php');
		} else{
			header('Location: kelahiran-formtambah.php');
		}

	} else{
		die("Akses Dilarang");
	}
?>
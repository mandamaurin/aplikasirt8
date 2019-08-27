<?php
	include("../koneksi.php");

	if(isset($_POST['tambah'])){

		$nolahir = $_POST['nolahir'];
		$kk = $_POST['kk'];
		$nama = $_POST['nama'];
		$jk = $_POST['jk'];
		$tempat = $_POST['tempat'];
		$tgl = $_POST['tgl'];

		$sql = "INSERT INTO tabel_kelahiran(no_kelahiran, no_kk, nama_anak, tempat_lahir1, tgl_lahir1, jk, status) VALUE ('$nolahir', '$kk', '$nama', '$tempat', '$tgl', '$jk', 'Akte Belum Diurus')";
		$query = mysqli_query($koneksi, $sql);

		if ($query){
			header('Location: kelahiran-list.php');
		} else{
			header('Location: kelahiran-formtambah.php');
		}

	} else{
		die("Akses Dilarang");
	}
?>
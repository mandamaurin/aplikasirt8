<?php
	include("../koneksi.php");

	if(isset($_POST['tambah'])){

		$jenis = $_POST['nama'];
		$nominal = $_POST['nominal'];
		$bulan = $_POST['bulan'];
		$tgl_bayar = Date('Y-m-d');

		$sql = "INSERT INTO tabel_pemasukan(no_kk, nominal, bulan, tgl_bayar, jenis) VALUE ('nol', '$nominal', '$bulan', '$tgl_bayar', '$jenis')";
		$query = mysqli_query($koneksi, $sql);

		if ($query){
			header('Location: pemasukan.php');
		} else{
			header('Location: pemasukan1-formtambah.php');
		}

	} else{
		die("Akses Dilarang");
	}
?>
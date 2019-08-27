<?php
	include("../koneksi.php");

	if(isset($_POST['tambah'])){

		$nama = $_POST['nama'];
		$nominal = $_POST['nominal'];
		$nik = $_POST['nik'];
		$keterangan = $_POST['keterangan'];
		$tgl_input = Date('Y-m-d');

		$sql = "INSERT INTO tabel_pengeluaran(nama_pengeluaran, nominal, nik, keterangan, tgl_input) VALUE ('$nama', '$nominal', '$nik','$keterangan', '$tgl_input')";
		$query = mysqli_query($koneksi, $sql);

		if ($query){
			header('Location: pengeluaran.php');
		} else{
			header('Location: pengeluaran-formtambah.php');
		}

	} else{
		die("Akses Dilarang");
	}
?>
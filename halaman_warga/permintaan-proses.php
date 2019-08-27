<?php
	session_start();
	include("../koneksi.php");
	$sql = "SELECT username FROM tabel_user WHERE username ='".$_SESSION['username']."'";
    $query = mysqli_query($koneksi, $sql);
    $username = mysqli_fetch_array($query);

	if(isset($_POST['kirim']) ){

		function invoiceAcak(){
    		$hasil = "";
    		$huruf = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXY";
    		$hurufArray = str_split($huruf);
    		for($i = 0; $i < 8; $i++){
	    		$hurufAcak = array_rand($hurufArray);
	    		$hasil .= "".$hurufArray[$hurufAcak];
    		}
    		return $hasil;
		}


		$invoice = invoiceAcak();
		$jenis_surat = $_POST['jenis'];
		$keterangan = $_POST['keterangan'];
		$username = $username['username'];
		$status = "Belum Diproses";

		$sql = "INSERT INTO tabel_surat(invoice, username, jenis_surat, keterangan, status) VALUE ('$invoice', '$username','$jenis_surat', '$keterangan', '$status')";
		$query = mysqli_query($koneksi, $sql);

		if ($query){
			header('Location: ajuansurat.php');
		} else{
			header('Location: permintaan-form.php');
		}

	} else{
		die("Akses Dilarang");
	}
?>
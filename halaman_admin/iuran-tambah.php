<?php
	include("../koneksi.php");

	if(isset($_POST['tambah'])){

		$kk = $_POST['kk'];
		$nominal = $_POST['nominal'];
		$bulan = $_POST['bulan'];
		$tgl_bayar = Date('Y-m-d');
		$jenis = $_POST['jenis'];

		function invoiceAcak(){
    		$hasil = "";
    		$huruf = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXY";
    		$hurufArray = str_split($huruf);
    		for($i = 0; $i < 6; $i++){
	    		$hurufAcak = array_rand($hurufArray);
	    		$hasil .= "".$hurufArray[$hurufAcak];
    		}
    		return $hasil;
		}


		$invoice = invoiceAcak();

		$sql = "INSERT INTO tabel_pemasukan(invoice_iuran ,no_kk, nominal, bulan, tgl_bayar, jenis) VALUE ('$invoice', '$kk', '$nominal', '$bulan', '$tgl_bayar', '$jenis')";
		$query = mysqli_query($koneksi, $sql);

		if ($query){
			header('Location: pemasukan.php');
		} else{
			header('Location: iuran-formtambah.php');
		}

	} else{
		die("Akses Dilarang");
	}
?>
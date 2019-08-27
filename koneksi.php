<?php
	$server = "localhost";
	$user = "root";
	$password = "";
	$database = "db_aplikasi";

	$koneksi = mysqli_connect($server, $user, $password, $database);

	if( !$koneksi ){
		die ("Gagal terhubung" .mysqli_connect_error());
	}
?>
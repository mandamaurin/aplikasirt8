<?php

function tanggal_tabel($tanggal){

	$bulan = array(1 => 'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Juni', 'Juli', 'Agust', 'Sept', 'Okt', 'Nov', 'Des');
	$split = explode('-', $tanggal);
	return $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];
}

function rupiah($nominal){
	$hasil = number_format($nominal,2,',','.');
	return $hasil;
}
?>
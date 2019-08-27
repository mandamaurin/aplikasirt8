<?php  

require('../fpdf/fpdf.php');
require('../koneksi.php');
require('function.php');

function hari($hari_ini){

	$hari = Date('d');
	switch ($hari) {
		case 'Sunday':
			return 'Minggu';
			break;
		case 'Monday':
			return 'Senin';
			break;
		case 'Tuesday';
			return 'Selasa';
			break;
		case 'Wednesday':
			return 'Rabu';
			break;
		case 'Thursday':
			return 'Kamis';
			break;
		case 'Friday':
			return 'Jumat';
			break;
		default:
			return 'Sabtu';
			break;
	}
}

$tanggal_sekarang = Date('Y-m-d');
$hari = Date('d');
$pdf = new FPDF();
$pdf->SetFont('ARIAL','B',14);
$pdf->AddPage();
$pdf->Image('logodepok.jpg',10,10,20,25);

$pdf->SetFont('Arial', 'B', 15);
$pdf->Cell(25);
$pdf->Cell(0,8, 'KELUARGA BESAR RT 08 RW 13', 0, 1, 'C');
$pdf->Cell(25);
$pdf->Cell(0,8, 'KELURAAN BAKTIJAYA KECAMATAN SUKMAJAYA', 0, 1, 'C');
$pdf->Cell(25);
$pdf->Cell(0,8, 'KOTA DEPOK', 0, 1, 'C');
$pdf->SetLineWidth(1);
$pdf->Line(10,37,200,37);
$pdf->SetLineWidth(0);
$pdf->Line(10,38,200,38);
$pdf->SetFont('Arial', '',12);
$pdf->Cell(10,10,'',0,1);
$pdf->Cell(0,8, 'Perihal : Laporan Keuangan Bulanan', 0, 1, 'L');
$pdf->Cell(6,6,'',0,1);
$pdf->Cell(0,8, 'A. Pemasukan', 0, 1, 'L');
$pdf->Cell(10,5,'',0,1);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(8,6,'No.',1,0);
$pdf->Cell(40,6,'Nama Pemasukan',1,0);
$pdf->Cell(45,6,'Bulan',1,0);
$pdf->Cell(45,6,'Nominal',1,1);

$pdf->SetFont('Arial','',11);

$no = 2;

$sql = "SELECT * FROM tabel_pemasukan WHERE jenis != 'Iuran Kas Bulanan'";
$query = mysqli_query($koneksi, $sql);
while($saldo_sumbangan = mysqli_fetch_array($query)){
	$total_sumbangan[] = $saldo_sumbangan['nominal'];
	$total_saldo_sumbangan = array_sum($total_sumbangan);
	$bulan_sumbangan = $saldo_sumbangan['bulan'];
}

$sql2 = mysqli_query($koneksi, "SELECT * FROM tabel_pemasukan WHERE jenis = 'Iuran Kas Bulanan'");
while($saldo = mysqli_fetch_array($sql2)){
	$total_saldo[] = $saldo['nominal'];
	$total_saldo_iuran = array_sum($total_saldo);
	$bulan = $saldo['bulan'];
}

$pdf->Cell(8,6,'1',1,0);
$pdf->Cell(40,6,'Iuran Rutin Bulanan',1,0);
$pdf->Cell(45,6,$bulan,1,0);
$pdf->Cell(45,6,'Rp '.rupiah($total_saldo_iuran),1,1);

$pdf->Cell(8,6,'2',1,0);
$pdf->Cell(40,6,'Sumbangan',1,0);
$pdf->Cell(45,6,$bulan_sumbangan,1,0);
$pdf->Cell(45,6,'Rp '.rupiah($total_saldo_sumbangan),1,1);

$saldo_keseluruhan = $total_saldo_iuran + $total_saldo_sumbangan;
$pdf->Cell(93,6,'Total',1,0,'C');
$pdf->Cell(45,6,'Rp '.rupiah($saldo_keseluruhan),1,1);
$pdf->Cell(10,10,'',0,1);

$pdf->Cell(0,8, 'B. Pengeluaran', 0, 1, 'L');
$pdf->Cell(10,5,'',0,1);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(8,6,'No.',1,0);
$pdf->Cell(40,6,'Nama Pengeluaran',1,0);
$pdf->Cell(45,6,'Bulan',1,0);
$pdf->Cell(45,6,'Nominal',1,1);

$pdf->SetFont('Arial','',11);
$sql1 = "SELECT * FROM tabel_pengeluaran";
$query1 = mysqli_query($koneksi, $sql1);
$no = 1;
while ($row1 = mysqli_fetch_array($query1)){
	$pengeluaran[] = $row1['nominal'];
	$total_pengeluaran = array_sum($pengeluaran);
	$pdf->Cell(8,6,$no++,1,0);
	$pdf->Cell(40,6,$row1['nama_pengeluaran'],1,0);
	$pdf->Cell(45,6,$bulan,1,0);
	$pdf->Cell(45,6,'Rp '.rupiah($row1['nominal']),1,1);
}
$pdf->Cell(93,6,'Total',1,0,'C');
$pdf->Cell(45,6,'Rp '.rupiah($total_pengeluaran),1,1);
$pdf->Cell(10,10,'',0,1);

$pdf->Cell(0,8, 'B. Saldo Sisa', 0, 1, 'L');

$pdf->Cell(0,8, '    Jumlah Pemasukan - Jumlah Pengeluaran', 0, 1, 'L');

$pdf->Cell(0,8, '   = Rp '.rupiah($saldo_keseluruhan).' - Rp '.rupiah($total_pengeluaran), 0, 1, 'L');
$saldo_sisa = $saldo_keseluruhan - $total_pengeluaran;

$pdf->Cell(0,8, '   = Rp '.rupiah($saldo_sisa), 0, 1, 'L');


$pdf->SetY(-68);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0,8, 'Depok, '.hari($hari).' '.tanggal_tabel($tanggal_sekarang), 0, 1, 'R');
$pdf->Cell(0,8, 'Dibuat oleh       ', 0, 1, 'R');
$pdf->Cell(15,15,'',0,1);
$pdf->Cell(0,8, 'Agung Kardiko    ', 0, 1, 'R');
$pdf->Cell(0,8, '(Bendahara RT)    ', 0, 1, 'R');
$pdf->Output();
?>
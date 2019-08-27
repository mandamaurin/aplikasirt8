<?php  

require('../fpdf/fpdf.php');
require('../koneksi.php');

function tanggal_tabel($tanggal){

	$bulan = array(1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
	$split = explode('-', $tanggal);
	return $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];
}

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
$pdf = new FPDF('P','mm' ,'A4');
$pdf->SetFont('ARIAL','B',14);
$pdf->AddPage('L');
$pdf->Image('logodepok.jpg',10,10,20,25);

$pdf->SetFont('Arial', 'B', 15);
$pdf->Cell(25);
$pdf->Cell(0,8, 'KELUARGA BESAR RT 08 RW 13', 0, 1, 'C');
$pdf->Cell(25);
$pdf->Cell(0,8, 'KELURAAN BAKTIJAYA KECAMATAN SUKMAJAYA', 0, 1, 'C');
$pdf->Cell(25);
$pdf->Cell(0,8, 'KOTA DEPOK', 0, 1, 'C');
$pdf->SetLineWidth(1);
$pdf->Line(10,37,287,37);
$pdf->SetLineWidth(0);
$pdf->Line(10,38,287,38);
$pdf->SetFont('Arial', '',12);
$pdf->Cell(10,10,'',0,1);
$pdf->Cell(0,8, 'Perihal : Data Kelahiran Warga RT 08 RW 13', 0, 1, 'L');
$pdf->Cell(10,5,'',0,1);

$pdf->SetFont('Arial','B',11);
$pdf->Cell(8,6,'No.',1,0);
$pdf->Cell(40,6,'No. Kelahiran',1,0);
$pdf->Cell(40,6,'No KK',1,0);
$pdf->Cell(45,6,'Nama Anak',1,0);
$pdf->Cell(34,6,'Nama Orang Tua',1,0);
$pdf->Cell(50,6,'Tempat, Tanggal Lahir',1,0);
$pdf->Cell(42,6,'Status',1,1);

$pdf->SetFont('Arial','',11);

$no = 1;

$sql = mysqli_query($koneksi, "SELECT * FROM tabel_kelahiran, tabel_warga WHERE tabel_kelahiran.no_kk = tabel_warga.no_kk AND tabel_warga.status_keluarga = 'Kepala Keluarga'");
while ($row = mysqli_fetch_array($sql)){
	$pdf->Cell(8,6,$no++,1,0);
	$pdf->Cell(40,6,$row['no_kelahiran'],1,0);
	$pdf->Cell(40,6,$row['no_kk'],1,0);
	$pdf->Cell(45,6,$row['nama_anak'],1,0);
	$pdf->Cell(34,6,$row['nama'],1,0);
	$pdf->Cell(50,6,$row['tempat_lahir1'].", ".tanggal_tabel($row['tgl_lahir1']),1,0);
	$pdf->Cell(42,6,$row['status'],1,1);

}
$pdf->SetY(-68);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0,8, 'Depok, '.hari($hari).' '.tanggal_tabel($tanggal_sekarang), 0, 1, 'R');
$pdf->Cell(0,8, 'Mengetahui       ', 0, 1, 'R');
$pdf->Cell(15,15,'',0,1);
$pdf->Cell(0,8, 'Lukman Hakim    ', 0, 1, 'R');
$pdf->Cell(0,8, '(Ketua RT)      ', 0, 1, 'R');
$pdf->Output();
?>
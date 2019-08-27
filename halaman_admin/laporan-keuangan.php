<?php 
$title = "Laporan Keuangan";
include("layout-header.php");
include("function.php");
?>

<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Laporan Keuangan</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Pemasukan
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-default">
								<!-- /.panel-heading -->
								<div class="table-responsive">
									<table class="table table-striped table-bordered table-hover">
										<?php

										$sql = "SELECT * FROM tabel_pemasukan WHERE jenis != 'Iuran Kas Bulanan'";
$query = mysqli_query($koneksi, $sql);

$sql2 = mysqli_query($koneksi, "SELECT * FROM tabel_pemasukan WHERE jenis = 'Iuran Kas Bulanan'");
while($saldo = mysqli_fetch_array($sql2)){
	$total_saldo[] = $saldo['nominal'];
	$total_saldo_iuran = array_sum($total_saldo);
	$bulan = $saldo['bulan'];
}



										$query = mysqli_query($koneksi, $sql);

										if (mysqli_num_rows($query) < 1) {
											echo "Tidak Ada Data";
										} else {
											echo "<thead>";
											echo "<tr>";
											echo "<th>No</th>";
											echo "<th>Nama Pemasukan</th>";
											echo "<th>Bulan</th>";
											echo "<th>Nominal</th>";
											echo "</tr>";
											echo "</thead>";
										}
										 while ($row = mysqli_fetch_array($query)) {
										 	echo "<tbody>";
										echo "<tr>";
										echo "<td>1</td>";
										echo "<td>Iuran Kas Bulanan</td>";
										echo "<td>".$bulan."</td>";
										echo "<td>Rp ".rupiah($total_saldo_iuran)."</td>";
										echo "</tr>";
										while ($row = mysqli_fetch_array($query)){
	$saldo_non_iuran[] = $row['nominal'];
	$total_saldo_non_iuran = array_sum($saldo_non_iuran);
	echo "<td>1</td>";
	echo "<td>".$row['jenis']."</td>";
	echo "<td>".$row['bulan']."</td>";
	echo "<td>Rp ".rupiah($row['nominal'])."</td>";
}
										 }
										
										?>
									</table>
								</div>
								<!-- /.table-responsive -->
							</div>
							<!-- /.panel -->
							<p>Total Saldo Pemasukan : <?php echo "Rp ".rupiah($total_saldo_iuran);  ?></p>
						</div>
						<!-- /.col-lg-12 -->
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Pengeluaran
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-default">
								<!-- /.panel-heading -->
								<div class="table-responsive">
									<table class="table table-striped table-bordered table-hover">
										<?php

										$sql1 = "SELECT * FROM tabel_pengeluaran";

										$query1 = mysqli_query($koneksi, $sql1);

										if (mysqli_num_rows($query1) < 1) {
											echo "Tidak Ada Data";
										} else {
											echo "<thead>";
											echo "<tr>";
											echo "<th>Id</th>";
											echo "<th>Nama / Jenis Pengeluaran</th>";
											echo "<th>Nominal</th>";
											echo "</tr>";
											echo "</thead>";
										}

										$no = 1;

										while ($row1 = mysqli_fetch_array($query1)){

											$pengeluaran[] = $row1['nominal'];
											$total_pengeluaran = array_sum($pengeluaran);
											echo "<tbody>";
											echo "<tr>";
											echo "<td>".$no++."</td>";
											echo "<td>".$row1['nama_pengeluaran']."</td>";
											echo "<td>Rp ".rupiah($row1['nominal'])."</td>";
											echo "</tr>";
											echo "</tbody>";

										}

										?>
									</table>
								</div>
								<!-- /.table-responsive -->
							</div>
							<!-- /.panel -->
							<p>Total Pengeluaran : <?php echo "Rp ".rupiah($total_pengeluaran);  ?></p>
						</div>
						<!-- /.col-lg-12 -->
					</div>

				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<a href="cetak-lapkeuangan.php" target="_blank"><button class="btn btn-primary">Cetak Laporan Keuangan</button></a>
		</div>
	</div>

	<!-- /.row -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php include("layout-footer.php"); ?>
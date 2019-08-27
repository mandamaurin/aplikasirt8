<?php 
$title = "Data Keluarga";
include("layout-header.php");
$sql1 = mysqli_query($koneksi, "SELECT * FROM tabel_kk WHERE username ='".$_SESSION['username']."'");
$kk = mysqli_fetch_assoc($sql1);
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-6">
            <h1 class="page-header">Data Keluarga Saya</h1>
        </div>
        <div class="col-lg-6">
            <h1 class="page-header">No. KK : <?php echo $kk['no_kk']; ?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <!-- /.panel-heading -->
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <?php

                                        $sql = mysqli_query($koneksi, "SELECT * FROM tabel_warga, tabel_kk WHERE tabel_warga.no_kk = tabel_kk.no_kk  AND tabel_kk.username ='".$_SESSION['username']."'");

                                        if (mysqli_num_rows($sql) < 1) {
                                            echo "Tidak Ada Data";
                                        } else {
                                            echo "<thead>";
                                            echo "<tr>";
                                            echo "<th>No.</th>";
                                            echo "<th>No. KK</th>";
                                            echo "<th>NIK</th>";
                                            echo "<th>Nama</th>";
                                            echo "<th>JK</th>";
                                            echo "<th>Tempat, Tgl Lahir</th>";
                                            echo "<th>Agama</th>";
                                            echo "<th>Pekerjaan</th>";
                                            echo "<th>Pendidikan</th>";
                                            echo "<th>Status Kawin</th>";
                                            echo "<th>Hubungan Keluarga</th>";
                                            echo "</tr>";
                                            echo "</thead>";
                                        }

                                        $no = 1;

                                        while ($row = mysqli_fetch_array($sql)){

                                            echo "<tbody>";
                                            echo "<tr>";
                                            echo "<td>".$no++."</td>";
                                            echo "<td>".$row['no_kk']."</td>";
                                            echo "<td>".$row['nik']."</td>";
                                            echo "<td>".$row['nama']."</td>";
                                            echo "<td>".$row['jk']."</td>";
                                            echo "<td>".$row['tempat_lahir'].",".tanggal_tabel($row['tgl_lahir'])."</td>";
                                            echo "<td>".$row['agama']."</td>";
                                            echo "<td>".$row['pekerjaan']."</td>";
                                            echo "<td>".$row['pendidikan']."</td>";
                                            echo "<td>".$row['status_kawin']."</td>";
                                            echo "<td>".$row['status_keluarga']."</td>";
                                            echo "</tr>";
                                            echo "</tbody>";

                                        }

                                        ?>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.panel -->
                            <p><i>Harap hubungi pengurus RT apabila terdapat kesalahan penulisan data-data diri</i></p>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->

<?php include("layout-footer.php"); ?>
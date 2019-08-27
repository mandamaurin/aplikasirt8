<?php 
$title = "Ajuan Surat";
include("layout-header.php");

?>


<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Ajuan Surat</h1>
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

                                        $sql = "SELECT * FROM tabel_surat, tabel_user, tabel_kk, tabel_warga WHERE tabel_surat.username = tabel_user.username AND tabel_kk.username = tabel_user.username AND tabel_kk.no_kk = tabel_warga.no_kk AND tabel_warga.status_keluarga = 'Kepala Keluarga'";

                                        $query = mysqli_query($koneksi, $sql);
                                        if (mysqli_num_rows($query) < 1) {
                                            echo "Tidak Ada Data";
                                        } else {
                                            echo "<thead>";
                                            echo "<tr>";
                                            echo "<th>Invoice</th>";
                                            echo "<th>Kepala Keluarga</th>";
                                            echo "<th>Nama / Jenis Surat</th>";
                                            echo "<th>Keterangan</th>";
                                            echo "<th>Status</th>";
                                            echo "<th>Aksi</th>";
                                            echo "</tr>";
                                            echo "</thead>";
                                        }

                                        while ($row = mysqli_fetch_array($query)){


                                            echo "<tbody>";
                                            echo "<tr>";
                                            echo "<td>".$row['invoice']."</td>";
                                            echo "<td>".$row['nama']."</td>";
                                            echo "<td>".$row['jenis_surat']."</td>";
                                            echo "<td>".$row['keterangan']."</td>";
                                            echo "<td>".$row['status']."</td>";
                                            echo "<td>";
                                            if($row['status'] == "Belum Diproses"){
                                                echo "<a class='btn btn-success' data-toggle='tooltip' data-placement='left' title='Proses' href='surat-proses.php?id=".$row['invoice']."' onClick = 'return proses()'><i class='fa fa-check fa-fw'></i></a>";
                                                echo " <a class='btn btn-danger' data-toggle='tooltip' data-placement='left' title='Hapus' href='../halaman_warga/permintaan-hapus.php?id=".$row['invoice']."' onClick = 'return batal()'><i class='fa fa-trash fa-fw'></i></a>";
                                                echo "</td>";
                                            }else if($row['status'] == "Diproses"){
                                                echo "<a class='btn btn-success' data-toggle='tooltip' data-placement='left' title='Surat Jadi' href='surat-proses.php?id=".$row['invoice']."' onClick = 'return suratJadi()'><i class='fa fa-check fa-fw'></i></a>";
                                                echo " <a class='btn btn-danger disabled' data-toggle='tooltip' data-placement='left' title='Hapus' href='../halaman_warga/permintaan-hapus.php?id=".$row['invoice']."'><i class='fa fa-trash fa-fw'></i></a>";
                                                echo "</td>";
                                            } else{
                                                echo "<a class='btn btn-success disabled' href='surat-jadi.php?id=".$row['invoice']."' onClick = 'return suratJadi()'><i class='fa fa-check fa-fw'></i></a>";
                                                echo " <a class='btn btn-danger' data-toggle='tooltip' data-placement='left' title='Hapus' href='../halaman_warga/permintaan-hapus.php?id=".$row['invoice']."'><i class='fa fa-trash fa-fw'></i></a>";
                                                echo "</td>";
                                            }
                                            echo "</td>";
                                            echo "</tr>";
                                            echo "</tbody>";

                                        }


                                        ?>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.panel -->


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
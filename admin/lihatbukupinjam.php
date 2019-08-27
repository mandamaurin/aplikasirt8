<?php 
    $title = "Lihat Buku";
    include("layout-header.php");
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Lihat Buku</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
         

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <a href="buku-listpinjam.php">Lihat Semua Buku</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Lihat Berdasarkan Klasifikasi
                        </div>
                        <div class="panel-body">
                            <?php
                                $sql3 = mysqli_query($koneksi, "SELECT * FROM klasifikasi");

                                while($row3 = mysqli_fetch_array($sql3)){
                                    echo "<ul>";
                                    echo "<a href='buku-listpinjam-klasifikasi.php?id=".$row3['id']."'><li>".$row3['nomor']." = ".$row3['nama_klasifikasi']."</li></a>";
                                    echo "</ul>";
                                }

                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include("layout-footer.php"); ?>
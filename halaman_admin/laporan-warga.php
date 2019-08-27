<?php 
$title = "Laporan Data Warga";
include("layout-header.php");
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Laporan Data Warga</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Warga Yang Tinggal di Lingkungan RT 08 RW 13
                </div>
                <div class="panel-body">
                                        <div class="row">

                            <!--<div class="row">
                             <div class="box-tools" style="width: 300px; margin-left: 35px; margin-bottom: 20px;">
                                <form action="lihatwarga.php" method="GET">
                                    <div class="input-group">
                                    <input type='text' class="form-control input-sm pull-right" name='qcari' placeholder='Cari Berdasarkan No. KK' required /> 
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-default" type="submit"><i class="fa fa-search"></i></button>
                                    </div>
                                    </div>
                                 </form>
                            </div>
                        </div>-->

                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <!-- /.panel-heading -->
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <?php
                                        // Cek apakah terdapat data pada page URL
                                        $page = (isset($_GET['page'])) ? $_GET['page'] : 1;

                                        $limit = 30; // Jumlah data per halamanya

                                        // Buat query untuk menampilkan daa ke berapa yang akan ditampilkan pada tabel yang ada di database
                                        $limit_start = ($page - 1) * $limit;

                                        if(isset($_GET['qcari'])){
                                            $qcari = $_GET['qcari'];
                                            $sql = "SELECT * FROM tabel_kk WHERE no_kk like '%$qcari%'";
                                        } else{
                                            $sql = "SELECT * FROM tabel_kk, tabel_warga WHERE tabel_kk.no_kk = tabel_warga.no_kk AND tabel_warga.status_keluarga='Kepala Keluarga' LIMIT ".$limit_start.",".$limit;
                                        }

                                        $query = mysqli_query($koneksi, $sql);


                                        if (mysqli_num_rows($query) < 1) {
                                            echo "Tidak Ada Data";
                                        } else {
                                            echo "<thead>";
                                            echo "<tr>";
                                            echo "<th>No.</th>";
                                            echo "<th>No. KK</th>";
                                            echo "<th>Kepala Keluarga</th>";
                                            echo "<th>Tetap / Kontrak</th>";
                                            echo "<th>Jamsos</th>";
                                            echo "<th>Jumlah Anggota</th>";
                                            echo "</tr>";
                                            echo "</thead>";
                                        }

                                        $no = 1;

                                        

                                        while ($row = mysqli_fetch_array($query)){

                                            $id = $row['no_kk'];
                                            $sql2 = mysqli_query($koneksi, "SELECT * FROM tabel_warga WHERE no_kk='$id'");
                                            $jumlahanggotakk = mysqli_num_rows($sql2);

                                            echo "<tbody>";
                                            echo "<tr>";
                                            echo "<td>".$no++."</td>";
                                            echo "<td>".$row['no_kk']."</td>";
                                            echo "<td>".$row['nama']."</td>";
                                            echo "<td>".$row['penghuni']."</td>";
                                            echo "<td>".$row['jamsos']."</td>";
                                            echo "<td>".$jumlahanggotakk."</td>";
                                            echo "</tr>";
                                            echo "</tbody>";

                                        }

                                        ?>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.panel -->

                            <div class="row">
                                <div class="col-lg-6">
                            <!--
                                Buat paginationnya
                                Dengan bootstrap, kita jadi dimudahkan untuk membuat tombol-tombol pagination dengan design yang
                                bagus tentunya -->
                                <ul class="pagination">
                                    <!-- LINK FIRST AND PREV -->
                                    <?php
                                if ($page == 1) { // Jika page adalah pake ke 1, maka disable link PREV
                                    ?>
                                    <li class="disabled"><a href="#">First</a></li>
                                    <li class="disabled"><a href="#">&laquo;</a></li>
                                    <?php
                                } else { // Jika buka page ke 1
                                    $link_prev = ($page > 1) ? $page - 1 : 1;
                                    ?>
                                    <li><a href="laporan-warga.php?page=1">First</a></li>
                                    <li><a href="laporan-warga?page=<?php echo $link_prev; ?>">&laquo;</a></li>
                                    <?php
                                }
                                ?>

                                <!-- LINK NUMBER -->
                                <?php
                                // Buat query untuk menghitung semua jumlah data
                                $sql2 = "SELECT COUNT(*) AS jmlh FROM tabel_kk";
                                $query2 = mysqli_query($koneksi, $sql2);
                                $get_jumlah = mysqli_fetch_array($query2);

                                $jumlah_page = ceil($get_jumlah['jmlh'] / $limit); // Hitung jumlah halamanya
                                $jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
                                $start_number = ($page > $jumlah_number) ? $page - $jumlah_number : 1; // Untuk awal link member
                                $end_number = ($page < ($jumlah_page - $jumlah_number)) ? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number

                                for ($i = $start_number; $i <= $end_number; $i++) {
                                    $link_active = ($page == $i) ? 'class="active"' : '';
                                    ?>
                                    <li <?php echo $link_active; ?>><a href="laporan-warga.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                    <?php
                                }
                                ?>

                                <!-- LINK NEXT AND LAST -->
                                <?php
                                // Jika page sama dengan jumlah page, maka disable link NEXT nya
                                // Artinya page tersebut adalah page terakhir
                                if ($page == $jumlah_page) { // Jika page terakhir
                                    ?>
                                    <li class="disabled"><a href="#">&raquo;</a></li>
                                    <li class="disabled"><a href="#">Last</a></li>
                                    <?php
                                } else { // Jika bukan page terakhir
                                    $link_next = ($page < $jumlah_page) ? $page + 1 : $jumlah_page;
                                    ?>
                                    <li><a href="laporan-warga.php?page=<?php echo $link_next; ?>">&raquo;</a></li>
                                    <li><a href="laporan-warga.php?page=<?php echo $jumlah_page; ?>">Last</a></li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <p><i>*Menampilkan maksimal 30 kk per halaman</i></p>
                    <p>Total Kepala Keluarga : <?php echo mysqli_num_rows($query);  ?></p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <a href="cetak-lapwarga.php" target="_blank"><button class="btn btn-primary">Cetak Laporan Warga</button></a>
        </div>
    </div>

    <!-- /.row -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php include("layout-footer.php"); ?>
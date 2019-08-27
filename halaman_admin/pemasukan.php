<?php 
$title = "Data Pemasukan";
include("layout-header.php");
include("function.php");
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Data Pemasukan</h1>
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
                                        // Cek apakah terdapat data pada page URL
                                        $page = (isset($_GET['page'])) ? $_GET['page'] : 1;

                                        $limit = 30; // Jumlah data per halamanya

                                        // Buat query untuk menampilkan daa ke berapa yang akan ditampilkan pada tabel yang ada di database
                                        $limit_start = ($page - 1) * $limit;

                                        if(isset($_GET['qcari'])){
                                            $qcari = $_GET['qcari'];
                                            $sql = "SELECT * FROM tabel_kelahiran, tabel_warga WHERE tabel_kelahiran.nama_anak like '%$qcari%' AND tabel_kelahiran.no_kk = tabel_warga.no_kk AND tabel_warga.status_keluarga = 'Kepala Keluarga'";
                                        } else{
                                            $sql = "SELECT * FROM tabel_pemasukan, tabel_warga WHERE tabel_pemasukan.no_kk = tabel_warga.no_kk AND tabel_warga.status_keluarga = 'Kepala Keluarga' LIMIT ".$limit_start.",".$limit;
                                        }

                                        $query = mysqli_query($koneksi, $sql);

                                        if (mysqli_num_rows($query) < 1) {
                                            echo "Tidak Ada Data";
                                        } else {
                                            echo "<thead>";
                                            echo "<tr>";
                                            echo "<th>No.</th>";
                                            echo "<th>Invoice</th>";
                                            echo "<th>No. KK</th>";
                                            echo "<th>Kepala Keluarga</th>";
                                            echo "<th>Bulan</th>";
                                            echo "<th>Tanggal Bayar</th>";
                                            echo "<th>Nominal</th>";
                                            echo "<th>Jenis</th>";
                                            echo "<th>Aksi</th>";
                                            echo "</tr>";
                                            echo "</thead>";
                                        }

                                        $no = 1;

                                        while ($row = mysqli_fetch_array($query)){
                                            $pemasukan[] = $row['nominal'];
                                            $total_pemasukan = array_sum($pemasukan);
                                            echo "<tbody>";
                                            echo "<tr>";
                                            echo "<td>".$no++."</td>";
                                            echo "<td>".$row['invoice_iuran']."</td>";
                                            echo "<td>".$row['no_kk']."</td>";
                                            echo "<td>".$row['nama']."</td>";
                                            echo "<td>".$row['bulan']."</td>";
                                            echo "<td>".tanggal_tabel($row['tgl_bayar'])."</td>";
                                            echo "<td> Rp ".rupiah($row['nominal'])."</td>";
                                            echo "<td>".$row['jenis']."</td>";
                                            echo "<td>";
                                            echo "</a> <a class='btn btn-danger' data-toggle='tooltip' data-placement='left' title='Hapus' href='iuran-hapus.php?id=".$row['invoice_iuran']."' onClick ='return hapus()'><i class='fa fa-trash fa-fw'></i></a> ";
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
                                    <li><a href="pemasukan.php?page=1">First</a></li>
                                    <li><a href="pemasukan?page=<?php echo $link_prev; ?>">&laquo;</a></li>
                                    <?php
                                }
                                ?>

                                <!-- LINK NUMBER -->
                                <?php
                                // Buat query untuk menghitung semua jumlah data
                                $sql2 = "SELECT COUNT(*) AS jmlh FROM tabel_pemasukan";
                                $query2 = mysqli_query($koneksi, $sql2);
                                $get_jumlah = mysqli_fetch_array($query2);

                                $jumlah_page = ceil($get_jumlah['jmlh'] / $limit); // Hitung jumlah halamanya
                                $jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
                                $start_number = ($page > $jumlah_number) ? $page - $jumlah_number : 1; // Untuk awal link member
                                $end_number = ($page < ($jumlah_page - $jumlah_number)) ? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number

                                for ($i = $start_number; $i <= $end_number; $i++) {
                                    $link_active = ($page == $i) ? 'class="active"' : '';
                                    ?>
                                    <li <?php echo $link_active; ?>><a href="pemasukan.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
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
                                    <li><a href="pemasukan.php?page=<?php echo $link_next; ?>">&raquo;</a></li>
                                    <li><a href="pemasukan.php?page=<?php echo $jumlah_page; ?>">Last</a></li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <p><i>*Menampilkan maksimal 30 data per halaman</i></p>
                    <p>Total Saldo Pemasukan : <?php echo "Rp ".rupiah($total_pemasukan);  ?></p>
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

</div>
<!-- /#wrapper -->

<?php include("layout-footer.php"); ?>
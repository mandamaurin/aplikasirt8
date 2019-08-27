<?php 
    $title = "Data Buku";
    include("layout-header.php");
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data Buku</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
         
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">

                            <div class="row">
                             <div class="box-tools" style="width: 350px; margin-left: 35px; margin-bottom: 20px;">
                                <form action="buku-listpinjam.php" method="GET">
                                    <div class="input-group">
                                    <input type='text' class="form-control input-sm pull-right" name='qcari' placeholder='Cari Berdasarkan Judul atau Pengarang atau Tahun' required /> 
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-default" type="submit"><i class="fa fa-search"></i></button>
                                    </div>
                                    </div>
                                 </form>
                            </div>
                            </div>

                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <?php
                                        $page = (isset($_GET['page'])) ? $_GET['page'] : 1;

                                        $limit = 25; // Jumlah data per halamanya

                                        // Buat query untuk menampilkan daa ke berapa yang akan ditampilkan pada tabel yang ada di database
                                        $limit_start = ($page - 1) * $limit;
                                        $totalstok = '';

                                        if(isset($_GET['qcari'])){
                                            $qcari = $_GET['qcari'];
                                            $sql = "SELECT * FROM buku WHERE judul like '%$qcari%'  or pengarang like '%$qcari%' or tahun like '%$qcari%' LIMIT ".$limit_start.",".$limit;
                                        } else{
                                            $sql = "SELECT * FROM buku LIMIT ".$limit_start.",".$limit;
                                        }

                                        $query = mysqli_query($koneksi, $sql);

                                        if (mysqli_num_rows($query) < 1) {
                                            echo "Tidak Ada Data";
                                        } else {
                                            echo "<thead>";
                                                echo "<tr>";
                                                echo "<th>Id</th>";
                                                echo "<th>Gambar</th>";
                                                echo "<th>Kode Inventaris</th>";
                                                echo "<th>ISBN</th>";
                                                echo "<th>Judul</th>";
                                                echo "<th>Pengarang</th>";
                                                echo "<th>Penerbit</th>";
                                                echo "<th>Tahun</th>";
                                                echo "<th>Stok</th>";
                                                echo "<th>Aksi</th>";
                                                echo "</tr>";
                                            echo "</thead>";
                                        }

                                        while ($buku = mysqli_fetch_array($query)){
                                            echo "<tbody>";
                                            echo "<tr>";
                                            echo "<td>".$buku['id_buku']."</td>";
                                            echo "<td><img src='gambar_buku/".$buku['foto']."' width='100' height='100'></td>";
                                            echo "<td>".$buku['kode']."</td>";
                                            echo "<td>".$buku['isbn']."</td>";
                                            echo "<td>".$buku['judul']."</td>";
                                            echo "<td>".$buku['pengarang']."</td>";
                                            echo "<td>".$buku['penerbit']."</td>";
                                            echo "<td>".$buku['tahun']."</td>";
                                            echo "<td>".$buku['stok']."</td>";
                                            echo "<td>";
                                            echo "<a class='btn btn-primary' href='pinjam-form.php?id_buku=".$buku['id_buku']."'>Pinjam</a>";
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
                            <li><a href="buku-listpinjam.php?page=1">First</a></li>
                            <li><a href="buku-listpinjam?page=<?php echo $link_prev; ?>">&laquo;</a></li>
                            <?php
                                }
                            ?>

                            <!-- LINK NUMBER -->
                            <?php
                                // Buat query untuk menghitung semua jumlah data
                                $sql2 = "SELECT COUNT(*) AS jmlh FROM buku";
                                $query2 = mysqli_query($koneksi, $sql2);
                                $get_jumlah = mysqli_fetch_array($query2);

                                $jumlah_page = ceil($get_jumlah['jmlh'] / $limit); // Hitung jumlah halamanya
                                $jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
                                $start_number = ($page > $jumlah_number) ? $page - $jumlah_number : 1; // Untuk awal link member
                                $end_number = ($page < ($jumlah_page - $jumlah_number)) ? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number

                                for ($i = $start_number; $i <= $end_number; $i++) {
                                    $link_active = ($page == $i) ? 'class="active"' : '';
                                ?>
                                <li <?php echo $link_active; ?>><a href="buku-listpinjam.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
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
                            <li><a href="buku-listpinjam.php?page=<?php echo $link_next; ?>">&raquo;</a></li>
                            <li><a href="buku-listpinjam.php?page=<?php echo $jumlah_page; ?>">Last</a></li>
                            <?php
                                }
                            ?>
                         </ul>
                        </div>
                    </div>
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
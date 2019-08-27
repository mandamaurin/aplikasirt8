<?php 
    $title = "Tambah Iuran Pemasukan";
    include("layout-header.php");
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tambah Data Pemasukan</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
         
                        <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form  method="POST" enctype="multipart/form-data" action="iuran-tambah.php" role="form">
                                        <div class="form-group">
                                            <label>Kepala Keluarga</label>
                                            <select class="form-control" name="kk">
                                                <option>-- Pilih Kepala Keluarga --</option>
                                                <?php
                                                    $sql = "SELECT * FROM tabel_warga WHERE status_keluarga = 'Kepala Keluarga'";
                                                    $query = mysqli_query($koneksi, $sql);

                                                    if (mysqli_num_rows($query) < 1) {
                                                        echo "<option>Belum Ada Kategori</option>";
                                                    }

                                                    while ($row = mysqli_fetch_array($query)){
                                                ?> 
                                                    <option value="<?php echo $row['no_kk'] ?>"> <?php echo $row['nama'] ?></option>
                                             <?php } ?>
                                                   
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Bulan</label>
                                            <select class="form-control" name="bulan">
                                                <option>-- Pilih Bulan --</option>
                                                <option value="Januari">Januari</option>
                                                <option value="Februari">Februari</option>
                                                <option value="Maret">Maret</option>
                                                <option value="April">April</option>
                                                <option value="Mei">Mei</option>
                                                <option value="Juni">Juni</option>
                                                <option value="Juli">Juli</option>
                                                <option value="Agustus">Agustus</option>
                                                <option value="September">September</option>
                                                <option value="Oktober">Oktober</option>
                                                <option value="November">November</option>
                                                <option value="Desember">Desember</option>
                                                   
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Nominal</label>
                                            <input class="form-control" name="nominal" placeholder="Nominal, Cth: 10000 (tanpa titik)">
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis</label>
                                            <select class="form-control" name="jenis">
                                                <option>-- Jenis Pemasukan --</option>
                                                <option value="Iuran Kas Bulanan">Iuran Kas Bulanan</option>
                                                <option value="Sumbangan">Sumbangan</option>
                                                   
                                            </select>
                                        </div>
                                        <input type="submit" name="tambah" class="btn btn-primary" value="Tambah"/>
                                    </form>
                                </div>
                            </div>
                            <!-- /.row -->
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

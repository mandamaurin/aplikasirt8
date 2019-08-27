<?php 
$title = "Tambah Iuran Pengeluaran";
include("layout-header.php");
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tambah Pengeluaran</h1>
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
                            <form  method="POST" enctype="multipart/form-data" action="pengeluaran-proses.php" role="form">
                                <div class="form-group">
                                    <label>Nama Pengeluaran</label>
                                    <input class="form-control" name="nama" placeholder="Nama / Jenis Pengeluaran">
                                </div>
                                <div class="form-group">
                                    <label>Nominal</label>
                                    <input class="form-control" name="nominal" placeholder="Nominal, Cth: 10000 (tanpa titik)">
                                </div>
                                <div class="form-group">
                                    <label>Penanggung Jawab</label>
                                    <select class="form-control" name="nik">
                                    <option>-- Pilih Penanggung Jawab --</option>
                                        <?php
                                        $sql = "SELECT * FROM tabel_warga ";
                                        $query = mysqli_query($koneksi, $sql);

                                        if (mysqli_num_rows($query) < 1) {
                                            echo "<option>Belum Ada Kategori</option>";
                                        }

                                        while ($row = mysqli_fetch_array($query)){
                                            ?> 
                                            <option value="<?php echo $row['nik'] ?>"> <?php echo $row['nama'] ?></option>
                                            <?php } ?>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <textarea class="form-control" name="keterangan" placeholder="Keterangan"></textarea>
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

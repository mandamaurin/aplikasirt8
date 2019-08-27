<?php 
$title = "Tambah Data Warga";
include("layout-header.php");
$id = $_GET['id'];
$sql = mysqli_query($koneksi, "SELECT * FROM tabel_warga WHERE no_kk = '$id'");
$kk = mysqli_fetch_assoc($sql)
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tambah Data Warga</h1>
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
                            <form  method="POST" enctype="multipart/form-data" action="warga-tambah.php" role="form">
                                <div class="form-group">
                                    <label>No. KK</label>
                                    <input class="form-control" name="kk" placeholder="No. KK" value="<?php echo $kk['no_kk'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>NIK</label>
                                    <input class="form-control" name="nik" placeholder="NIK">
                                </div>
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input class="form-control" name="nama" placeholder="Nama Lengkap">
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select class="form-control" name="jk">
                                        <option value="Pria">Pria</option>
                                        <option value="Wanita">Wanita</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tempat Lahir</label>
                                    <input class="form-control" name="tempat" placeholder="Tempat Lahir">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input class="form-control" type="date" name="tgl">
                                </div>
                                <div class="form-group">
                                    <label>Agama</label>
                                    <select class="form-control" name="agama">
                                        <option value="Islam">Islam</option>
                                        <option value="Protestan">Protestan</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Buddha">Buddha</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Pekerjaan</label>
                                    <input class="form-control" name="kerja" placeholder="Pekerjaan">
                                </div>
                                <div class="form-group">
                                    <label>Pendidikan Terakhir</label>
                                    <select class="form-control" name="pend">
                                        <option value="SD">SD</option>
                                        <option value="SMP">SMP</option>
                                        <option value="SMA">SMA</option>
                                        <option value="SMK">SMK</option>
                                        <option value= "S1">S1</option>
                                        <option value= "S2">S2</option>
                                        <option value= "S3">S3</option>
                                        <option value= "Belum Sekolah">Belum Sekolah</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Status Kawin</label>
                                    <select class="form-control" name="kawin">
                                        <option value="Kawin">Kawin</option>
                                        <option value="Belum Kawin">Belum Kawin</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Hubungan Keluarga</label>
                                    <select class="form-control" name="hubkeluarga">
                                        <option value="Kepala Keluarga">Kepala Keluarga</option>
                                        <option value="Istri">Istri</option>
                                        <option value="Anak">Anak</option>
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

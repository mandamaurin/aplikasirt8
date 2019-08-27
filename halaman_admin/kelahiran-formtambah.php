<?php 
$title = "Tambah Data Kelahiran Warga";
include("layout-header.php");
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tambah Data Kelahiran</h1>
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
                            <form  method="POST" enctype="multipart/form-data" action="kelahiran-tambah.php" role="form">
                                <div class="form-group">
                                    <label>No. Kelahiran</label>
                                    <input class="form-control" name="nolahir" placeholder="No. Kelahiran">
                                </div>
                                <div class="form-group">
                                    <label>No. KK</label>
                                    <input class="form-control" name="kk" placeholder="No. KK">
                                </div>
                                <div class="form-group">
                                    <label>Nama Anak</label>
                                    <input class="form-control" name="nama" placeholder="Nama Lengkap Anak">
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select class="form-control" name="jk">
                                        <option value="L">Laki-Laki</option>
                                        <option value="P">Perempuan</option>
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

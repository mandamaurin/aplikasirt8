<?php 
    $title = "Tambah Data Kematian Warga";
    include("layout-header.php");
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tambah Data Kematian</h1>
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
                                    <form  method="POST" enctype="multipart/form-data" action="kematian-tambah.php" role="form">
                                        <div class="form-group">
                                            <label>No. Kematian</label>
                                            <input class="form-control" name="nomati" placeholder="No. Kematian">
                                        </div>
                                        <div class="form-group">
                                            <label>NIK</label>
                                            <input class="form-control" name="nik" placeholder="No. KK">
                                        </div>
                                        <div class="form-group">
                                            <label>Tempat Kematian</label>
                                            <input class="form-control" name="tempat" placeholder="Tempat Kematian">
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Kematian</label>
                                            <input class="form-control" type="date" name="tgl">
                                        </div>
                                        <div class="form-group">
                                            <label>Sebab Kematian</label>
                                            <input class="form-control" name="sebab" placeholder="Sebab Kematian">
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

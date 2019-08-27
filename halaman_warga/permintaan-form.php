<?php 
$title = "Ajukan Surat Pengantar";
include("layout-header.php");
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Ajukan Surat Pengantar</h1>
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
                        <form  method="POST" enctype="multipart/form-data" action="permintaan-proses.php" role="form">
                                <div class="form-group">
                                    <label>Pilih Jenis Surat Pengantar</label>
                                    <select class="form-control" name="jenis">
                                        <option value="SKCK">KK</option>
                                        <option value="KTP">KTP</option>
                                        <option value="KTP">SKCK</option>
                                        <option value="SKTM">SKTM</option>
                                        <option value="Akta Kelahiran">Akta Kelahiran</option>
                                        <option value="Akta Kematian">Akta Kematian</option>
                                        <option value="Lain-Lain">Lainnya</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <textarea class="form-control" name="keterangan" placeholder="Pesan Tambahan atau Jenis Surat Pengantar (Bila tidak terdapat di pilihan)"></textarea>
                                </div>
                                <input type="submit" name="kirim" class="btn btn-primary" value="Kirim"/>
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

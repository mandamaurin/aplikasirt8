<?php 
$title = "Data Semua Warga";
include("layout-header.php");
include("function.php");
$id = $_GET['id'];
$sql = mysqli_query($koneksi, "SELECT * FROM tabel_kk WHERE no_kk = '$id'");
$kk = mysqli_fetch_assoc($sql)
?>

<div id="page-wrapper">
    <div class="row">
    <div class="col-lg-12">
         <h2 class="page-header">Data Warga KK: <?php echo $kk['no_kk'] ?></h2>
         <a href="warga-formtambah.php?id=<?php echo $id ?>"><button class="btn btn-primary" style="margin-bottom: 10px;"> <i class="fa fa-plus fa-fw"></i> Tambah Anggota Keluarga</button></a>
     </div>
 </div>

<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
        <?php

        $sql1 = "SELECT * FROM tabel_warga WHERE no_kk = '$id'";
        $query = mysqli_query($koneksi, $sql1);

        if (mysqli_num_rows($query) < 1) {
            echo "Tidak Ada Data";
        } else {
            echo "<thead>";
            echo "<tr>";
            echo "<th>No.</th>";
            echo "<th>No. KK</th>";
            echo "<th>NIK</th>";
            echo "<th>Nama</th>";
            echo "<th>JK</th>";
            echo "<th>Tempat, Tgl Lahir</th>";
            echo "<th>Agama</th>";
            echo "<th>Pekerjaan</th>";
            echo "<th>Pendidikan</th>";
            echo "<th>Status Kawin</th>";
            echo "<th>Hubungan dalam Keluarga</th>";
            echo "<th>Aksi</th>";
            echo "</tr>";
            echo "</thead>";
        }

        $no = 1;

        while ($row = mysqli_fetch_array($query)){

            echo "<tbody>";
            echo "<tr>";
            echo "<td>".$no++."</td>";
            echo "<td>".$row['no_kk']."</td>";
            echo "<td>".$row['nik']."</td>";
            echo "<td>".$row['nama']."</td>";
            echo "<td>".$row['jk']."</td>";
            echo "<td>".$row['tempat_lahir'].",".tanggal_tabel($row['tgl_lahir'])."</td>";
            echo "<td>".$row['agama']."</td>";
            echo "<td>".$row['pekerjaan']."</td>";
            echo "<td>".$row['pendidikan']."</td>";
            echo "<td>".$row['status_kawin']."</td>";
            echo "<td>".$row['status_keluarga']."</td>";
            echo "<td>";
            echo "<a class='btn btn-warning' data-toggle='tooltip data-placement='left' title='Edit' href='warga-formedit.php?id=".$row['nik']."'><i class='fa fa-edit fa-fw'></i></a>  <a class='btn btn-danger' data-toggle='tooltip' data-placement='left' title='Hapus' href='warga-hapus.php?id=".$row['nik']."' onClick ='return hapus()'><i class='fa fa-trash fa-fw'></i></a>"; 
            echo "</td>";
            echo "</tr>";
            echo "</tbody>";                                       
        }
        ?>
    </table>
</div><!-- /.table responsive -->

</div>
<!-- /.page-wrapper -->


<?php include("layout-footer.php"); ?>
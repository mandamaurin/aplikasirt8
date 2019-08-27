<?php 
session_start();
include("../koneksi.php");
$sql = "SELECT username FROM tabel_user WHERE username ='".$_SESSION['username']."'";
$query = mysqli_query($koneksi, $sql);
$kk = mysqli_fetch_assoc($query);

$sql1 = "SELECT * FROM tabel_warga, tabel_kk WHERE tabel_warga.no_kk = tabel_kk.no_kk AND tabel_kk.username = '".$_SESSION['username']."'";
$query1 = mysqli_query($koneksi, $sql1);
$keluarga = mysqli_fetch_assoc($query);

// cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']==""){
header("location:../login.php?pesan=gagal");
}

function tanggal_tabel($tanggal){

$bulan = array(1 => 'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Juni', 'Juli', 'Agust', 'Sept', 'Okt', 'Nov', 'Des');
$split = explode('-', $tanggal);
return $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> <?php echo $title ?> </title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script type="text/javascript">
            function hapus(){
                var msg = "Apakah Anda Yakin Akan Menghapusnya?"
                agree = confirm(msg)
                if(agree)
                    return true
                else 
                    return false
            }

            function prosesAkte(){
                var msg = "Akte Diproses?"
                agree = confirm(msg)
                if(agree)
                    return true
                else 
                    return false
            }

            function akteJadi(){
                var msg = "Akte Sudah Jadi?"
                agree = confirm(msg)
                if(agree)
                    return true
                else 
                    return false
            }

            function kembali(){
                var msg = "Apakah Buku Sudah Dikembalikan?"
                agree = confirm(msg)
                if(agree)
                    return true
                else
                    return false
            }
        </script>

    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">Aplikasi Administrasi Warga RT 08/13</a>
                </div>
                <!-- /.navbar-header -->

                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i>
                            <span><?php echo $_SESSION['username']; ?> <i class="caret"></i></span>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="../logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li>
                                <a href="keluarga-list.php"><i class="fa fa-users fa-fw"></i> Data Keluarga Saya</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-envelope fa-fw"></i> Surat Pengantar<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="permintaan-form.php">Ajukan Permohonan Surat</a>
                                    </li>
                                    <li>
                                        <a href="ajuansurat.php">Ajuan Permohonan Surat</a> 
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>

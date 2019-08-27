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

            function hapusKK(){
                var msg = "Penghapusan KK akan menghapus seluruh anggota keluarga. Yakin hapus?"
                agree = confirm(msg)
                if(agree)
                    return true
                else 
                    return false
            }

            function proses(){
                var msg = "Akte Diproses?"
                agree = confirm(msg)
                if(agree)
                    return true
                else 
                    return false
            }

            function suratJadi(){
                var msg = "Surat Pengantar Siap Diambil?"
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

        <?php 
        session_start();
        include("../koneksi.php");

    // cek apakah yang mengakses halaman ini sudah login
        if($_SESSION['level']==""){
            header("location:../login.php?pesan=gagal");
        }

        ?>

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
                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i><?php echo $_SESSION['username']; ?> <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="../logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li>
                                <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="ajuansurat.php"><i class="fa fa-envelope fa-fw"></i> Permohonan Surat</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-users fa-fw"></i> Data Warga<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="lihatwarga.php">Data Warga</a>
                                    </li>
                                    <li>
                                        <a href="warga-formkk.php">Tambah KK Baru</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-money fa-fw"></i> Iuran Kas<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="pemasukan.php">Pemasukan</a>
                                    </li>
                                    <li>
                                        <a href="pemasukan-formtambah.php">Tambah Pemasukan</a>
                                    </li>
                                    <!--<li>
                                        <a href="#">Tambah Pemasukan <span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">
                                        <li>
                                            <a href="pemasukan-formtambah.php">Iuran Bulanan</a>
                                        </li>
                                        <li>
                                            <a href="pemasukan1-formtambah.php">Non Iuran Bulanan</a>
                                        </li>
                                    </ul>
                                    
                                    </li>-->
                                    <li>
                                        <a href="pengeluaran.php">Pengeluaran</a>
                                    </li>
                                    <li>
                                        <a href="pengeluaran-formtambah.php">Tambah Pengeluaran</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-book fa-fw"></i> Data Kelahiran<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="kelahiran-list.php">Data Kelahiran</a>
                                    </li>
                                    <li>
                                        <a href="kelahiran-formtambah.php">Tambah Data Kelahiran</a> 
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-book fa-fw"></i> Data Kematian<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="kematian-list.php">Data Kematian</a>
                                    </li>
                                    <li>
                                        <a href="kematian-formtambah.php">Tambah Data Kematian</a> 
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-book fa-fw"></i> Laporan<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="cetak-lapkeuangan.php" target="_blank">Laporan Keuangan</a>
                                    </li>
                                    <li>
                                        <a href="cetak-lapwarga.php" target="_blank">Laporan Data Warga</a>
                                    </li>
                                    <li>
                                        <a href="cetak-lapkelahiran.php" target="_blank">Laporan Data Kelahiran</a>
                                    </li>
                                    <li>
                                        <a href="cetak-lapkematian.php" target="_blank">Laporan Data Kematian</a>
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

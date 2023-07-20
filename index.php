<?php 

    include "koneksi.php";

    session_start();

    if ( !isset($_SESSION["login"])) {
        header("Location: login.php");
        exit;
    }

    $id_anggota = $_SESSION['id_anggota'];
    $query = mysqli_query($conn, "SELECT * FROM tb_karyawan WHERE id_anggota = '$id_anggota'");
    $data = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Skripsi</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />

</head>

<body id="page-top">

    <div id="wrapper">

        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-0">
                    <img src="img/Logo.png" alt="" style="width:30px">
                </div>
                <div class="sidebar-brand-text mx-3">Dinas Sosial</div>
            </a>

            <hr class="sidebar-divider my-0">

            <li class="nav-item active">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Data Pribadi</span></a>
            </li>

            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" href="admin/data_karyawan/view.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Karyawan</span></a>
            </li>

            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" href="admin/jenis_perizinan/view.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Jenis Perizinan</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="admin/data_perizinan/view.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Perizinan Karyawan</span></a>
            </li>

            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Unduh Laporan</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="../unduh/data_karyawan.php">Laporan Data Karyawan</a>
                        <a class="collapse-item" href="../unduh/data_perizinan.php">Laporan Data Perizinan</a>
                    </div>
                </div>
            </li>

            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" href="logout.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Keluar</span></a>
            </li>

            <hr class="sidebar-divider my-0">

        </ul>

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span <?php 
                                    include "koneksi.php";
                                    $query=mysqli_query($conn, "SELECT * FROM tb_karyawan WHERE id_anggota = $id_anggota");
                                    $data=mysqli_fetch_array($query);
                                    ?>
                                    class="mr-2 d-none d-lg-inline text-gray-800 small"><?php echo $data['nama_karyawan']; ?></span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                        </li>

                    </ul>

                </nav>

                <div class="container-fluid">

                    <div class="container-fluid">

                        <h1 class="h3 mb-2 text-gray-800">Data Pribadi</h1>

                        <div class="card shadow mb-4">
                            <div class="card-body">

                                <?php 

                            include "koneksi.php";
                            
                            // $_SESSION["id_anggota"] = "id";
                            $request = mysqli_query($conn, "SELECT * FROM tb_karyawan");
                            $data = mysqli_fetch_array($request);

                            function jenis_kelamin($id)
                            {

                                switch ($id) {
                                    case '1':
                                        return "Perempuan";
                                    case '2':
                                        return "Laki-laki";
                                    default:
                                        return "-";
                                }
                            }

                        ?>

                                <h6 class="m-0 font-weight-bold text-primary">
                                    <a href="admin/data_karyawan/ubah_sandi.php" class="btn btn-primary mb-4">Ubah Kata
                                        Sandi</a>
                                </h6>

                                <div class="card" style="width: 50%;">
                                    <ul class="list-group list-group-flush" style="width: 100%">
                                        <li class="list-group-item" style="width: 100%">
                                            <div style="display: flex;">
                                                <span style="width: 50%;">Nama Lengkap</span>
                                                <span style="width: 50%;">
                                                    : <b><?php echo $data['nama_karyawan']; ?></b>
                                                </span>
                                            </div>
                                        </li>
                                        <li class="list-group-item" style="width: 100%">
                                            <div style="display: flex;">
                                                <span style="width: 50%;">NIP</span>
                                                <span style="width: 50%;">
                                                    : <b><?php echo $data['nip']; ?></b>
                                                </span>
                                            </div>
                                        </li>
                                        <li class="list-group-item" style="width: 100%">
                                            <div style="display: flex;">
                                                <span style="width: 50%">Jenis Kelamin</span>
                                                <span style="width: 50%;">
                                                    : <b><?php echo ($data['jk']); ?></b>
                                                </span>
                                            </div>
                                        </li>
                                        <li class="list-group-item" style="width: 100%">
                                            <div style="display: flex;">
                                                <span style="width: 50%">Golongan</span>
                                                <span style="width: 50%;">
                                                    : <b><?php echo $data['golongan']; ?></b>
                                                </span>
                                            </div>
                                        </li>
                                        <li class="list-group-item" style="width: 100%">
                                            <div style="display: flex;">
                                                <span style="width: 50%">Jabatan</span>
                                                <span style="width: 50%;">
                                                    : <b><?php echo $data['jabatan']; ?></b>
                                                </span>
                                            </div>

                                        </li>
                                        <li class="list-group-item" style="width: 100%">
                                            <div style="display: flex;">
                                                <span style="width: 50%">Ruangan</span>
                                                <span style="width: 50%;">
                                                    : <b><?php echo $data['ruangan']; ?></b>
                                                </span>
                                            </div>

                                        </li>
                                        <li class="list-group-item" style="width: 100%">
                                            <div style="display: flex;">
                                                <span style="width: 50%">Keterangan</span>
                                                <span style="width: 50%;">
                                                    : <b><?php echo $data['keterangan']; ?></b>
                                                </span>
                                            </div>

                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

            <script src="plugins/jquery/jquery.min.js"></script>

            <!-- Bootstrap core JavaScript-->
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="js/sb-admin-2.min.js"></script>

            <!-- Page level plugins -->
            <script src="vendor/chart.js/Chart.min.js"></script>

            <!-- Page level custom scripts -->
            <script src="js/demo/chart-area-demo.js"></script>
            <script src="js/demo/chart-pie-demo.js"></script>

            <!-- Page level plugins -->
            <script src="vendor/datatables/jquery.dataTables.min.js"></script>
            <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

            <!-- Page level custom scripts -->
            <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>YAYASAN TARBIYATUT THOLABAH</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">

    <!-- data table -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css"
        id="main-style-link">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css"
        id="main-style-link">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.bootstrap5.min.css"
        id="main-style-link">

    <style>
    
    table,
    th,
    td {
        font-size: 13p x;
    }

    .a {
        padding: 0px;
        margin-top: 0px;
        margin-bottom: 2px;

    }

    .b {
        padding: 2px;
        margin-top: 0px;
        margin-bottom: 3px;

    }

    .d {
        padding: 0px;
        margin-top: 0px;
        margin-bottom: 3px;

    }

    .e {
        padding: 0px;
        margin-top: 0px;
        margin-bottom: 0px;
        line-height: 1.1;

    }

    .f {
        padding: 0px;
        margin-top: 0px;
        margin-bottom: 0px;
        line-height: 1.1;
        vertical-align: middle;

    }
    .g {
        padding: 0px;
        margin-top: 0px;
        margin-bottom: 0px;
        line-height: 1.1;
        vertical-align: middle;

    }

    .c {
        height: 200px;

    }
    </style>

</head>

<body class="hold-transition sidebar-mini sidebar-collapse">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <button type="button" class="btn btn-primary">Log out</button>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="../../index3.html" class="brand-link">
                <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">
                    <h6>TARBIYATUT THOLABAH</h6>
                </span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Alexander Pierce</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="transaksi" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    TRANSAKSI
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="cicilan" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    CICILAN
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    LAPORAN
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pemasukan Tahun Ini</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pemasukan Bulan Ini</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pemasukan Hari Ini</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    MASTER R
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="r_tingkat" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>R Tingkat</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="r_ruang" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>R Ruang</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="r_status" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>R Status</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="r_kelompok" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>R Kelompok</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="r_madin" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>R Madin</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="r_kamar" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>R Kamar</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    MASTER SISWA
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="siswa" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Siswa</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="siswaaktif" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Siswa Aktif</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="lembaga" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Lembaga</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    MASTER PEMBAYARAN
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="jenistagihan" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Jenis Tagihan</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="user" class="nav-link">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    MASTER USER
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <?= $this->renderSection('content'); ?>
        <!-- /.content-wrapper -->


        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.2.0
            </div>
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>

</body>
<!-- data table -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src=https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.colVis.min.js"></script>
<script>
$(document).ready(function() {
    var table = $('#example').DataTable({
        lengthChange: false
    });

    table.buttons().container()
        .appendTo('#example_wrapper .col-md-6:eq(0)');
});
</script>

</html>
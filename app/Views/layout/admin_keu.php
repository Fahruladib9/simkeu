<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?= $this->renderSection('title'); ?>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url(); ?>template/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?= base_url(); ?>template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url(); ?>template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?= base_url(); ?>template/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>template/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url(); ?>template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= base_url(); ?>template/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?= base_url(); ?>template/plugins/summernote/summernote-bs4.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url(); ?>template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- selectsize -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />

    <?= $this->renderSection('css'); ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
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

                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?= base_url(); ?>" class="brand-link">
                <span class="brand-text font-weight-light ml-4">SIMKEU</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRC1VAXYbxjltrEGJoOIC8QGnon1kJv1-3IXHn2cqDj2g&s" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="<?= base_url(); ?>" class="d-block"><?= session('users')['nama']; ?></a>
                    </div>
                </div>

                <?php
                function active($id)
                {
                    $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
                    if ($url == $id) {
                        echo "active";
                    }
                }
                ?>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="<?= base_url(); ?>" class="nav-link <?= active('/'); ?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">Data User</li>
                        <li class="nav-item">
                            <a href="<?= base_url(); ?>users" class="nav-link <?= active('/users'); ?>">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Users
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="<?= base_url(); ?>santri" class="nav-link <?= active('/santri'); ?> ">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Santri
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">Settings</li>
                        <li class="nav-item ">
                            <a href="<?= base_url(); ?>donatur" class="nav-link <?= active('/donatur'); ?> ">
                                <i class="nav-icon fas fa-hand-holding-medical"></i>
                                <p>
                                    Donatur
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="<?= base_url(); ?>kelas" class="nav-link <?= active('/kelas'); ?> ">
                                <i class="nav-icon fas fa-layer-group"></i>
                                <p>
                                    Kelas
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">Transaksi</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link <?= active('/spp');
                                                        active('/masuk/donatur');
                                                        active('/masuk/koperasi');
                                                        active('/masuk/barber'); ?>">
                                <i class="nav-icon fas fa-money-bill-wave"></i>
                                <p>
                                    Keuangan Masuk
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url(); ?>spp" class="nav-link <?= active('/spp'); ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>SPP</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url(); ?>masuk/donatur" class="nav-link <?= active('/masuk/donatur'); ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Donatur</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url(); ?>masuk/koperasi" class="nav-link <?= active('/masuk/koperasi'); ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Koperasi</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url(); ?>masuk/barber" class="nav-link <?= active('/masuk/barber'); ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Barber</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url(); ?>keluar" class="nav-link <?= active('/keluar'); ?>">
                                <i class="nav-icon fas fa-receipt"></i>
                                <p>
                                    Keuangan Keluar
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">Laporan</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link <?= active('/laporan/spp');
                                                        active('/laporan/donatur');
                                                        active('/laporan/koperasi');
                                                        active('/laporan/barber'); ?>">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    Laporan
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url(); ?>laporan/spp" class="nav-link <?= active('/laporan/spp'); ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>SPP</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url(); ?>laporan/donatur" class="nav-link <?= active('/laporan/donatur'); ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Donatur</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url(); ?>laporan/koperasi" class="nav-link <?= active('/laporan/koperasi'); ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Koperasi</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url(); ?>laporan/barber" class="nav-link <?= active('/laporan/barber'); ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Barber</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url(); ?>logout" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    Logout
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
            <strong>Copyright &copy; 2024 <a href="<?= base_url(); ?>">Sistem Informasi Keuangan Pondok Pesantren Tahfiz Qur'an Ibadurrohman</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <!-- jQuery -->
    <script src="<?= base_url(); ?>template/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?= base_url(); ?>template/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url(); ?>template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="<?= base_url(); ?>template/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="<?= base_url(); ?>template/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="<?= base_url(); ?>template/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="<?= base_url(); ?>template/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?= base_url(); ?>template/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="<?= base_url(); ?>template/plugins/moment/moment.min.js"></script>
    <script src="<?= base_url(); ?>template/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?= base_url(); ?>template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="<?= base_url(); ?>template/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="<?= base_url(); ?>template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url(); ?>template/dist/js/adminlte.js"></script>
    <!-- sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- selectsize (search) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
    <script>
        // search dropdown
        $(document).ready(function() {
            $('.searchselect').selectize();
        });
    </script>

    <?= $this->renderSection('script'); ?>
</body>

</html>
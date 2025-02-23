<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?= base_url('admin') ?>" class="nav-link">Home</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" href="<?= base_url('admin/logout') ?>">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <span class="brand-text font-weight-light-bold">SIKAR</span>
                <span class="brand-text font-weight-light">Kerusakan Komputer</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?php echo base_url('./assets/foto/' . $user_data['foto']) ?>" alt="">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?= $user_data['nama'] ?></a>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" da ta-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <ul class="nav-header">ADMIN</ul>
                        <li class="nav-item">
                            <a href="<?= base_url('admin') ?>" class="nav-link <?php if ($this->uri->segment(2) == '') echo 'active' ?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>DASHBOARD</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/duser') ?>" class="nav-link <?php if ($this->uri->segment(2) == 'duser') echo 'active' ?>">
                                <i class="nav-icon fas fa-folder"></i>
                                <p>Data User</p>
                            </a>
                        </li>
                        <ul class="nav-header">DATA</ul>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/dkerusakan') ?>" class="nav-link <?php if ($this->uri->segment(2) == 'dkerusakan') echo 'active' ?>">
                                <i class="nav-icon fas fa-database"></i>
                                <p>Data Kerusakan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/dgejala') ?>" class="nav-link <?php if ($this->uri->segment(2) == 'dgejala') echo 'active' ?>">
                                <i class="nav-icon fas fa-database"></i>
                                <p>Data Gejala</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/bkasus') ?>" class="nav-link <?php if ($this->uri->segment(2) == 'bkasus') echo 'active' ?>">
                                <i class="nav-icon fas fa-database"></i>
                                <p>Basis Kasus</p>
                            </a>
                        </li>
                        <ul class="nav-header">LAPORAN</ul>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/ldiagnosa_fc') ?>" class="nav-link <?php if ($this->uri->segment(2) == 'ldiagnosa_fc') echo 'active' ?>">
                                <i class="nav-icon fas fa-clipboard-list"></i>
                                <p>Laporan Forward Chaining</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/ldiagnosa_bc') ?>" class="nav-link <?php if ($this->uri->segment(2) == 'ldiagnosa_bc') echo 'active' ?>">
                                <i class="nav-icon fas fa-clipboard-list"></i>
                                <p>Laporan Backward Chaining</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark"><?= $title ?></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active"><?= $title ?></li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
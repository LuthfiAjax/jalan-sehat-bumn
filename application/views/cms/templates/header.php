<!DOCTYPE html>
<html lang="en">
<?php date_default_timezone_set('Asia/Jakarta'); ?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/images/faveicon.png'); ?>">
    <title>Jalan Sehat - Dashboard</title>
    <link href="<?= base_url('assets/cms/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/cms/'); ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/cms/'); ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/cms/'); ?>css/ruang-admin.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.2.0/html5-qrcode.min.js"></script>
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    <img src="<?= base_url('assets/images/logo-panjang.png'); ?>">
                </div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('cms/dashboard'); ?>">
                    <i class="fas fa-fw fa-tachometer-alt text-info"></i>
                    <span>Dashboard</span></a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('cms/all-peserta'); ?>">
                    <i class="fas fa-fw fa-users text-warning"></i>
                    <span>Seluruh Peserta</span></a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('cms/peserta-hadir'); ?>">
                    <i class="fas fa-fw fa-users text-success"></i>
                    <span>Peserta Hadir</span></a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('cms/peserta-instansi'); ?>">
                    <i class="fas fa-fw fa-users text-primary"></i>
                    <span>Peserta Instansi</span></a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('cms/peserta-umum'); ?>">
                    <i class="fas fa-fw fa-users text-danger"></i>
                    <span>Peserta Umum</span></a>
            </li>
            <hr class="sidebar-divider">
        </ul>
        <!-- Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- TopBar -->
                <!-- TopBar -->
                <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
                    <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                        </li>
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img-profile rounded-circle" src="<?= base_url('assets/images/faveicon.png'); ?>" style="max-width: 60px">
                                <span class="ml-2 d-none d-lg-inline text-white small"><?= $user->nama_user; ?></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= base_url('portal/logout'); ?>">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- Topbar -->
                <!-- Topbar -->
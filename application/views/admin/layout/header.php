<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>
        <?= $appconfig['title']; ?> | SIMLOG
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url() ?>assets/images/icon.svg">


    <!-- third party css -->
    <link href="<?= base_url() ?>assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet"
        type="text/css" />
    <link href="<?= base_url() ?>assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css"
        rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet"
        type="text/css" />
    <link href="<?= base_url() ?>assets/libs/datatables.net-select-bs5/css/select.bootstrap5.min.css" rel="stylesheet"
        type="text/css" />
    <!-- third party css end -->

    <!-- Sweet Alert-->
    <link href="<?= base_url() ?>assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

    <!-- Vendor js -->
    <script src="<?= base_url() ?>assets/js/vendor.min.js"></script>

    <!-- JQuery js -->
    <script src="<?= base_url() ?>assets/js/jquery.js"></script>
    <script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/js/jquerypage.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>


    <!-- Plugins css -->
    <link href="<?= base_url() ?>assets/libs/mohithg-switchery/switchery.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/libs/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet"
        type="text/css" />

    <script src="<?= base_url() ?>assets/libs/selectize/js/standalone/selectize.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/mohithg-switchery/switchery.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/multiselect/js/jquery.multi-select.js"></script>
    <script src="<?= base_url() ?>assets/libs/select2/js/select2.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/jquery-mockjax/jquery.mockjax.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/devbridge-autocomplete/jquery.autocomplete.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>

    <!-- Loading button css -->
    <link href="<?= base_url() ?>assets/libs/ladda/ladda.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/libs/ladda/ladda-themeless.min.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap css -->
    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- App css -->
    <link href="<?= base_url() ?>assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />
    <!-- icons -->
    <link href="<?= base_url() ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    <!-- Head js -->
    <script src="<?= base_url() ?>assets/js/head.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

    <style>
        .tbanggaran {
            text-align: left;
        }
    </style>
</head>

<!-- body start -->

<body data-layout-mode="default" data-theme="light" data-topbar-color="dark" data-menu-position="fixed"
    data-leftbar-color="light" data-leftbar-size='default' data-sidebar-user='true'>

    <!-- Begin page -->
    <div id="wrapper">


        <!-- Topbar Start -->
        <div class="navbar-custom">
            <div class="container-fluid">
                <ul class="list-unstyled topnav-menu float-end mb-0">

                    <li class="dropdown d-none d-lg-inline-block">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="fullscreen"
                            href="#">
                            <i class="fe-maximize noti-icon"></i>
                        </a>
                    </li>

                    <li class="dropdown notification-list topbar-dropdown">
                        <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light"
                            data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                            aria-expanded="false">
                            <img src="<?= base_url() ?>assets/images/avatar.png" alt="user-image"
                                class="rounded-circle">
                            <span class="pro-user-name ms-1">
                                <?= strstr($authData['nama'], ' ', true) ?: $authData['nama']; ?> <i
                                    class="mdi mdi-chevron-down"></i>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Selamat Datang !</h6>
                            </div>

                            <!-- item-->
                            <a href="<?= base_url() ?>admin/users/akun" class="dropdown-item notify-item">
                                <i class="fe-user"></i>
                                <span>Akun Saya</span>
                            </a>

                            <div class="dropdown-divider"></div>

                            <!-- item-->
                            <a href="<?= base_url() ?>admin/auth/logout" class="dropdown-item notify-item">
                                <i class="fe-log-out"></i>
                                <span>Keluar</span>
                            </a>

                        </div>
                    </li>

                    <li class="dropdown notification-list">
                        <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect waves-light">
                            <i class="fe-settings noti-icon"></i>
                        </a>
                    </li>

                </ul>

                <!-- LOGO -->
                <div class="logo-box">
                    <a href="index.html" class="logo logo-dark text-center">
                        <span class="logo-sm">
                            <img src="<?= base_url() ?>assets/images/icon.svg" alt="" height="45">
                            <!-- <span class="logo-lg-text-light">UBold</span> -->
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url() ?>assets/images/logo.svg" alt="" height="30">
                            <!-- <span class="logo-lg-text-light">U</span> -->
                        </span>
                    </a>

                    <a href="index.html" class="logo logo-light text-center" style="background-color:#fff;">
                        <span class="logo-sm">
                            <img src="<?= base_url() ?>assets/images/icon.svg" alt="" height="45">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url() ?>assets/images/logo.svg" alt="" height="30">
                        </span>
                    </a>
                </div>

                <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                    <li>
                        <button class="button-menu-mobile waves-effect waves-light">
                            <i class="fe-menu"></i>
                        </button>
                    </li>

                    <li>
                        <!-- Mobile menu toggle (Horizontal Layout)-->
                        <a class="navbar-toggle nav-link" data-bs-toggle="collapse"
                            data-bs-target="#topnav-menu-content">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </li>
                    <li class="dropdown d-none d-xl-block">
                        <span class="nav-link dropdown-toggle waves-effect waves-light font-18 text-white">
                            SIMLOG - Sistem Informasi Logistik
                        </span>

            </div>
            </li>

            </ul>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- end Topbar -->

    <!-- ========== Left Sidebar Start ========== -->
    <div class="left-side-menu">

        <div class="h-100" data-simplebar>

            <!-- User box -->
            <div class="user-box text-center">
                <img src="<?= base_url() ?>assets/images/avatar.png" alt="user-img" title="Mat Helme"
                    class="rounded-circle avatar-md">
                <div class="dropdown">
                    <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
                        data-bs-toggle="dropdown">
                        <?= $authData['nama']; ?>
                    </a>
                </div>
                <p class="text-muted">
                    <?= $authData['role']; ?>
                </p>
            </div>

            <!--- Sidemenu -->
            <div id="sidebar-menu">

                <ul id="side-menu">

                    <li class="menu-title">Navigation</li>
                    <?php
                    if (helper_menu('dashboard')) {
                        ?>
                        <li>
                            <a href="<?= base_url() ?>admin/dashboard">
                                <i class="mdi mdi-view-dashboard-outline"></i>
                                <span> Dashboard </span>
                            </a>
                        </li>
                    <?php } ?>
                    <?php
                    if (helper_menu('outlet')) {
                        ?>
                        <li>
                            <a href="#sidebarOutlet" data-bs-toggle="collapse">
                                <i class="mdi mdi-storefront"></i>
                                <span> Outlet </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarOutlet">
                                <ul class="nav-second-level">
                                    <?php
                                    if (helper_menu('all_outlet')) {
                                        ?>
                                        <li>
                                            <a href="<?= base_url() ?>admin/outlet">Semua Cabang</a>
                                        </li>
                                    <?php }
                                    if (helper_menu('add_outlet')) {
                                        ?>
                                        <li>
                                            <a href="<?= base_url() ?>admin/outlet/tambah">Tambah Cabang</a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </li>
                    <?php } ?>
                    <li>
                        <a href="#sidebarBangunan" data-bs-toggle="collapse">
                            <i class="mdi mdi-office-building-outline"></i>
                            <span> Bangunan </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarBangunan">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="#">Data Sewa Outlet</a>
                                </li>
                                <li>
                                    <a href="#r">Renovasi Outlet</a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    <?php
                    if (helper_menu('gudang')) {
                        ?>
                        <li>
                            <a href="#sidebarGudang" data-bs-toggle="collapse">
                                <i class="mdi mdi-zip-box-outline"></i>
                                <span> Gudang </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarGudang">
                                <ul class="nav-second-level">
                                    <?php
                                    if (helper_menu('all_gudang')) {
                                        ?>
                                        <li>
                                            <a href="<?= base_url() ?>admin/gudang">Semua Data Barang</a>
                                        </li>
                                    <?php }
                                    if (helper_menu('add_gudang')) {
                                        ?>
                                        <li>
                                            <a href="<?= base_url() ?>admin/gudang/tambah">Tambah Data Barang</a>
                                        </li>
                                    <?php } ?>
                                    <li>
                                        <a href="<?= base_url() ?>admin/gudang/log">Log Barang</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="#menuMultilevel2" data-bs-toggle="collapse" class="menu-link">
                                            <span class="menu-text"> ATK </span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="menuMultilevel2">
                                            <ul class="sub-menu">
                                                <li class="menu-item">
                                                    <a href="<?= base_url() ?>admin/gudang/atk" class="menu-link">
                                                        <span class="menu-text">Data ATK</span>
                                                    </a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="<?= base_url() ?>admin/gudang/tambahatk" class="menu-link">
                                                        <span class="menu-text">Tambah ATK</span>
                                                    </a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="<?= base_url() ?>admin/gudang/logatk" class="menu-link">
                                                        <span class="menu-text">Log ATK</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </li>
                    <?php } ?>

                    <?php
                    if (helper_menu('anggaran')) {
                        ?>
                        <li>
                            <a href="#sidebarAnggaran" data-bs-toggle="collapse">
                                <i class="mdi mdi-home-assistant"></i>
                                <span> Anggaran </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarAnggaran">
                                <ul class="nav-second-level">
                                    <?php
                                    if (helper_menu('all_anggaran')) {
                                        ?>
                                        <li>
                                            <a href="<?= base_url() ?>admin/anggaran">Semua Anggaran</a>
                                        </li>
                                    <?php }
                                    if (helper_menu('add_anggaran')) {
                                        ?>
                                        <li>
                                            <a href="<?= base_url() ?>admin/anggaran/tambah">Tambah Anggaran</a>
                                        </li>
                                    <?php }
                                    if (helper_menu('manage_program_kerja')) {
                                        ?>
                                        <li>
                                            <a href="<?= base_url() ?>admin/anggaran/manage">Manage Program Kerja</a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </li>
                    <?php } ?>


                    <?php
                    if (helper_menu('pengguna')) {
                        ?>
                        <li>
                            <a href="#sidebarUsers" data-bs-toggle="collapse">
                                <i class="mdi mdi-account-multiple-outline"></i>
                                <span> Pengguna </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarUsers">
                                <ul class="nav-second-level">

                                    <?php
                                    if (helper_menu('all_pengguna')) {
                                        ?>
                                        <li>
                                            <a href="<?= base_url() ?>admin/users">Semua Pengguna</a>
                                        </li>
                                    <?php }
                                    if (helper_menu('management_role')) {
                                        ?>
                                        <li>
                                            <a href="<?= base_url() ?>admin/users/role">Management Role</a>
                                        </li>
                                    <?php }
                                    if (helper_menu('log_aktivitas_pengguna')) {
                                        ?>
                                        <li>
                                            <a href="<?= base_url() ?>admin/users/log">Log Aktivitas Pengguna</a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </li>
                    <?php } ?>

                    <?php
                    if (helper_menu('pengaturan')) {
                        ?>
                        <li>
                            <a href="#sidebarPengaturan" data-bs-toggle="collapse">
                                <i class="mdi mdi-tools"></i>
                                <span> Pengaturan </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarPengaturan">
                                <ul class="nav-second-level">

                                    <li>
                                        <a href="<?= base_url() ?>admin/users">Pengaturan Dasar</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url() ?>admin/users">Backup Database</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <?php
                    }
                    ?>
                </ul>

            </div>
            <!-- End Sidebar -->

            <div class="clearfix"></div>

        </div>
        <!-- Sidebar -left -->

    </div>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->
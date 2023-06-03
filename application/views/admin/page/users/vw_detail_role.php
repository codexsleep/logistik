<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row mb-3">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">SIMLOG</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Pengguna</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Role</a></li>
                                <li class="breadcrumb-item active">Detail</li>
                            </ol>
                        </div>
                        <h4 class="page-title">
                            <?= $appconfig['title']; ?>
                        </h4>
                        <a href="<?= base_url() ?>admin/users/role" type="button"
                            class="btn btn-outline-primary waves-effect waves-light"><i
                                class="mdi mdi-keyboard-backspace"></i> Kembali</a>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <?php
            $dashboard = false;

            $outlet = false;
            $all_outlet = false;
            $add_outlet = false;
            $manage_sewa_bangunan = false;
            $manage_renovasi_bangunan = false;

            $gudang = false;
            $all_gudang = false;
            $add_gudang = false;

            $anggaran = false;
            $all_anggaran = false;
            $add_anggaran = false;
            $manage_program_kerja = false;

            $pengguna = false;
            $all_pengguna = false;
            $management_role = false;
            $log_aktivitas_pengguna = false;

            $pengaturan = false;

            $split_role = explode(",", $roles['role_menu']);
            foreach ($split_role as $role):
                if ($role == 'dashboard') {
                    $dashboard = true;
                } elseif ($role == 'outlet') {
                    $outlet = true;
                } elseif ($role == 'all_outlet') {
                    $all_outlet = true;
                } elseif ($role == 'add_outlet') {
                    $add_outlet = true;
                } elseif ($role == 'manage_sewa_bangunan') {
                    $manage_sewa_bangunan = true;
                } elseif ($role == 'manage_renovasi_bangunan') {
                    $manage_renovasi_bangunan = true;
                } elseif ($role == 'gudang') {
                    $gudang = true;
                } elseif ($role == 'all_gudang') {
                    $all_gudang = true;
                } elseif ($role == 'add_gudang') {
                    $add_gudang = true;
                } elseif ($role == 'anggaran') {
                    $anggaran = true;
                } elseif ($role == 'all_anggaran') {
                    $all_anggaran = true;
                } elseif ($role == 'add_anggaran') {
                    $add_anggaran = true;
                } elseif ($role == 'manage_program_kerja') {
                    $manage_program_kerja = true;
                } elseif ($role == 'pengguna') {
                    $pengguna = true;
                } elseif ($role == 'all_pengguna') {
                    $all_pengguna = true;
                } elseif ($role == 'management_role') {
                    $management_role = true;
                } elseif ($role == 'log_aktivitas_pengguna') {
                    $log_aktivitas_pengguna = true;
                } elseif ($role == 'pengaturan') {
                    $pengaturan = true;
                }
            endforeach; ?>
            <form class="parsley-examples" action="" method="POST">
            <?= $this->session->flashdata('message') ?>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <form class="parsley-examples" action="" method="POST">
                                    <div class="form-check mb-2 form-check-primary">
                                        <label class="form-check-label" for="rolename">Role Name</label>
                                        <input type="text" id="rolename" name="rolename" value="<?= $roles['role_name'];?>" class="form-control">
                                    </div>
                            </div>
                        </div> <!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-check mb-2 form-check-primary">
                                    <input class="form-check-input" type="checkbox" name="menu[]" value="dashboard"
                                        id="menurole" <?php if ($dashboard == true) {
                                            echo "checked";
                                        } ?>>
                                    <label class="form-check-label" for="menurole">Dashboard</label>
                                </div>
                                <!--outlet -->
                                <div class="form-check mb-2 form-check-primary">
                                    <input class="form-check-input" type="checkbox" name="menu[]" value="outlet"
                                        id="menurole" <?php if ($outlet == true) {
                                            echo "checked";
                                        } ?>>
                                    <label class="form-check-label" for="menurole">Outlet</label>
                                </div>
                                <ul>
                                    <li>
                                        <div class="form-check mb-2 form-check-primary">
                                            <input class="form-check-input" type="checkbox" name="menu[]"
                                                value="all_outlet" id="menurole" <?php if ($all_outlet == true) {
                                                    echo "checked";
                                                } ?>>
                                            <label class="form-check-label" for="menurole">Semua Outlet</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check mb-2 form-check-primary">
                                            <input class="form-check-input" type="checkbox" name="menu[]"
                                                value="add_outlet" id="menurole" <?php if ($add_outlet == true) {
                                                    echo "checked";
                                                } ?>>
                                            <label class="form-check-label" for="menurole">Tambah Outlet</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check mb-2 form-check-primary">
                                            <input class="form-check-input" type="checkbox" name="menu[]"
                                                value="manage_sewa_bangunan" id="menurole" <?php if ($manage_sewa_bangunan == true) {
                                                    echo "checked";
                                                } ?>>
                                            <label class="form-check-label" for="menurole">Manage Sewa
                                                Bangunan</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check mb-2 form-check-primary">
                                            <input class="form-check-input" type="checkbox" name="menu[]"
                                                value="manage_renovasi_bangunan" id="menurole" <?php if ($manage_renovasi_bangunan == true) {
                                                    echo "checked";
                                                } ?>>
                                            <label class="form-check-label" for="menurole">Manage Renovasi
                                                Bangunan</label>
                                        </div>
                                    </li>
                                </ul>
                                <!--outlet -->
                                <div class="form-check mb-2 form-check-primary">
                                    <input class="form-check-input" type="checkbox" name="menu[]" value="gudang"
                                        id="menurole" <?php if ($gudang == true) {
                                            echo "checked";
                                        } ?>>
                                    <label class="form-check-label" for="menurole">Gudang</label>
                                </div>
                                <ul>
                                    <li>
                                        <div class="form-check mb-2 form-check-primary">
                                            <input class="form-check-input" type="checkbox" name="menu[]"
                                                value="all_gudang" id="menurole" <?php if ($all_gudang == true) {
                                                    echo "checked";
                                                } ?>>
                                            <label class="form-check-label" for="menurole">Semua Data Gudang</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check mb-2 form-check-primary">
                                            <input class="form-check-input" type="checkbox" name="menu[]"
                                                value="add_gudang" id="menurole" <?php if ($add_gudang == true) {
                                                    echo "checked";
                                                } ?>>
                                            <label class="form-check-label" for="menurole">Tambah Data
                                                Gudang</label>
                                        </div>
                                    </li>
                                </ul>
                                <!--outlet -->
                                <div class="form-check mb-2 form-check-primary">
                                    <input class="form-check-input" type="checkbox" name="menu[]" value="anggaran"
                                        id="menurole" <?php if ($anggaran == true) {
                                            echo "checked";
                                        } ?>>
                                    <label class="form-check-label" for="menurole">Anggaran</label>
                                </div>
                                <ul>
                                    <li>
                                        <div class="form-check mb-2 form-check-primary">
                                            <input class="form-check-input" type="checkbox" name="menu[]"
                                                value="all_anggaran" id="menurole" <?php if ($all_anggaran == true) {
                                                    echo "checked";
                                                } ?>>
                                            <label class="form-check-label" for="menurole">Semua Anggaran</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check mb-2 form-check-primary">
                                            <input class="form-check-input" type="checkbox" name="menu[]"
                                                value="add_anggaran" id="menurole" <?php if ($add_anggaran == true) {
                                                    echo "checked";
                                                } ?>>
                                            <label class="form-check-label" for="menurole">Tambah Anggaran</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check mb-2 form-check-primary">
                                            <input class="form-check-input" type="checkbox" name="menu[]"
                                                value="manage_program_kerja" id="menurole" <?php if ($manage_program_kerja == true) {
                                                    echo "checked";
                                                } ?>>
                                            <label class="form-check-label" for="menurole">Manage Program
                                                Kerja</label>
                                        </div>
                                    </li>
                                </ul>
                                <!--outlet -->
                                <div class="form-check mb-2 form-check-primary">
                                    <input class="form-check-input" type="checkbox" name="menu[]" value="pengguna"
                                        id="menurole" <?php if ($pengguna == true) {
                                            echo "checked";
                                        } ?>>
                                    <label class="form-check-label" for="menurole">Pengguna</label>
                                </div>
                                <ul>
                                    <li>
                                        <div class="form-check mb-2 form-check-primary">
                                            <input class="form-check-input" type="checkbox" name="menu[]"
                                                value="all_pengguna" id="menurole" <?php if ($all_pengguna == true) {
                                                    echo "checked";
                                                } ?>>
                                            <label class="form-check-label" for="menurole">Semua Pengguna</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check mb-2 form-check-primary">
                                            <input class="form-check-input" type="checkbox" name="menu[]"
                                                value="management_role" id="menurole" <?php if ($management_role == true) {
                                                    echo "checked";
                                                } ?>>
                                            <label class="form-check-label" for="menurole">Management Role</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check mb-2 form-check-primary">
                                            <input class="form-check-input" type="checkbox" name="menu[]"
                                                value="log_aktivitas_pengguna" id="menurole" <?php if ($log_aktivitas_pengguna == true) {
                                                    echo "checked";
                                                } ?>>
                                            <label class="form-check-label" for="menurole">Log Aktivitas
                                                Pengguna</label>
                                        </div>
                                    </li>
                                </ul>
                                <!--pengaturan -->
                                <div class="form-check mb-2 form-check-primary">
                                    <input class="form-check-input" type="checkbox" name="menu[]" value="pengaturan"
                                        id="menurole" <?php if ($pengaturan == true) {
                                            echo "checked";
                                        } ?>>
                                    <label class="form-check-label" for="menurole">Pengaturan</label>
                                </div>

                                <div class="text-end">
                                    <button class="ladda-button btn btn-primary" id="simpan-btn" type="submit"
                                        name="simpan" dir="ltr" data-style="expand-right">Simpan</button>
                                </div>
                            </div>
                        </div> <!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
            </form>

        </div> <!-- container -->

    </div> <!-- content -->
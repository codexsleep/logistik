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
                                <li class="breadcrumb-item active">Tambah</li>
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

            <form class="parsley-examples" action="" method="POST">
            <?= $this->session->flashdata('message') ?>
            <h5>Nama</h5>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <form class="parsley-examples" action="" method="POST">
                                    <div class="form-check mb-2 form-check-primary">
                                        <input type="text" id="rolename" name="rolename" value="" class="form-control">
                                    </div>
                            </div>
                        </div> <!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
                <h5>Menu</h5>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-check mb-2 form-check-primary">
                                    <input class="form-check-input" type="checkbox" name="menu[]" value="dashboard"
                                        id="menurole">
                                    <label class="form-check-label" for="menurole">Dashboard</label>
                                </div>
                                <!--outlet -->
                                <div class="form-check mb-2 form-check-primary">
                                    <input class="form-check-input" type="checkbox" name="menu[]" value="outlet"
                                        id="menurole">
                                    <label class="form-check-label" for="menurole">Outlet</label>
                                </div>
                                <ul>
                                    <li>
                                        <div class="form-check mb-2 form-check-primary">
                                            <input class="form-check-input" type="checkbox" name="menu[]"
                                                value="all_outlet" id="menurole">
                                            <label class="form-check-label" for="menurole">Semua Outlet</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check mb-2 form-check-primary">
                                            <input class="form-check-input" type="checkbox" name="menu[]"
                                                value="add_outlet" id="menurole">
                                            <label class="form-check-label" for="menurole">Tambah Outlet</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check mb-2 form-check-primary">
                                            <input class="form-check-input" type="checkbox" name="menu[]"
                                                value="manage_daerah_outlet" id="menurole">
                                            <label class="form-check-label" for="menurole">Manage Daerah
                                                Outlet</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check mb-2 form-check-primary">
                                            <input class="form-check-input" type="checkbox" name="menu[]"
                                                value="manage_sewa_bangunan" id="menurole">
                                            <label class="form-check-label" for="menurole">Manage Sewa
                                                Bangunan</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check mb-2 form-check-primary">
                                            <input class="form-check-input" type="checkbox" name="menu[]"
                                                value="manage_renovasi_bangunan" id="menurole">
                                            <label class="form-check-label" for="menurole">Manage Renovasi
                                                Bangunan</label>
                                        </div>
                                    </li>
                                </ul>
                                <!--outlet -->
                                <div class="form-check mb-2 form-check-primary">
                                    <input class="form-check-input" type="checkbox" name="menu[]" value="gudang"
                                        id="menurole">
                                    <label class="form-check-label" for="menurole">Gudang</label>
                                </div>
                                <ul>
                                    <li>
                                        <div class="form-check mb-2 form-check-primary">
                                            <input class="form-check-input" type="checkbox" name="menu[]"
                                                value="all_gudang" id="menurole">
                                            <label class="form-check-label" for="menurole">Semua Data Gudang</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check mb-2 form-check-primary">
                                            <input class="form-check-input" type="checkbox" name="menu[]"
                                                value="add_gudang" id="menurole">
                                            <label class="form-check-label" for="menurole">Tambah Data
                                                Gudang</label>
                                        </div>
                                    </li>
                                </ul>
                                <!--outlet -->
                                <div class="form-check mb-2 form-check-primary">
                                    <input class="form-check-input" type="checkbox" name="menu[]" value="anggaran"
                                        id="menurole">
                                    <label class="form-check-label" for="menurole">Anggaran</label>
                                </div>
                                <ul>
                                    <li>
                                        <div class="form-check mb-2 form-check-primary">
                                            <input class="form-check-input" type="checkbox" name="menu[]"
                                                value="all_anggaran" id="menurole">
                                            <label class="form-check-label" for="menurole">Semua Anggaran</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check mb-2 form-check-primary">
                                            <input class="form-check-input" type="checkbox" name="menu[]"
                                                value="add_anggaran" id="menurole">
                                            <label class="form-check-label" for="menurole">Tambah Anggaran</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check mb-2 form-check-primary">
                                            <input class="form-check-input" type="checkbox" name="menu[]"
                                                value="manage_program_kerja" id="menurole">
                                            <label class="form-check-label" for="menurole">Manage Program
                                                Kerja</label>
                                        </div>
                                    </li>
                                </ul>
                                <!--outlet -->
                                <div class="form-check mb-2 form-check-primary">
                                    <input class="form-check-input" type="checkbox" name="menu[]" value="pengguna"
                                        id="menurole">
                                    <label class="form-check-label" for="menurole">Pengguna</label>
                                </div>
                                <ul>
                                    <li>
                                        <div class="form-check mb-2 form-check-primary">
                                            <input class="form-check-input" type="checkbox" name="menu[]"
                                                value="all_pengguna" id="menurole">
                                            <label class="form-check-label" for="menurole">Semua Pengguna</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check mb-2 form-check-primary">
                                            <input class="form-check-input" type="checkbox" name="menu[]"
                                                value="management_role" id="menurole">
                                            <label class="form-check-label" for="menurole">Management Role</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check mb-2 form-check-primary">
                                            <input class="form-check-input" type="checkbox" name="menu[]"
                                                value="log_aktivitas_pengguna" id="menurole">
                                            <label class="form-check-label" for="menurole">Log Aktivitas
                                                Pengguna</label>
                                        </div>
                                    </li>
                                </ul>
                                <!--pengaturan -->
                                <div class="form-check mb-2 form-check-primary">
                                    <input class="form-check-input" type="checkbox" name="menu[]" value="pengaturan"
                                        id="menurole">
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
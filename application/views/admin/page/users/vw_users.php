<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">SIMLOG</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Pengguna</a></li>
                                <li class="breadcrumb-item active">All</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Semua Pengguna</h4>
                        <a href="<?= base_url() ?>admin/users/tambah" type="button" class="btn btn-primary waves-effect waves-light mb-2"><i class="mdi mdi-plus"></i> Tambah
                            Pengguna</a>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <?php
            if (!isset($_GET['role'])) {
                $frole = "";
            } else {
                if ($_GET['role'] == 'all') {
                    $frole = "all";
                } else {
                    $frole = $this->input->get('role');
                }
            }

            if (!isset($_GET['status'])) {
                $fstatus = "";
            } else {
                if ($_GET['status'] == 'all') {
                    $fstatus = "all";
                } else {
                    $fstatus = $this->input->get('status');
                }
            }
            ?>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row justify-content-between">
                                <div class="col-auto">
                                    <form class="d-flex flex-wrap align-items-center" action="" method="GET">
                                        <label for="status-select" class="me-2">Role</label>
                                        <div class="me-sm-3">
                                            <select class="form-select my-1 my-lg-0" id="status-select" name="role">
                                                <option value="all">Semua Role</option>
                                                <?php
                                                foreach ($getRole as $srole) {
                                                ?>
                                                    <option value="<?= $srole['id']; ?>" <?php if ($frole == $srole['id']) {
                                                                                                echo 'selected';
                                                                                            } ?>><?= $srole['role_name']; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <label for="status-select" class="me-2">Status</label>
                                        <div class="me-sm-3">
                                            <select class="form-select my-1 my-lg-0" id="status-select" name="status">
                                                <option value="all">Semua Status</option>
                                                <option value="1" <?php if ($fstatus == '1') {
                                                                        echo 'selected';
                                                                    } ?>>Aktif</option>
                                                <option value="2" <?php if ($fstatus == '2') {
                                                                        echo 'selected';
                                                                    } ?>>Tidak Aktif</option>
                                            </select>
                                        </div>
                                </div>
                                <div class="col-auto">
                                    <div class="text-lg-end my-1 my-lg-0">
                                        <button type="submit" class="ladda-button btn btn-info waves-effect waves-light me-1" dir="ltr" data-style="expand-right">
                                            <i class=" mdi mdi-filter-outline"></i> Filter</button>
                                        <a href="<?= base_url() ?>admin/users" class="btn btn-warning waves-effect waves-light">
                                            <i class="mdi mdi-reload me-1"></i> Reset</a>
                                    </div>
                                </div><!-- end col-->
                                </form>
                            </div> <!-- end row -->
                        </div>
                    </div> <!-- end card -->
                </div> <!-- end col-->
            </div>
            <!-- end row-->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="scroll-horizontal-datatable" class="table w-100 nowrap">
                                <thead>
                                    <tr>
                                        <th>#ID</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->
        </div> <!-- container -->

    </div> <!-- content -->
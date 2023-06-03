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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Outlet</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Cabang</a></li>
                                <li class="breadcrumb-item active">All</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Semua Outlet (Cabang)</h4>
                        <div class="mb-3">
                            <a href="<?= base_url() ?>admin/outlet/tambah" type="button"
                                class="btn btn-outline-primary waves-effect waves-light"><i class="mdi mdi-plus"></i>
                                Tambah</a>
                            <a href="<?= base_url() ?>admin/outlet/import_cabang" type="button"
                                class="btn btn-outline-info waves-effect waves-light"><i class="mdi mdi-upload"></i>Bulk
                                Import</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <?php
            if (!isset($_GET['area'])) {
                $farea = "";
            } else {
                if ($_GET['area'] == 'all') {
                    $farea = "all";
                } else {
                    $farea = $this->input->get('area');
                }
            }

            if (!isset($_GET['jenis'])) {
                $fjenis = "";
            } else {
                if ($_GET['jenis'] == 'all') {
                    $fjenis = "all";
                } else {
                    $fjenis = $this->input->get('jenis');
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
                                        <label for="status-select" class="me-2">Area</label>
                                        <div class="me-sm-4">
                                            <select class="form-select my-1 my-lg-0" id="status-select" name="area">
                                                <option selected="">All</option>
                                                <?php
                                                foreach ($area as $value) {
                                                    ?>
                                                    <option value="<?= $value['id']; ?>" <?php if ($farea == $value['id']) {
                                                                                                echo 'selected';
                                                                                            } ?>><?= $value['nama_area']; ?>
                                                    </option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <label for="status-select" class="me-2">Jenis</label>
                                        <div class="me-sm-3">
                                            <select class="form-select my-1 my-lg-0" id="status-select" name="jenis">
                                                <option selected="">All</option>
                                                <option value="1" <?php if ($fjenis == '1') {
                                                                                                echo 'selected';
                                                                                            } ?>>Gedung Sendiri</option>
                                                <option value="2" <?php if ($fjenis == '2') {
                                                                                                echo 'selected';
                                                                                            } ?>>Gedung Kontrak/Sewa</option>
                                            </select>
                                        </div>
                                        <label for="status-select" class="me-2">Status</label>
                                        <div class="me-sm-3">
                                            <select class="form-select my-1 my-lg-0" id="status-select" name="status">
                                                <option selected="">All</option>
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
                                        <button type="submit" class="btn btn-info waves-effect waves-light me-1">
                                            <i class="mdi mdi-filter-outline"></i> Filter</button>
                                        <a href="<?= base_url() ?>admin/outlet"
                                            class="btn btn-warning waves-effect waves-light">
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
                                        <th>Id</th>
                                        <th>Nama Outlet</th>
                                        <th>Alamat</th>
                                        <th>Area</th>
                                        <th>Jenis</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->
        </div> <!-- container -->

    </div> <!-- content -->
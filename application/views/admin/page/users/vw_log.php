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
                                <li class="breadcrumb-item active">Log</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Log Aktivitas Pengguna</h4>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <?php
            if (!isset($_GET['userid_log'])) {
                $fuser = "";
            } else {
                if ($_GET['userid_log'] == 'all') {
                    $fuser = "all";
                } else {
                    $fuser = $this->input->get('userid_log');
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
                                        <label for="status-select" class="me-2">User</label>
                                        <div class="me-sm-3">
                                            <select class="form-select my-1 my-lg-0" id="status-select" name="role">
                                                <option value="all">Semua User</option>
                                                <?php
                                                foreach ($getUser as $suser) {
                                                ?>
                                                    <option value="<?= $suser['id']; ?>" <?php if ($fuser == $suser['id']) {
                                                                                                echo 'selected';
                                                                                            } ?>><?= $suser['name']; ?></option>
                                                <?php
                                                }
                                                ?>
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
                                        <th>Aktivitas</th>
                                        <th>User</th>
                                        <th>Tanggal</th>
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
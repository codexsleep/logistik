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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Anggaran</a></li>
                                <li class="breadcrumb-item active">All</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Semua Anggaran</h4>
                        <a href="<?= base_url() ?>admin/anggaran/tambah" type="button" class="btn btn-primary waves-effect waves-light mb-2"><i class="mdi mdi-plus"></i> Tambah
                            Anggaran</a>
                            <a href="<?= base_url() ?>admin/outlet" type="button"
                                class="btn btn-outline-info waves-effect waves-light"><i
                                    class="mdi mdi-upload"></i>Bulk Import</a>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="scroll-horizontal-datatable" class="table w-100 nowrap">
                                <thead>
                                    <tr>
                                        <th>#ID</th>
                                        <th>Detail</th>
                                        <th>Tahun</th>
                                        <th>Inventaris</th>
                                        <th>Gedung</th>
                                        <th>Total</th>
                                        <th>Sisa</th>
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
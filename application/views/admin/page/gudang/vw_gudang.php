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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Gudang</a></li>
                                <li class="breadcrumb-item active">All</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Semua Data Gudang</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- end row-->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                        <div class="row mb-2">
                                <div class="col-sm-4">
                                    <a href="<?= base_url();?>admin/gudang/tambah"><button type="button" class="btn btn-danger waves-effect waves-light"><i
                                            class="mdi mdi-plus-circle me-1"></i> Tambah Barang</button></a>
                                </div>
                                <div class="col-sm-8">
                                    <div class="text-sm-end mt-2 mt-sm-0">
                                        <a href="<?= base_url();?>admin/gudang/import_barang"><button type="button" class="btn btn-light mb-2 me-1">Import</button></a>
                                    </div>
                                </div><!-- end col-->
                            </div>
                            <table id="scroll-horizontal-datatable" class="table w-100 nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama Barang</th>
                                        <th>Satuan Barang</th>
                                        <th>Harga Satuan</th>
                                        <th>Sisa</th>
                                        <th>status</th>
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
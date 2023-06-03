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
                                <li class="breadcrumb-item active">All</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Semua UPC</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- start cabang profile section -->

            <div class="row"> 
                <div class="col-xl-6 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <p class="mb-1 fw-bold"><?= $cabang['nama'];?></p>
                            <div class="text-muted font-12">
                                <b>Area Cabang:</b> <?= $cabang['area'];?><br>
                                <b>Alamat Cabang:</b> <?= $cabang['alamat'];?><br>
                                <b>Jenis Properti:</b><?= $cabang['jenis'];?><br>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <a href="<?= base_url() ?>admin/outlet" type="button" class="btn btn-outline-info waves-effect waves-light"><i class="mdi mdi-keyboard-backspace"></i> Kembali</a>
                <a href="<?= base_url() ?>admin/outlet/tambahupc/<?= $cabid;?>" type="button" class="btn btn-outline-primary waves-effect waves-light"><i class="mdi mdi-plus"></i> Tambah UPC</a>
            </div>
            <!-- end cabang profile section -->


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
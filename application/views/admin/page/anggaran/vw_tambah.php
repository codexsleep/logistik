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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Anggaran</a></li>
                                <li class="breadcrumb-item active">Tambah</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Tambah Data Anggaran</h4>
                        <a href="<?= base_url() ?>admin/anggaran" type="button" class="btn btn-outline-primary waves-effect waves-light"><i class="mdi mdi-keyboard-backspace"></i> Kembali</a>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                        <div id="message"></div>

                            <form class="parsley-examples" id="#simlog-form">
                                <div class="mb-3">
                                    <label for="detail" class="form-label">Detail<span class="text-danger">*</span></label>
                                    <input type="text" name="detail" placeholder="Detail Anggaran" class="form-control" id="detail-input" />
                                </div>
                                <div class="mb-3">
                                    <label for="tahun" class="form-label">Tahun<span class="text-danger">*</span></label>
                                    <input type="number" name="tahun" placeholder="Tahun" class="form-control" id="tahun-input" />
                                </div>
                                <div class="mb-3">
                                    <label for="anggaranInventaris" class="form-label">Anggaran Inventaris<span class="text-danger">*</span></label>
                                    <input type="number" name="iventaris" placeholder="Anggaran Inventaris" class="form-control" id="inventaris-input" />
                                </div>
                                <div class="mb-3">
                                    <label for="anggaranGedung" class="form-label">Anggaran Gedung<span class="text-danger">*</span></label>
                                    <input type="number" name="gedung" placeholder="Anggaran Gedung" class="form-control" id="gedung-input" />
                                </div>
                                <div class="text-end">
                                    <button class="ladda-button btn btn-primary" id="simpan-btn" type="submit" dir="ltr" data-style="expand-right">Simpan</button>
                                    <button type="reset" class="btn btn-secondary waves-effect">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div> <!-- end card -->
                </div>
                <!-- end col -->
            </div>
        </div> <!-- container -->

    </div> <!-- content -->
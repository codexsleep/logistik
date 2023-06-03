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
                                <li class="breadcrumb-item active">Import</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Import Cabang</h4>
                        <div class="mb-3">
                            <a href="<?= base_url();?>/admin/outlet" type="button"
                                class="btn btn-outline-primary waves-effect waves-light"><i
                                    class="mdi mdi-keyboard-backspace"></i> Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                Anda dapat mengimport data cabang secara masal dengan menggunakan
                                <a href="" style="color:var(--ct-code-color); font-weight:bold"><code>Format Excel Berikut</code></a>.
                            </div>
                            <form class="parsley-examples">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">File Import<span
                                            class="text-danger">*</span></label>
                                    <input type="file" name="nama" placeholder="ex: Simpang Raya" class="form-control"
                                        id="nama-input" />
                                </div>
                                <div>
                                    <button class="ladda-button btn btn-primary" id="simpan-btn" type="submit" dir="ltr"
                                        data-style="expand-right">Import</button>
                                </div>
                            </form>
                        </div>
                    </div> <!-- end card -->
                </div>
                <!-- end col -->
            </div>

            <!-- end row-->
        </div> <!-- container -->

    </div> <!-- content -->
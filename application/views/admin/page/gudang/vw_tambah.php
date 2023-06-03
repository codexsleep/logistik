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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Outlet</a></li>
                                <li class="breadcrumb-item active">Tambah UPC</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Tambah Data Barang</h4>
                        <a href="<?= base_url(); ?>admin/gudang" type="button"
                            class="btn btn-outline-primary waves-effect waves-light"><i
                                class="mdi mdi-keyboard-backspace"></i> Kembali</a>
                    </div>
                </div>
            </div>
            <div id="message"></div>

            <!-- end page title -->
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">

                            <div class="parsley-examples">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Barang<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="nama" placeholder="ex: Simpang Raya" class="form-control"
                                        id="nama-input" />
                                </div>

                                <div class="mb-3">
                                    <label for="satuan" class="form-label">Satuan Barang<span
                                            class="text-danger">*</span></label>
                                    <input type="hidden" id="satuan-default" value="" />
                                    <select class="form-control" id="satuan-input" name="satuan">
                                        <option value="">Pilih Satuan Barang</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="harga" class="form-label">Harga Satuan Barang<span
                                            class="text-danger">*</span></label>
                                    <input type="number" name="harga" placeholder="ex: 12000" class="form-control"
                                        id="harga-input" />
                                </div>
                                
                                <div class="mb-3">
                                    <label for="min" class="form-label">Minimum Stok<span
                                            class="text-danger">*</span></label>
                                    <input type="number" name="min" placeholder="ex: 100" class="form-control"
                                        id="min-input" />
                                </div>


                                <div class="mt-3">
                                    <label for="status" class="form-label">Status <span
                                            class="text-danger">*</span></label>
                                    <div class="form-check">
                                        <input type="radio" name="status" class="form-check-input" value="1"
                                            id="status-input" checked>
                                        <label class="form-check-label">Aktif</label>
                                    </div>

                                    <div class="form-check">
                                        <input type="radio" name="status" class="form-check-input" value="2"
                                            id="status-input">
                                        <label class="form-check-label">Tidak Aktif</label>
                                    </div>
                                </div>

                                <div class="text-end">
                                    <button class="ladda-button btn btn-primary" id="simpan-btn" type="submit" dir="ltr"
                                        data-style="expand-right">Simpan</button>
                                    <button type="reset" class="btn btn-secondary waves-effect">Batal</button>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end card -->
                </div>
                <!-- end col -->
            </div>
        </div> <!-- container -->

    </div> <!-- content -->
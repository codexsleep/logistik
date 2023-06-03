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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">UPC</a></li>
                                <li class="breadcrumb-item active">Edit UPC</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Edit Data Outlet (UPC)</h4>
                        <a href="<?= base_url() ?>admin/outlet/upc/<?= $outlet['cabang'];?>" type="button"
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
                                    <label for="nama" class="form-label">Nama Outlet<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="nama" placeholder="ex: Simpang Raya" class="form-control"
                                        id="nama-input" value="<?= $outlet['nama'];?>" />
                                </div>
 
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat<span
                                            class="text-danger">*</span></label>
                                    <textarea type="alamat" name="alamat" parsley-trigger="change"
                                        placeholder="ex: Jl. Srikandi" class="form-control"
                                        id="alamat-input"><?= $outlet['alamat'];?></textarea>
                                </div>
                                <div class="mt-3">
                                    <label for="status" class="form-label">Jenis <span
                                            class="text-danger">*</span></label>
                                    <div class="form-check">
                                        <input type="radio" name="jenis" class="form-check-input" value="1"
                                            id="jenis-input" <?php if($outlet['jenisiid']=='1'){ echo "checked";}?>>
                                        <label class="form-check-label">Gedung Sendiri</label>
                                    </div>

                                    <div class="form-check">
                                        <input type="radio" name="jenis" class="form-check-input" value="2"
                                            id="jenis-input" <?php if($outlet['jenisiid']=='2'){ echo "checked";}?>>
                                        <label class="form-check-label">Gedung Sewa</label>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <label for="status" class="form-label">Status <span
                                            class="text-danger">*</span></label>
                                    <div class="form-check">
                                        <input type="radio" name="status" class="form-check-input" value="1"
                                            id="status-input" checked <?php if($outlet['status']=='Aktif'){ echo "checked";}?>>
                                        <label class="form-check-label">Aktif</label>
                                    </div>

                                    <div class="form-check">
                                        <input type="radio" name="status" class="form-check-input" value="2"
                                            id="status-input" <?php if($outlet['status']=='1'){ echo "Tidak Aktif";}?>>
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